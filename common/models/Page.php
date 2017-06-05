<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class Page extends Model{

	public $page = 1; //当前页
	public $count;  //数据总数
	public $total;	//总页数
	public $size=5;	//每页显示数量
	public $limit=0;//偏移量
	public $fen=0;

	public function __construct($count,$size=array(),$fen=0)
	{
		$this->fen = $fen;
		if(!empty($size)) $this->size = $size;
		$this->page = \yii::$app->request->get('page') > 1 ? \yii::$app->request->get('page') : 1;
		$this->count=$count;//数据总数
		$this->total=ceil($count/$this->size);//总页数
		$this->limit=($this->page-1)*$this->size;
	}

	//每页显示条数
	public function setSize($size)
	{
		if($size['size'])
		{
			$this->size=$size['size'];
		}
	}

	//分页
	public function getPage()
	{
		//起始页
		$start=$this->page-2;
		if($this->page-2>=$this->total-4) $start=$this->total-4;
		if($this->page-2<=1) $start=1;
		//结束页
		$last=$this->page+2;
		if($this->page+2<=5) $last=5;
		if($this->page+2>=$this->total) $last=$this->total;
		//分页少
		if($this->total<=5) 
			{
				$start=1;
				$last=$this->total;
			}
		//分页串
		$page_str='';
		if($this->fen == "0")
		{
			for($i=$start;$i<=$last;$i++)
			{
				if($this->page==$i)
				{
					$page_str.='<span id="now" value="'.$i.'">'.$i.'</span>';
				}
				else
				{
					$page_str.= '<a href="javascript:void(0)" class="page" value="'.$i.'">'.$i.'</a>';
				}			
			}			
		}

		if($this->fen == "1")
		{
			for($i=$start;$i<=$last;$i++)
			{
				if($this->page==$i)
				{
					$page_str.='<span id="now" value="'.$i.'">'.$i.'</span>';
				}
				else
				{
					$page_str.= '&nbsp;&nbsp;&nbsp;&nbsp;<a href="?r=activity/activity&page='.$i.'"><button>'.$i.'</button></a>';
				}			
			}
			return $page_str;
		}

		//上一页
		$prev=$this->page-1 > 1 ? $this->page-1 : 1;
		$prev_str = '<a href="javascript:void(0)" class="page" value="'.$prev.'">上一页</a>';

		//下一页
		$next=$this->page+1 < $this->total ? $this->page+1 : $this->total;
		$next_str = '<a href="javascript:void(0)" class="page" value="'.$next.'">下一页</a>';

		//自定义页码
		$box = '<input type="text" size="4" id="page" onkeyup="Go(this)" value="'.$this->page.'"><a href="javascript:void(0)" id="go" value="'.$this->page.'" class="page">GO</a>';

		$script='<script>function Go(obj){document.getElementById("go").attributes["value"].nodeValue=obj.value;}</script>';

		//显示上一页
		if($this->page > 1) $page_str=$prev_str.$page_str;

		//显示下一页
		if($this->page < $this->total) $page_str=$page_str.$next_str;

		return $page_str.$box.$script;
	}
}
?>