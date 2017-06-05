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
use yii\db\Query;
use yii\data\Pagination;

/**
 * 前台搜索首页
 */
class SearchController extends Controller
{
	public $layout = false;

	//展示 前台搜索首页面
	public function actionIndex()
	{
		// $this->layout='main';
		//用户id
		$user_id=1;
		//根据用户的性别 展示异性资料
		$model = new User();
		$where= $model->getall($user_id);
		
		//分页
		$query = new Query();
		$query->from("user");
		$query->andWhere($where);
		$pagination = new Pagination(['totalCount' => $query->count(),'pageSize' => 2,]);
		$arr = $query->offset($pagination->offset)->limit($pagination->limit)->all();

		
		return $this->render('search.html',['arr'=>$arr,'pagination'=>$pagination]);
	}


	


	//执行多条件搜索
	public function actionSearchdo()
	{

		// 接收要搜索的数据
		$val = Yii::$app->request->get();
		//截取地区名
		$pos = strpos($val['address'],' ');
		$province = substr($val['address'],0,$pos);
		$city = substr($val['address'],$pos+1);

		$sex =$val['gender'];
		$agebegin= $val['agebegin'];
		$ageend=$val['ageend'];
		$degree=$val['education'];
		$salary=$val['pay'];
		$marital_state=$val['marriage'];
		$h1 =$val['h1'];
		$h2 = $val['h2'];
		
		//判断身高 是否为不限
		if($val['h1']==-1)
		{
			$h1=0;
		}
		if($val['h2']==-1)
		{
			$h2=210;
		}
		//拼接where
		$where = array('1=1');

		if($val)
		{
			$where[]="sex ='$sex'";//性别
			$where[]="age >$agebegin";//年龄
			$where[]="age<'$ageend'";//年龄
			$where[]="province='$province'";//省
			$where[]="City='$city'";//市/区
			$where[]="degree='$degree'";//学历
			$where[]="salary='$salary'";//月收入
			$where[]="marital_state='$marital_state'";//婚姻状况
			$where[]="height>'$h1'";//身高
			$where[]="height<'$h2'";//身高
			
		}

		//将where数组变成字符串
		$where = implode(' and ', $where);
		//多条件搜索
		$model = new \frontend\models\User();
		$data = $model->get($where);
		//判断内心独白 是否大于45字节 如果大于 替换成...
		foreach($data as $k=>$v)
		{
			if(strlen($v['detail'])>45)
			{
				$str = substr_replace($v['detail'],'...',45);
				$data[$k]['detail']=$str;
			}


		}
		
		echo json_encode($data);
		
		
	}


	// 详情
	public function actionDetail()
	{
		$user_id = \yii::$app->request->get('id');
		//根据用户id查找 用户信息
		$where = "user.user_id=$user_id";

		$model = new User();

		//详情以及基础信息
		$data['detail_arr'] = $model->getdetail($where);
		//获取生活状况信息
		$data['life_arr'] = $model->getlife($user_id);
		//获取用户兴趣爱好信息
		$data['hobby_user'] = $model->gethobby($user_id);
		//获取择偶条件信息
		$data['mate_arr'] =$model->getmate($where);

		//获取详细信息里的 基本信息
		$base_arr=[
					'sex'=>$data['mate_arr']['sex'],
					'height'=>$data['mate_arr']['height'],
					'salary'=>$data['mate_arr']['salary'],
					'marital_state'=>$data['mate_arr']['marital_state'],
					'work_areas'=>$data['mate_arr']['work_areas'],
					'profession'=>$data['mate_arr']['profession'],
					'age'=>$data['mate_arr']['age'],
				];
		// print_r($base_arr);die;
		//拼where条件
		$where = array('1=1');
		if($base_arr)
		{
			$sex = $base_arr['sex'];//性别
			$startheight = substr($base_arr['height'],0,3);//身高最低限度
			$endheight = substr($base_arr['height'],4);//身高最高限度
			$yuan = strpos($base_arr['salary'],'Ԫ');
			$income = substr($base_arr['salary'],0,$yuan);//月收入
			$marital_state= $base_arr['marital_state'];//婚姻状况
			$work_areas = $base_arr['work_areas'];//工作地点
			//判断职业 是不是不限 
			if($base_arr['profession']=='不限')
			{
				$profession='';
			}
			else
			{
				$profession = $base_arr['profession'];//职业
			}
			$pos = strpos($base_arr['age'],'~');
			
			$startage = substr($base_arr['age'],0,$pos);//年龄最低限度
			$endage = substr($base_arr['age'],$pos);//年龄最高限度


			$where[]="sex like '%$sex%'";
			$where[]="height >=$startheight";
			$where[]="height<=$endheight";
			// $where[]="salary>$income";
			$where[]="marital_state='$marital_state'";
			$where[]="workplace='$work_areas'";
		}
		$where = implode(' and ', $where);
		
		//获取猜你喜欢数据
		$model = new User();
		$data['guess_arr'] = $model->getlike($where);

		return $this->render('detail.htm',['data'=>$data]);

	}


	public function actionLike()
	{
		
		$val = \yii::$app->request->get();
		
		$base_arr=[
					'sex'=>$val['sex'],
					'height'=>$val['height'],
					'marital_states'=>$val['marital_states'],
					'profession'=>$val['profession'],
					
				];
		$where = array('1=1');		
		if($base_arr)
		{
			$sex = $base_arr['sex'];//性别
			$startheight = substr($base_arr['height'],0,3);//身高最低限度
			$endheight = substr($base_arr['height'],4);//身高最高限度
			
			
			$marital_state= $base_arr['marital_states'];//婚姻状况
			
			//判断职业 是不是不限 
			if($base_arr['profession']=='不限')
			{
				$profession='';
			}
			else
			{
				$profession = $base_arr['profession'];//职业
			}
			


			$where[]="sex like '%$sex%'";
			$where[]="height >=$startheight";
			$where[]="height<=$endheight";
			$where[]="marital_state='$marital_state'";
			
		}

		$where = implode(' and ', $where);

		$pages = $val['pages'];
	
        //计算总条数  
       	$model = new User();
		$arr = $model->getcount($where);
		$count= count($arr);
        //设置每一页显示的条数  
        $pageSize = 3 ;  
        //计算总页数  
        $pageSum = ceil($count/$pageSize);  
        //计算偏移量  
        $offset = ($pages - 1)*$pageSize;  
        //计算 下一页  
        if($pages>=$pageSum)
        {
        	$next=1;
        }
        else
        {
        	$next = $pages+1;
        }
       
        //拼接A链接  
        $str = '';  
       	$str .= "<a href='javascript:void(0);' id=".$next." class='change1'>换一组</a>";  
        //分页后的信息
        $user = $model->page($where,$offset,$pageSize);

        $data['page']=$str;
        $data['user']=$user;

        echo json_encode($data);
       
	
	}
}


