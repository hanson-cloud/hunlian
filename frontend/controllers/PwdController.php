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
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class PwdController extends Controller
{
    // public $layout = false;

    public function beforeAction($action)
    {

        $session=Yii::$app->session;

        //取出存入的session值

        $user_session=$session['user']['user_id']; 

        if(!isset($user_session))
        {
            echo "<script>alert('你还没有登录');location.href='?r=site/index'</script>";
        }
        else
        {
            return true;
        }
    }
    // public function actions()
    // {
    //     return [
    //         'error' => [
    //             'class' => 'yii\web\ErrorAction',
    //         ],
    //         // 新添加的
    //         'captcha' => [
    //             'class' => 'yii\captcha\CaptchaAction',
    //         ],
    //     ];
    // }    
    public function actionAbb()
    {
        Yii::$app->cache->set('id', 123);
        echo Yii::$app->cache->get('id');
    }
    public function actionPwd()
    {
        $model = new ContactForm(); 
        return $this->render('pwd',['model'=>$model]);
    }

    public function actionPwd_info()
    {
        require ('./Sendtel.php');
        $tel = Yii::$app->request->get('tel');
        $code = mt_rand(1000,9999);
        // echo $code;exit;
        $this->sendTemplateSMS($tel,array($code,'10'),'1');
        $cache = Yii::$app->cache;
        $cache->set('telcode', $code,60);
    }

    public function actionPwd_info1()
    {
        $return=[
            'code'=>'0',
            'msg'=>'验证码错误',
            'data'=>'12345',
        ];
        $codeInput = Yii::$app->request->get('codeInput');
        $cache = Yii::$app->cache;
        $code = $cache->get('telcode');
        if($codeInput == $code && $codeInput != '')
        {
            $return['code'] = '1';
            $return['msg'] = '正确';
        }
        echo json_encode($return);
    }

    function actionencodeing($sourcestr)  
    {
        $key_content = file_get_contents('./_test_public.key');  
        $pubkeyid    = openssl_get_publickey($key_content);  
          
        if (openssl_public_encrypt($sourcestr, $crypttext, $pubkeyid))  
        {
            return base64_encode("".$crypttext);  
        }
    }

/** 
 * 私钥解密 
 * 
 * @param string 密文（二进制格式且base64编码）
 * @param string 密文是否来源于JS的RSA加密 
 * @return string 明文 
 */  
    function actiondecodeing($crypttext)  
    {
        $key_content = file_get_contents('./_test.key');
        $prikeyid    = openssl_get_privatekey($key_content);
        $crypttext   = base64_decode($crypttext);
        // echo $crypttext;exit;
        if (openssl_private_decrypt($crypttext, $sourcestr, $prikeyid, OPENSSL_PKCS1_PADDING))
        {
            return "".$sourcestr;
        }
        return ;
    }

    public function actionGetall($sql)
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $posts = $command->queryAll();
        return $posts;
    }

    public function actionUpd($sql)
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $res = $command->execute();
        return $res;
    }

    public function actionPwd_pwd()
    {
        $upwd = Yii::$app->request->get('upwd');
        $new_upwd = md5($upwd);
        $id = Yii::$app->request->get('id');
        $sql1 = "UPDATE user set user_pwd = '$new_upwd' where user_id=".$id;
        // echo $sql1;exit;
        if($this->actionUpd($sql1))
        {
            echo 11;
        }
    }

    public function actionPwd_email()
    {
        $return=[
            'code'=>'1',
            'msg'=>'³É¹¦',
            'data'=>'12345',
        ];
        $caprcha = new \yii\captcha\CaptchaValidator();
        $uname = Yii::$app->request->get('uname');
        // echo $uname;exit;
        $txt = $this->actiondecodeing($uname);
        // echo $txt;exit;// json_encode
        $sql = "SELECT email,user_name from user where user_name='$txt'";
        // print_R(array($uname,$txt,$sql));exit;
        // echo $sql;exit;
        $contactform_verifycode = Yii::$app->request->get('contactform_verifycode');
        $bool = $caprcha->validate($contactform_verifycode);
        if(!$bool)
        {
            $return['code'] = 0;
            $return['msg'] = '验证码不正确';
        }
        else
        {
            $data = $this->actionGetall($sql);
            if($data)
            {
                $email = $data[0]['email'];
                $mail = Yii::$app->mailer->compose()
                ->setFrom(['17600179627@163.com' => 'Yii 中文网'])
                ->setTo($email)
                ->setSubject('修改密码')
                //->setTextBody('Yii中文网教程真好 www.yii-china.com')   //发布纯文字文本
                ->setHtmlBody("<a href='http://60.205.231.89/ww/yii2/frontend/web/index.php?r=pwd/pwd_email1'>点击修改密码</a>")    //发布可以带html标签的文本
                ->send();
                if($mail)
                {
                    //发送成功
                    $return['code'] = 1;
                    $return['msg'] = 'success';
                }
                else
                {
                    //发送失败
                    $return['code'] = -2;
                    $return['msg'] = 'failed';
                }
            }
            else
            {
                $return['code'] = -1;
                $return['msg'] = '用户名不存在';
            }
        }
        echo json_encode($return);
    }

    public function actionPwd_email1()
    {
        return $this->render('pwd1.php');
    }

    public function actionMailer2()
    {
        $mail = Yii::$app->mailer->compose()
                ->setFrom(['17600179627@163.com' => 'Yii 中文网'])
                ->setTo('853164272@qq.com')
                ->setSubject('邮件发送配置')
                //->setTextBody('Yii中文网教程真好 www.yii-china.com')   //发布纯文字文本
                ->setHtmlBody("<br>Yii中文网教程真好！www.yii-china.com")    //发布可以带html标签的文本
                ->send();
                if($mail)
                    echo 'success';
                else
                    echo 'fail';
    }


    public function actionAbc()
    {
        require ('./Sendtel.php');
        // $
        var_dump($this->sendTemplateSMS('18812613820','4562','1'));
    }

    public function sendTemplateSMS($to,$datas,$tempId)
    {
        //Ö÷ÕÊºÅ,¶ÔÓ¦¿ª¹ÙÍø·¢ÕßÖ÷ÕËºÅÏÂµÄ ACCOUNT SID
        $accountSid= '8aaf07085a35f696015a3a71a343020e';
//8a216da85a25f2dc015a3a713f740598
//Ö÷ÕÊºÅÁîÅÆ,¶ÔÓ¦¹ÙÍø¿ª·¢ÕßÖ÷ÕËºÅÏÂµÄ AUTH TOKEN
        $accountToken= 'e721f636bebc4ae99c9797b36b93bba8';
    
//35d98db4505847f88bc15aedba79072a
//Ó¦ÓÃId£¬ÔÚ¹ÙÍøÓ¦ÓÃÁÐ±íÖÐµã»÷Ó¦ÓÃ£¬¶ÔÓ¦Ó¦ÓÃÏêÇéÖÐµÄAPP ID
//ÔÚ¿ª·¢µ÷ÊÔµÄÊ±ºò£¬¿ÉÒÔÊ¹ÓÃ¹ÙÍø×Ô¶¯ÎªÄú·ÖÅäµÄ²âÊÔDemoµÄAPP ID
        $appId='8aaf07085a35f696015a3a71a5160215';//  8a216da85a25f2dc015a3a7141ea059e

        $serverIP='app.cloopen.com';
        $serverPort='8883';
        $softVersion='2013-12-26';
        $rest = new \Sendtel($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // ·¢ËÍÄ£°å¶ÌÐÅ
        // echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            echo "result error!";
            break;
        }
        if($result->statusCode!=0) {
            // echo "error code :" . $result->statusCode . "<br>";
            // echo "error msg :" . $result->statusMsg . "<br>";
            //TODO Ìí¼Ó´íÎó´¦ÀíÂß¼­
        }else{
            //echo "Sendind TemplateSMS success!<br/>";
            // »ñÈ¡·µ»ØÐÅÏ¢
            $smsmessage = $result->TemplateSMS;
            //echo "dateCreated:".$smsmessage->dateCreated."<br/>";
            //echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
            //TODO Ìí¼Ó³É¹¦´¦ÀíÂß¼­
        }
    }
       
}
?>
