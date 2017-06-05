<?php
namespace backend\controllers;

use Yii;
use yii\base\Model;
use app\models\Activity;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use yii\data\Pagination;

class AdminController extends Controller{
	public $layout = false;
    public function actionAdmin(){
        $sql="select * from b_admin";
        $res=Yii::$app->db->createCommand($sql)->queryAll();
        if ($res) {
            return $this->render('list', array('data' => $res));
        }

    }
}