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

/**
 * Site controller
 */

class TalkController extends Controller
{
	//打招呼--ajax请求
	public function actionSayhello()
	{
		//接收当前用户ID  名字
		$session = \yii::$app->session;
		$say_id = $session['user']['user_id'];
		$say_name = $session['user']['user_name'];
		//接收被打招呼的人的ID  名字
		$hello_id = \yii::$app->request->get('hello_id');
		$hello_name = \yii::$app->request->get('hello_name');
		//接收qq
		$qq = \yii::$app->request->get('qq');
		//把这些信息存到hello表
		$sql = "insert into hello(say_id,say_name,qq,hello_id,hello_name,statues) values('".$say_id."','".$say_name."','".$qq."','".$hello_id."','".$hello_name."','1')";
		$info = \yii::$app->db->createCommand($sql)->execute();
		//如果入库成功，输出1
		if($info)
		{
			echo "1";
		}
		//失败，输出0
		else{
			echo "0";
		}
	}

	//同意请求
	public function actionAgree()
	{
		//接收hello.id
		$helloid = \yii::$app->request->get('id');
		//修改状态
		$sql = "update hello set statues = 2 where id = '{$helloid}'";
		$info = \yii::$app->db->createCommand($sql)->execute();
		//查看qq
		$sql = "select qq from hello where id = '{$helloid}'";
		$qq = \yii::$app->db->createCommand($sql)->queryOne();
		$qq = $qq['qq'];
		if($info)
		{
			echo $qq;
		}
		else{
			echo "0";
		}
	}

	//拒绝
	public function actionDisagree()
	{
		//接收hello.id
		$helloid = \yii::$app->request->get('id');
		//改变状态
		$sql = "update hello set statues = 3 where id = '{$helloid}'";
		$info = \yii::$app->db->createCommand($sql)->execute();
		if($info)
		{
			echo "1";
		}
		else{
			echo "0";
		}
	}
}