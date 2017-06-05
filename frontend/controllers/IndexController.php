<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\User;
use frontend\models\Wechat;
use yii\common\CommonController;
/**
 * Site controller
 */
class IndexController extends Controller
{
    public $layout = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionShow()
    {
        $model = new User();
        $data = $model->selmuch();
        // print_r($data);die;
        return $data;
    }

    //微信绑定
    public function actionWeixin()
    {
        $wc_obj = new Wechat();
        // $wc_obj->valid();exit;
        if(isset($_GET["echostr"])){
            $returnStr = $wc_obj->valid();//如果是验证请求,则进行验证(此处会停止执行)
            echo $returnStr;
        }
        else
        {
            $wc_obj->responseMsg();
        }
    }

    public function actionErweima()
    {
        $wc_obj = new Wechat();
        $appid =1;
        $appsecret=2;
        //获取token
        $token = $wc_obj->getToken($appid,$appsecret);
        // echo $token;exit;//7tzJJScHLJLR7geSzz8nc6EyRfYjC_voHUuRALdhtJXYHuzMnruP1c8J2D9_-Gd583k5CAFQ90Cq5egwO-nWMhiz8sVxm9zmARxBGgYYQDgGitiWMxufU3tlsBZM68VpNVObAFAZHA
        $ticket = $wc_obj->getTicket($token,'1');
        // Yii::$app->cache->get('openid');
        echo "<img src='".$ticket."'>";
        // echo "<hr>";//
        // echo '<h3><a href="">已关注?完成绑定</a></h3>';
    }

    public function actionBang()
    {
        $openid = Yii::$app->cache->get('openid');
        $session = Yii::$app->session;
        if($openid)
        {
            $wc_obj = new Wechat();
            $appid =1;
            $appsecret=2;
            //获取token
            $token = $wc_obj->getToken($appid,$appsecret);
            $userinfo = $wc_obj->getUserinfo($token,$openid);
            // unset($userinfo['tagid_list']);
            $_arr = is_object($userinfo) ? get_object_vars($userinfo) :$userinfo;
            foreach ($_arr as $key=>$val)
            {
                $arr[$key] = $val;
            }
            $arr['uid'] = $session['user']['user_id'];
            unset($arr['tagid_list']);
            // print_R($arr);exit;
            $this->actionIns('weixin',$arr);
            $cache = Yii::$app->cache;
            Yii::$app->cache->flush();
            echo "<script> alert (''),location.href='http://60.205.231.89/ww/yii2/frontend/web/index.php?r=index/index'</script>";
        }   
    }

    public function actionIns($tableName,$data)
    {
        $connection = \Yii::$app->db;
        $connection->createCommand()->insert($tableName,$data)->execute();
    }

    public function actionUpd($sql)
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $res = $command->execute();
        return $res;
    }

    public function actionXiang()
    {
        $session = \yii::$app->session;
        $user_id = $session['user']['user_id'];
        //获取id值
        $id = \Yii::$app->request->get('id');
        $model = new User();
        $arr = $model->seleteone($id);
        //查询关系
        $sql = "SELECT id,statues,qq from hello where hello_id = '{$user_id}' and say_id = '{$id}'";
        $hellostatues = \yii::$app->db->createCommand($sql)->queryOne();
        $sql = "SELECT id,statues,qq from hello where hello_id = '{$id}' and say_id = '{$user_id}'";
        $saystatues = \yii::$app->db->createCommand($sql)->queryOne();

        $qq = '';
        $helloid = '';
        if($hellostatues)
        {
            $hello_statues = $hellostatues['statues'];
            $qq = $hellostatues['qq'];
            $helloid = $hellostatues['id'];
        }else{
            $hello_statues = '';
            $qq = '';
        }

        if($saystatues)
        {
            $say_statues = $saystatues['statues'];
            $helloid = $hellostatues['id'];
        }else{
            $say_statues = '';
        }

        return $this->render('sybianli',[
                'arr'=>$arr,
                'hello_statues'=>$hello_statues,
                'say_statues'=>$say_statues,
                'id'=>$helloid,
                'qq'=>$qq
            ]);
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    //首页
    public function actionIndex()
    {
        //查看跟我打招呼的人
        $hello = $this->actionHello();

        $data = $this->actionShow();
        return $this->render('index',[
                'data'=>$data,
                'hello'=>$hello
            ]);
    }

    //查询谁向我打过招呼
    public function actionHello()
    {
        //接收当前用户ID
        $session = \yii::$app->session;
        $hello_id = $session['user']['user_id'];
        //查询谁向我打过招呼
        $sql = "select Image,user_name,user_id from user join hello on hello.say_id=user.user_id where statues = '1' and hello.hello_id = '".$hello_id."'";
        $data = \yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    //完善个人资料
    public function actionPrefect()
    {
        // echo 1;exit;
        return $this->render('prefect');
    }

    //完善个人资料
    public function actionSybianli()
    {
        // echo 1;exit;
        return $this->render('sybianli');
    }
}
