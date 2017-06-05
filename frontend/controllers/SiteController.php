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
use frontend\models\Wechat;

/**
 * Site controller
 */
class SiteController extends Controller
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
    public function actionIndex()
    {
        $cache = Yii::$app->cache;
        $openid = $cache->get('openid');
        $session = Yii::$app->session;
        // Yii::$app->cache->flush();
        if(null !== $session['user']['user_id'])
        {
            return $this->redirect(['index/index']);
        }
        else
        {
        	if($openid)
	        {
                // echo $openid;exit;
	        	$sql = "SELECT openid from weixin where openid ="."'$openid'";
	        	$data = $this->actionGetall($sql);
	        	if($data)
	        	{	
		            $this->redirect(['index/index']);
		            Yii::$app->cache->flush();
	        	}
	        	else
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
		            unset($arr['tagid_list']);
		            // print_R($arr);exit;
		            $this->actionIns('weixin',$arr);
	        		Yii::$app->cache->flush();
	        		echo "<script> alert ('登录成功'),location.href='http://60.205.231.89/ww/yii2/frontend/web/index.php?r=index/index'</script>";
	        	}
	        }
	        else
	        { 	
            	return $this->render('index');
	        }
        }
    }

    public function actionIns($tableName,$data)
    {
        $connection = \Yii::$app->db;
        $connection->createCommand()->insert($tableName,$data)->execute();
    }

    public function actionGetall($sql)
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $posts = $command->queryAll();
        return $posts;
    }

    public function actionErweima1()
    {
        // echo 1;exit;
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

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
