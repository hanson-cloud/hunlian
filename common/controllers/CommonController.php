<?php
namespace common\controllers;

use yii\web\Controller;


class CommonController extends Controller
{

	public function beforeAction($action)
	{

		$session=\Yii::$app->session;

		//取出存入的session值

		$session['user'] = [
		    'user_id' => 111,
		    'user_name' => 222,
        ];
		$id = $session['user']['user_id'];
		//判断是否有登录session

		if(!isset($id))
		{

			echo "请先登录";die;
		}
	}

}

// class CommonController extends Controller
// {
// 	// public function beforeAction($action)
// 	// {
// 	// 	$session=\Yii::$app->session;
// 	// 	//取出存入的session值
// 	// 	$user_session=$session['user']['user_id'];       
// 	// 	//判断是否有登录session
// 	// 	if(null === $user_session)
// 	// 	{
// 	// 		echo "<script>alert('你还没有登录');location.href='?r=site/index'</script>";
// 	// 	}
// 	// 	else
// 	// 	{
// 	// 		return true;
// 	// 	}
// 	// }

// 	public function __construct()
// 	{
// 		//把common的父类的方法属性继承
// 		parent::__construct();
// 		$session=\Yii::$app->session;
// 		//取出存入的session值
// 		$user_session=$session['user']['user_id']; 
// 		if(null === $user_session)
// 		{
// 			echo 1213;exit;
// 			echo "<script>alert('你还没有登录');location.href='?r=site/index'</script>";
// 		}
// 		else
// 		{
// 			echo 'wrfew';exit;
// 			return true;
// 		}
// 	}
// }
?>