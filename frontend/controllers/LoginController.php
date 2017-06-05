<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use frontend\models\User;
use yii\web\Session;
/**
 * Site controller
 */
class LoginController extends Controller
{

    public function actionLogin()
    {
        if(\yii::$app->request->isAjax)
        {
            // print_r(\yii::$app->request->get());
            $user = \yii::$app->request->get('user');
            $password = md5(\yii::$app->request->get('pwd'));
            $check = \yii::$app->request->get('check');
            //¸ù¾ÝÓÃ»§Ãû²éÑ¯ÃÜÂë
            $model = new User();
            $arr = $model->selone($user);
            if($arr)
            {
                if($arr['user_pwd'] == $password)
                {
                    $session = Yii::$app->session;
                    if($check == 'true')
                    {
                        $lifeTime = 3600*24;
                        $session['user'] = [
                        'user_id' => $arr['user_id'],
                        'user_name' => $arr['user_name'],
                        ];
                        setcookie(session_name(), session_id(), time() + $lifeTime, '/');
                        $data = ['msg'=>'成功','code'=>2];
                        // print_r($data);die;
                        // exit(json_encode($data));
                    }
                    else
                    {
                        $session['user'] = [
                        'user_id' => $arr['user_id'],
                        'user_name' => $arr['user_name'],
                        ];
                        $data = ['msg'=>'成功','code'=>2];
                        // exit(json_encode($data));
                    }

                }
                else
                {
                    $data = ['msg'=>'密码错误','code'=>1];
                    // exit(json_encode($data));
                }
            }
            else
            {
                $data = ['msg'=>'用户名错误','code'=>0];
                // exit(json_encode($data));
            }
            exit(json_encode($data));
        }
        else
        {
            return $this->redirect(array('/site/index'));
        }
    }

    public function actionLoginout()
    {
        $session = Yii::$app->session;
        unset($session['user']);
        return $this->goHome();
    }
    
}
