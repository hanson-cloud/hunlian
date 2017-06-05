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
use frontend\models\UploadForm;
use frontend\models\Album;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class RegisterController extends Controller
{
    public $layout = false;
    /**
     * @inheritdoc
     */

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

    public function actionRegister()
    {
        // echo 1;exit;
        // if (Yii::$app->request->post()){
        //     var_dump(Yii::$app->request->post());
        //     // return '1';
        // } else {
        //     return $this->render('register');
        // }
    }

    public function actionRegister_info()
    {
        return $this->render('register_info');
    }

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

    public function actionTel_verify()
    {
        $return = [
            'code'=>0,
            'msg'=>''
        ];
        $model = new User();
        $tel = Yii::$app->request->get('tel');
        $txt = $this->actiondecodeing($tel);
        if($tel)
        {
            // echo $tel;exit;
            $sql = "SELECT * from user where tel = "."'$txt'";
            // echo $where;exit;
            $user_id = $model->actionList($sql);
            if($user_id)
            {
                $return['msg'] = '手机号已存在';
            }
            else
            {
                $return['msg'] = '手机号可以注册';
                $return['code'] = 1;
            }
        }
        else
        {
            $return['msg'] = '手机号必须填写';
            $return['code'] = -1;
        }
        // print_R($return);
        echo json_encode($return);
    }



    public function actionRegister_upload($user_id)
    {
        $upload_model = new UploadForm();
        $album_model = new Album();
        if(Yii::$app->request->isPost)
        { 
            $upload_model->file = \yii\web\UploadedFile::getInstances($upload_model, 'file');
            if ($file = $upload_model->upload()) 
            {
                // 文件上传成功
                $arr =[];
                for ($i=0; $i < count($file); $i++) 
                { 
                    $arr[$i][] = $file[$i];
                    $arr[$i][] = Yii::$app->request->get('user_id');
                }
                $bloon = Yii::$app->db->createCommand()
                ->batchInsert('album', ['file','u_id'], $arr)
                ->execute();
                if($bloon)
                {
                    echo "<script>alert('上传成功');location.href='?r=index/index'</script>";
                    // return $this->redirect(['index/index', 'id' => $album_model->id]);
                }
                else
                {
                    return $this->render('register_upload', [
                    'user_id' => $user_id,
                    'upload_model' => $upload_model,
                    'album_model' => $album_model,
                    ]);
                } 
            }
            else
            {
                return $this->render('register_upload', [
                    'user_id' => $user_id,
                    'upload_model' => $upload_model,
                    'album_model' => $album_model,
                    ]);
            }
        }
        else 
        {
            return $this->render('register_upload', [
                'user_id' => $user_id,
                'upload_model' => $upload_model,
                'album_model' => $album_model,
            ]);
        }
    }
}
