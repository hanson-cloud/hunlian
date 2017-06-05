<?php
namespace frontend\controllers;
// use Codeception\Module\Memcache;
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
use frontend\models\Active;//活动模型类
use common\models\Page;//分页类
use yii\common\CommonController;

/**
 * Site controller
 */
class ActiveController extends Controller{
	public $layout = false;
    public $user_id;
	// public $enableCsrfValidation = false;
	//显示活动页面
	public function actionIndex()
	{
        //查看当前用户参加过的活动
        $session = \yii::$app->session;
        $user_id = $session['user']['user_id'];
        // echo $user_id;die;
        $sql = "select a_id from user_appointment where user_id = '{$user_id}'";
        // echo $sql;exit;
        $user_ap = \yii::$app->db->createCommand($sql)->queryAll();
        // print_R($user_ap);exit;
        $user_a = [];
        foreach($user_ap as $k => $v)
        {
            $user_a[] = $v['a_id'];
        }

        $data = $this->actionShow(false);
        return $this->render('index',[
            'sel'=>$data['sel'],
            'page'=>$data['page_str'],
            'page_total'=>$data['page_total'],
            'user_ap'=>$user_a,
        ]);
	}

    //往期回顾
    public function actionAgo()
    {
        $data = $this->actionShow(false,1);
        return $this->render('ago',[
            'sel'=>$data['sel'],
            'page'=>$data['page_str'],
            'page_total'=>$data['page_total'],
        ]);
    }


    //显示分页
    public function actionShow($display = true,$ago = "0")
    {
        $session = \yii::$app->session;
        $user_id = $session['user']['user_id'];
        if($ago == "0"){
            //查看当前用户参加过的活动
            $sql = "select a_id from user_appointment where user_id = ".$user_id;
            $user_ap = \yii::$app->db->createCommand($sql)->queryAll();
            $user_a = [];
            foreach($user_ap as $k => $v)
            {
                $user_a[] = $v['a_id'];
            }
            $fuhao = ">";
        }
        else{
            $fuhao = "<=";
        }
        $data = Active::find()->where("appointment_time ".$fuhao." ".time());

        $page_size = 2;//每页显示条数
        $count = $data->count();//数据总数
        //实例化分页类
        $Page=new Page($count,$page_size);
        $sql = "select * from yii_appointment where appointment_time ".$fuhao." ".time()." limit {$Page->limit},{$Page->size}";
        $sel = \yii::$app->db->createCommand($sql)->queryAll();

        //如果是往期，循环查出参加用户姓名
        if($fuhao == "<=")
        {
            foreach($sel as $keys => $value){
                $sql = "select user_name from user join user_appointment on user.user_id = user_appointment.user_id where user_appointment.a_id = {$value['id']} limit 2";
                $user_name = \yii::$app->db->createCommand($sql)->queryAll();
                $sel[$keys]['user_name'] = "";
                if(!empty($user_name)){
                    $sel[$keys]['user_name'] = "参加人员:";
                    foreach($user_name as $kk => $vv){
                        $sel[$keys]['user_name'] .= $vv['user_name']." ";
                    }
                    $sel[$keys]['user_name'] .= "<a href='javascript:void(0);' class='user_name' opt='{$value['id']}''>查看更多</a>";
                }

            }
        }

        if($ago == "0"){
            foreach($sel as $key => $val)
            {
                if(in_array($val['id'],$user_a))
                {
                    $sel[$key]['join'] = '取消加入';
                }
                else{
                    $sel[$key]['join'] = '点击加入';
                }
                $sel[$key]['appointment_time'] = date("Y-m-d H:m:s",$val['appointment_time']);
            }
        }
        else if($ago != "0")
        {
            foreach($sel as $key => $val){
                $sel[$key]['appointment_time'] = date("Y-m-d H:m:s",$val['appointment_time']);
            }
        }

        $page_str=$Page->getPage();

        if($display)
        {
            echo json_encode($sel);
        }
        else if(!$display)
        {
            $arr['sel'] = $sel;
            $arr['page_str'] = $page_str;
            $arr['page_total'] = $Page->total;
            return $arr;
        }
    }

    //查看活动全部参与人员
    public function actionShow_user_name($ago = "0")
    {
        $id = \yii::$app->request->get('id');
        $sql = "select user_name from user join user_appointment on user.user_id = user_appointment.user_id where user_appointment.a_id = {$id}";
        $user_name = \yii::$app->db->createCommand($sql)->queryAll();
        $username = "参加人员:";
        foreach($user_name as $kk => $vv){
            $username .= $vv['user_name']." ";
        }
        if($ago == "0")echo $username;
        else{
            return $username;
        }
    }

