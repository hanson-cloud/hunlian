<?php
namespace backend\controllers;

use Yii;
use yii\base\Model;
use backend\models\Activity;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
// use yii\filters\VerbFilter;
// use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use yii\data\Pagination;
use common\models\Page;//分页类
class ActivityController extends Controller{
    public $layout = false;
    //展示  分页

    public function actionActivity ()
    {
        $model=new Activity();	//实例化model模型
        $count =  $model->find()->count();

        $page_size = 2;//每页显示条数
        //实例化分页类
        $Page=new Page($count,$page_size,$fen = "1");
        
        $sql = "select * from yii_appointment limit {$Page->limit},{$Page->size}";
        $list = \yii::$app->db->createCommand($sql)->queryAll();

        // $list = $model->find()->offset(2)->limit(0)->asArray()->all();

        return $this->render('show', [
            'list' => $list,
            'pages'  => $Page->getPage()
        ]);

    }



    public function actionActivity_add ()
    {

        return $this->render('activity_add');
    }

    public $enableCsrfValidation = false;

    //活动入库
    public function actionAdd(){

        $appointment_img = $_FILES["appointment_img"];
        $path = '/data/wwwroot/default/ww/yii2/common/img/';
        // echo $path;exit;
        $name = $path.$appointment_img['name'];
        move_uploaded_file($appointment_img["tmp_name"],$name);
        $new_name = substr($name,strpos($name,'/ww'));
        $new_name="$new_name";
        $appointment_title = Yii::$app->request->post("appointment_title");
        $address = Yii::$app->request->post("address");
        $now = time();
        $session = \YII::$app->session;
        $admin_login = $session->get("user_info");
        $admin_login =$admin_login['id'];
        $appointment_content = Yii::$app->request->post("appointment_content");
        $data = Yii::$app->db->createCommand("insert into yii_appointment (appointment_image,appointment_title,appointment_content,appointment_time,b_admin_id,address) VALUES ('$new_name','$appointment_title','$appointment_content',' $now',' $admin_login','$address')")->query();
        if($data){
            return $this->redirect(['activity/activity']);//主页
            }else{

               echo "添加失败";
            }
    }
    //活动删除
    public function actionDel(){

        $id = \yii::$app->request->get('id');
        $data = Yii::$app->db->createCommand("delete from yii_appointment where id='$id'")->query();
        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }

    //搜索分页
    public function actionSearch(){

        $search = \yii::$app->request->get('search');
        $sql = " 1=1 ";
        if(!empty($search)){
            $sql .= "and appointment_title like '%".$search."%' ";
        }
        $model=new Activity();	//实例化model模型
        $count =  $model->find()->where($sql)->count();
        $pages = new Pagination([
            'totalCount' => $count,
            'pageSize'   => 2  //每页显示条数
        ]);
        $list = $model->find()->offset($pages->offset)->limit($pages->limit)->where($sql)->asArray()->all();
        return $this->render('show', [
            'list' => $list,
            'pages'  => $pages
        ]);
    }
    //批删
    public function actionDelall()
    {
        $id = \YII::$app->request->get('str');
        $roleObj = new Activity();
        $re = $roleObj->deleteAll(['in','id',explode(',',$id)]);
        if($re)
        {
            echo 1;
        }else{
            echo 0;
        }
    }
    //集点集改
    public  function actionGai()
    {
        $id = \yii::$app->request->post('id');
        $bb = \yii::$app->request->post('news');
        $re =Yii::$app->db->createCommand("update yii_appointment set appointment_title='$bb ' where id='$id'")->query(); ;
        if ($re) {
            return 1;
        } else {
            echo 0;
        }
    }

    // 内容  集点集改
    public  function actionGai_t()
    {
        $id = \yii::$app->request->post('id');
        $bb = \yii::$app->request->post('news');
        $re =Yii::$app->db->createCommand("update yii_appointment set appointment_content='$bb ' where id='$id'")->query(); ;
        if ($re) {
            return 1;
        } else {
            echo 0;
        }
    }
}
