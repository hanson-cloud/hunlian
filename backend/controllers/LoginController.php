<?php
namespace backend\controllers;

use Yii;
use yii\base\Model;
use app\models\Login;
use app\models\PHPMailer;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;



header("content-type: text/html; charset=utf-8");
class LoginController extends Controller{
    public $enableCsrfValidation = false;
    public $layout = false;

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLogin ()
    {
        return $this->render('login');
    }
    //登陆
    public function actionAdd(){
        $request = \YII::$app->request;
        if($request->isPost){
            $user = $request->post('admin_name');
            $pwd = $request->post('admin_pwd');
            $model = new Login();
            $user_info = $model->get_user($user,$pwd);
            if($user_info){
                $session = \YII::$app->session;
                $session->open();  		//开启session
                //存储 管理员信息
                $session->set("admin_login",true);//后台登陆
                $session->set("is_login",true);
                $session->set("user_info",$user_info);//登陆用户的信息
                return $this->redirect(['index/index']);//主页

            }else{
                echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
            }die;
        }
        $session = \YII::$app->session;
        $admin_login = $session->get("admin_login");//登陆信息
        if(!$admin_login){
            return $this->render('login');//登陆页面
        }else{
            return $this->redirect(['index/index']);//主页
        }
    }

    //退出
    public function actionLogout(){
        $session = \YII::$app->session;
        $session->removeAll();//注销  登陆session
        return $this->redirect(['login/login']);
    }



    public function actionMmm(){
               $email = Yii::$app->request->post('email');

             $mail= Yii::$app->mailer->compose();
             $mail->setTo("$email");
           $mail->setSubject("婚恋网后台系统");
           //$mail->setTextBody('zheshisha ');   //发布纯文字文本
              $mail->setHtmlBody("<a href='#'>点我有惊喜</a>");    //发布可以带html标签的文本
           if($mail->send()){
               return "1";
           }else{
               return "0";
           }
    }
    public function actionGg(){
        return $this->redirect(['login/gg']);
    }


    //修改密码--填写邮箱
    public function actionChange()
    {
        return $this->render('email');
    }

    //验证邮箱是否正确
    public function actionCheck()
    {
        $session = \yii::$app->session;
        $user_info = $session->get('user_info');
        $email = $user_info['admin_email'];
        $admin_email = \yii::$app->request->get('admin_email');
        // print_R(array($email,$admin_email));
        // exit;
        if($admin_email == $email)
        {
            //加密
            $url = $this->actionCode($user_info['id']);
            // echo $url;die;
            $info = $this->actionEmail($admin_email,$url);
            if($info){
                echo "1";
            }
            else{
                echo "2";
            }
        }else{
            echo "0";
        }
    }

    //加密管理员ID
    public function actionCode($admin_id)
    {
        if(!file_exists('./private.txt') || !file_exists('./public.txt'))
        {
            //生成私钥资源
            $pri_key = openssl_pkey_new();
            //保存私钥，生成私钥文件
            openssl_pkey_export_to_file($pri_key,'./private.txt');
            //从私钥中取出公钥
            $pub_key = openssl_pkey_get_details($pri_key)['key'];
            //保存公钥
            file_put_contents('./public.txt',$pub_key);
        }       

        //定义目标数据
        $id = $admin_id;
        //去取公钥--对象
        $pub_key = openssl_get_publickey(file_get_contents('./public.txt'));
        //加密
        openssl_public_encrypt($id,$encode_id,$pub_key);
        //加密的结果--进行base64加密--进行传输
        $url = base64_encode($encode_id);
        $url = urlencode($url);
        //传递
        return '<a target="_blank" href="http://siberian.top/ww/yii2/backend/web/index.php?r=login/decode&code='.$url.'">http://siberian.top/ww/yii2/backend/web/index.php?r=login/decode&code='.$url.'</a>';
    }

    //解密
    public function actionDecode()
    {
        //接收传过来的密文
        $code = \yii::$app->request->get('code');
        //base64解开
        $mi = base64_decode($code);
        //获取私钥
        $pri_key = openssl_get_privatekey(file_get_contents('./private.txt'));
        //用私钥解密
        openssl_private_decrypt($mi,$decode_id,$pri_key);
        $id = $decode_id;
        //显示修改页面
        return $this->render('change',[
            'id' => $id
            ]);
    }

    //发送邮件
    public function actionEmail($email,$url)
    {
        $mail= Yii::$app->mailer->compose();   
        $mail->setTo($email);  
        $mail->setSubject("修改密码");  
        //$mail->setTextBody('zheshisha ');   //发布纯文字文本
        $mail->setHtmlBody("点击链接，修改密码->".$url);    //发布可以带html标签的文本
        if($mail->send())  
        {
            return true;
        }
        else{
            return false;
        }  
    }

    //修改密码--数据库
    public function actionUpdate()
    {
        $data = \yii::$app->request->post();
        $sql = "update b_admin set admin_pwd = '{$data['admin_pwd']}' where id = '{$data['id']}'";
        $info = \yii::$app->db->createCommand($sql)->execute();
        if($info){
            echo "修改成功";
        }else{
            echo "修改失败";
        }
    }
}