    //判断用户点击次数
    public function actionClick($user_id,$a_id)
    {
        //判断一小时内 一个用户 一个活动点了几次
        $cache = Yii::$app->cache;
        if($cache->get($user_id."_".$a_id)){
            $click = $cache->get($user_id."_".$a_id);
            //如果一小时内点击次数少于3次，次数＋1
            if($click['click_num'] < 2 && time()-$click['time'] < 3600){
                $click['click_num'] = $click['click_num']+1;
                $cache->set($user_id."_".$a_id,$click,3600);
                return "true";
            }
            //如果一小时内点击次数为第三次，锁定点击
            else if($click['click_num'] == 2 && time()-$click['time'] < 3600){
                $click['click_num'] = 3;
                $click['time'] = time()+3600;
                $cache->set($user_id."_".$a_id,$click,3600);
                return "true";
            }
            //如果已被锁定，必须等到规定时间才能继续
            else if(time() < $click['time']){
                return date("Y-m-d H:m:s",$click['time']);
            }
            //如果距离click_num = 1时的time超过1小时,重新计数
            else if(time()-$click['time'] >= 3600){
                $cache->set($user_id."_".$a_id,array('click_num'=>1,'time'=>time()),3600);
                return "true";
            }
        }else{
            $time = time();
            $cache->set($user_id."_".$a_id,array('click_num'=>'1','time'=>$time),3600);
            return "true";
        }
    }

    //用户点击参加活动
    public function actionJoin()
    {
        //接收活动ID  用户ID  用户需求
        $session = \yii::$app->session;
        $a_id = \yii::$app->request->get('id');
        $user_id = $session['user']['user_id'];
        $need = \yii::$app->request->get('need');

        //调用点击次数方法
        $click = $this->actionClick($user_id,$a_id);

        //如果need == “点击加入” 进行两个表添加
        if($need == "点击加入" && $click == "true")
        {
            //向用户--活动表  添加数据
            $sql = "insert into user_appointment (user_id,a_id) values('{$user_id}','{$a_id}')";
            $info = \yii::$app->db->createCommand($sql)->execute();

            //活动表 man_num(参加人数)字段加 1
            $sql = "update yii_appointment set man_num = man_num+1 where id = '{$a_id}'";
            $info2 = \yii::$app->db->createCommand($sql)->execute();

            //如果两个都为成功
            if($info && $info2)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }

        //如果need == “取消加入” 进行两个表删除
        if($need == "取消加入" && $click == "true")
        {
            //向用户--活动表  删除数据
            $sql = "delete from user_appointment where user_id = '{$user_id}' and a_id = '{$a_id}'";
            $info = \yii::$app->db->createCommand($sql)->execute();

            //活动表 man_num(参加人数)字段减 1
            $sql = "update yii_appointment set man_num = man_num-1 where id = '{$a_id}'";
            $info2 = \yii::$app->db->createCommand($sql)->execute();

            //如果两个都为成功
            if($info && $info2)
            {
                echo 2;
            }
            else
            {
                echo 3;
            }
        }
        if($click != "true"){
            echo $click;
        }
    }

    //显示详情页
    public function actionContent()
    {
        $id = \yii::$app->request->get('id');
        //查询活动详情
        $sql = "select * from yii_appointment join b_admin on yii_appointment.b_admin_id = b_admin.id where yii_appointment.id = {$id}";
        $data = \yii::$app->db->createCommand($sql)->queryOne();
        $data['appointment_time'] = date("Y-m-d H:m:s",$data['appointment_time']);
        //如果是往期活动详情,传参加人员名单
        if(\yii::$app->request->get('ago')){
            $username = $this->actionShow_user_name("1");
        }
        else{
            $username = "活动火热招募中";
        }
        //显示详情页
        return $this->render('view',[
            'data' => $data,
            'username' => $username
        ]);

    }

    //活动详情导出
    public function actionExcelout()
    {
        //接收信息
        $data = \yii::$app->request->get();
        array_shift($data);
        $title = $data['title'];
        //引用PHPexcel 类
        include_once('./PHPExcel.php');
        //静态类
        include_once('./PHPExcel/IOFactory.php');
        $data=array(
            array(
                '0'=>$data['title'],
                '1'=>$data['content'],
                '2'=>$data['times'],
                '3'=>$data['address']
            )
        );

        $excel = new \PHPExcel();
        //Excel表格式,这里简略写了8列
        $letter = array('A','B','C','D');
        //表头数组
        $tableheader = array('活动标题','活动内容','活动时间','活动地点');

        //填充表头信息
        for($i = 0;$i < count($tableheader);$i++) {

            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");

        }

        for ($i = 2;$i <= count($data) + 1;$i++) {

            $j = 0;

            foreach ($data[$i - 2] as $key=>$value) {

                $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");

                $j++;

            }

        }

        $write = new \PHPExcel_Writer_Excel5($excel);

        header("Pragma: public");

        header("Expires: 0");

        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");

        header("Content-Type:application/force-download");

        header("Content-Type:application nd.ms-execl");

        header("Content-Type:application/octet-stream");

        header("Content-Type:application/download");

        header('Content-Disposition:attachment;filename="'.$title.'.xls"');

        header("Content-Transfer-Encoding:binary");

        $write->save('php://output');

    }

}
?>