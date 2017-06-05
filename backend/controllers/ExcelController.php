<?php
/**
 * @Author: anchen
 * @Date:   2017-02-25 08:45:22
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-02-25 15:57:32
 */
namespace frontend\controllers;
require dirname(dirname(__FILE__)).'/classes/PHPExcel.php';
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
use PHPExcel;
use PHPExcel_Writer_Excel5;

Class ExcelController extends Controller{
    public $enableCsrfValidation = false;
    public function actionExcel(){
        $name = yii::$app->request->get('name');
        $age = yii::$app->request->get('age');
        $sex = yii::$app->request->get('sex');
        $phone = yii::$app->request->get('phone');
        $city = yii::$app->request->get('city');
        $time = yii::$app->request->get('time');
        $sql="select * from excel";
       $data = \yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('excel',['data'=>$data]);
     /*   $search=yii::$app->request->post('search');
         if(empty($search)){
            $search = '';
        }else{

        }
            $sql = "select * from excel where name like '%".$search."%'";
             $data = \yii::$app->db->createCommand($sql)->queryAll();
             return $this->render('excel',['data'=>$data,'search'=>$search]);
*/

    }
   public function actionExc()
    {
        //echo "1";die;
        header("content-type:textml;charset=utf-8");

        $ary=yii::$app->db->createCommand("select * from excel")->queryAll();
       // $ary = yii::$app->db->createCommand("select * from goods")->queryAll();


        //创建一个excel
        $objPHPExcel = new PHPExcel();
       //var_dump($objPHPExcel);die;
        // 设置当前的sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // 设置sheet的name
        $objPHPExcel->getActiveSheet()->setTitle('偶的天');

        $count = count($ary);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . 1,'我的excel' );//标题 减一是旷ABCD那一行

        $count = count($ary);
        //$objPHPExcel->getActiveSheet()->setCellValue('A' . 1,'ID' );//标题 减一是旷ABCD那一行
        $objPHPExcel->getActiveSheet()->setCellValue('B' . 1,'姓名' );//标题 减一是旷ABCD那一行
        $objPHPExcel->getActiveSheet()->setCellValue('C' . 1,'年龄' );//标题 减一是旷ABCD那一行
        $objPHPExcel->getActiveSheet()->setCellValue('D' . 1,'性别' );//标题 减一是旷ABCD那一行
        $objPHPExcel->getActiveSheet()->setCellValue('E' . 1,'手机号' );//标题 减一是旷ABCD那一行
        $objPHPExcel->getActiveSheet()->setCellValue('F' . 1,'所在城市' );//标题 减一是旷ABCD那一行
         $objPHPExcel->getActiveSheet()->setCellValue('G' . 1,'注册时间' );//标题 减一是旷ABCD那一行

        //遍历数据
        for ($i = 2; $i <= $count+1; $i++) {
            //$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $ary[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $ary[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $ary[$i-2]['age']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $ary[$i-2]['sex']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $ary[$i-2]['phone']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $ary[$i-2]['city']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $ary[$i-2]['time']);
        }


        // 设置下载头
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:applicationnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename="我的excel.xls"');//设置文件名
        header("Content-Transfer-Encoding:binary");
        //        //创建第二个类
        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter->save('php://output');//输出文件
    }

}
