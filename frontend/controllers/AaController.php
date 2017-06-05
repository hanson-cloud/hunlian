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
use yii\common\CommonController;

/**
 * Site controller
 */
class AaController extends Controller
{

    public function beforeAction($action)
    {

        $session=\Yii::$app->session;

        //取出存入的session值

        $session['user'] = [
            'user_id' => 111,
            'user_name' => 222,
        ];
        // echo 1;exit;
        // $id = $session['user']['user_id'];
        unset($_SESSION);
        //判断是否有登录session

        if(!isset($id))
        {

            echo "<script>alert('你还没有登录');location.href='?r=index/index'</script>";
        }
        else
        {
            echo "<script>alert('你还没有登录');location.href='?r=index/index'</script>";
        }
    }
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

    public function actionPwd_email()
    {
        $mail = \Yii::$app->mailer->compose()
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
        echo 123;exit;
        // return $this->render('index');
    }
    public function actionTest()
    {
        $model= new \frontend\models\Aa();
        if ($model->load(Yii::$app->request->post())) {
            // var_dump(Yii::$app->request->post());exit;
            $model->file = UploadedFile::getInstance($model, 'img');
            if ($model->file && $model->validate()) {                
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
            $a = $model->file->baseName . '.' . $model->file->extension;
            // echo $a;
            // echo "<br>";
            $data = Yii::$app->request->post()['Aa'];
            $data['img'] = "$a";
            //var_dump($data);exit;
            $a = $this->actionIns($data);
            // var_dump($a);
            return $this->redirect(['list']);
            // return $this->goBack();
        } else {
            return $this->render('test', [
                'model' => $model,
            ]);
        }
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

    public function actionGetall()
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT * FROM aa');
        $posts = $command->queryAll();
        return $posts;
        // var_dump($posts);exit;
//        $a = $db->select('id,content')->from('aa')->where(['id'=>1])->all();
//        print_r($a);
//        return $a;
    }

    public function actionIns($data)
    {
        $connection = \Yii::$app->db;
        $connection->createCommand()->insert('aa',$data)->execute();
    }

    public function actionList()
    {
        $a = $this->actionGetall();
        return $this->render('list', [
            'a' => $a,
        ]);
    }
}
