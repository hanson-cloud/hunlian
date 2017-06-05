<?php
/**
 * Site controller
 */
class Excel
{
    public function bb()
    {
        return 1;
    }
	// public function actionExcel()
	// {
	// // $str=iconv('utf-8','gbk','你');
	// // var_dump(ord(substr($str,0,1))*256+ord(substr($str,1,1)));die;
	// }

	// public function actionExcelout()
	// {
 //        //引用PHPexcel 类
 //        include_once('./PHPExcel.php');
 //        //静态类
 //        include_once('./PHPExcel/IOFactory.php');
 //        $data=array(
 //            array(
 //                '0'=>'1',
 //                '1'=>'刘军',
 //                '3'=>'20',
 //                '4'=>'男',
 //                '5'=>'15710016882',
 //                '6'=>'北京',
 //                '7'=>'20170501'
 //            )
 //        );
 //        $excel = new \PHPExcel();

 //        //Excel表格式,这里简略写了8列
 //        $letter = array('A','B','C','D','E','F','G');

 //        //表头数组
 //        $tableheader = array('编号','姓名','年龄','性别','手机号','所在地区','时间');

 //        //填充表头信息
 //        for($i = 0;$i < count($tableheader);$i++) {

 //            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");

 //        }

 //        for ($i = 2;$i <= count($data) + 1;$i++) {

 //            $j = 0;

 //            foreach ($data[$i - 2] as $key=>$value) {

 //                $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");

 //                $j++;

 //            }

 //        }

 //        $write = new \PHPExcel_Writer_Excel5($excel);

 //        header("Pragma: public");

 //        header("Expires: 0");

 //        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");

 //        header("Content-Type:application/force-download");

 //        header("Content-Type:application nd.ms-execl");

 //        header("Content-Type:application/octet-stream");

 //        header("Content-Type:application/download");;

 //        header('Content-Disposition:attachment;filename="excel.xls"');

 //        header("Content-Transfer-Encoding:binary");

 //        $write->save('php://output');

 //    }



 //    public function actionReport()
 //    {    
 //    	return $this->render('report');
	// }

	// public function actionReportdo()
	// {    
	// 	if (!empty($_FILES['excel']['tmp_name']))    
	// 	{        
	// 		$email = $_FILES['excel'];        
 //            //拼接文件的名称，将当前时间做为文件名        
	// 	    $filename = time() . substr($email['name'], strripos($email['name'], '.'));               
	// 	    $path = './uploads/' . $filename; //路径        
	// 	    //move_uploaded_file 移动上传过文件 第一个参数 临时文件的名字 ，要新生成的文件的路径和名字
	// 	    move_uploaded_file($email['tmp_name'], $path);        
 //            //要把excel 转化成数组，调用下边的方法，直接调用的话方法前面要加action        
	// 	    $e = $this->actionReadExcel($path);        
	// 	    foreach ($e as $k=>$v)        
	// 	    {            
	// 	    	if($k>0)            
	// 	    	{                
	// 	    		$sql="insert into member(id,name,age) VALUE('$v[0]','$v[1]','$v[2]')";                
	// 	    		\yii::$app->db->createCommand($sql)->execute();            
	// 	    	}        
	// 	    }    
 //    	}
    		
 //    }

 //    function actionReadExcel($path)
 //    {    
 //    	//引入PHPExcel类库
 //    	//引用PHPexcel 类
 //        include_once('./PHPExcel.php');
 //        //静态类
 //        include_once('./PHPExcel/IOFactory.php');
    
 //    	$type = 'Excel5';//设置为Excel5代表支持2003或以下版本，Excel2007代表2007版    
 //    	$xlsReader = \PHPExcel_IOFactory::createReader($type);    
 //    	$xlsReader->setReadDataOnly(true);    
 //    	$xlsReader->setLoadSheetsOnly(true);    
 //    	$Sheets = $xlsReader->load($path);    //开始读取上传到服务器中的Excel文件，返回一个二维数组    
 //    	$dataArray = $Sheets->getSheet(0)->toArray();    //var_dump($dataArray);die;    
 //    	return $dataArray;
 //    }

}
