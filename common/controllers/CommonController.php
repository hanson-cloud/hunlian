<?php
namespace common\controllers;

use yii\web\Controller;


class CommonController extends Controller
{

	public function beforeAction($action)
	{

		$session=\Yii::$app->session;

		//ȡ�������sessionֵ

		$session['user'] = [
		    'user_id' => 111,
		    'user_name' => 222,
        ];
		$id = $session['user']['user_id'];
		//�ж��Ƿ��е�¼session

		if(!isset($id))
		{

			echo "���ȵ�¼";die;
		}
	}

}

// class CommonController extends Controller
// {
// 	// public function beforeAction($action)
// 	// {
// 	// 	$session=\Yii::$app->session;
// 	// 	//ȡ�������sessionֵ
// 	// 	$user_session=$session['user']['user_id'];       
// 	// 	//�ж��Ƿ��е�¼session
// 	// 	if(null === $user_session)
// 	// 	{
// 	// 		echo "<script>alert('�㻹û�е�¼');location.href='?r=site/index'</script>";
// 	// 	}
// 	// 	else
// 	// 	{
// 	// 		return true;
// 	// 	}
// 	// }

// 	public function __construct()
// 	{
// 		//��common�ĸ���ķ������Լ̳�
// 		parent::__construct();
// 		$session=\Yii::$app->session;
// 		//ȡ�������sessionֵ
// 		$user_session=$session['user']['user_id']; 
// 		if(null === $user_session)
// 		{
// 			echo 1213;exit;
// 			echo "<script>alert('�㻹û�е�¼');location.href='?r=site/index'</script>";
// 		}
// 		else
// 		{
// 			echo 'wrfew';exit;
// 			return true;
// 		}
// 	}
// }
?>