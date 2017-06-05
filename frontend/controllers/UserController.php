<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\UploadForm;
use frontend\models\Album;
use yii\web\UploadedFile;
use yii\common\CommonController;
// use frontend\models\Rest;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends CommonController
{
    public $layout = false;
    public $enableCsrfValidation = true;
    // public $enableCsrfValidation = true
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        if(Yii::$app->request->post())
        {
            $data = Yii::$app->request->post();
            //var_dump($data);exit;
            $txt = Yii::$app->request->post('tel');
            $data['tel'] = intval($txt);
            $data['user_pwd'] = addslashes($data['user_pwd']);
            $data['user_pwd'] = md5($data['user_pwd']);
            unset($data['user_pwd2']);
            var_dump($data);exit;
            $user_id = $model->actionIns('user',$data);
            $session['user'] = [
                'user_id' => $user_id,
            ];
            return $this->redirect(['register/register_upload','user_id' => $user_id]);
        }
        else
        {
            return $this->render('register_info', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // public function actionRegister_upload()
    // {
    //     return $this->render('register_upload');
    // }

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

    public function actionPrefect()
    {
        $model = new User();

        if (Yii::$app->request->post()) 
        {
            $data = Yii::$app->request->post();
            // $data['user_pwd'] = md5($data['user_pwd']);
            var_dump(Yii::$app->request->post());exit;
            $model->actionIns('user',$data);
            return $this->redirect(['register_upload']);
        } else {
            return $this->render('register_info', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

}
