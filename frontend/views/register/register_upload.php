<?php
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>上传形象照_珍爱网</title> 
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<link href="assets/web/image/reg.css" rel="stylesheet" type="text/css">
<link href="assets/web/image/uploadpic.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/web/image/webuploader.css" />
<link rel="stylesheet" type="text/css" href="assets/web/image/style.css" />
<script src="assets/web/image/hm.js"></script>

<script type="text/javascript" src="assets/web/image/jquery-1.js"></script>
<script src="assets/web/image/LAB.js"></script>
<script src="assets/web/image/sea.js"></script>
<script src="assets/web/image/html5.js"></script>
<script src="assets/web/image/excanvas.js"></script>
<script src="assets/web/image/qrcode.js"></script>

<!-- <script type="text/javascript" src="assets/web/image/webuploader.js"></script>
<script type="text/javascript" src="assets/web/image/upload.js"></script> -->

<style type="text/css">
.header {
	width: 100%;
	padding: 0;
	margin: 0 auto;
}
.clearfix {
	display: block;
}
.header .logo {
	padding-right: 0;
}
.reg_box{
	margin-top: 20px;
}
.reg-btn {
	width:260px;
/*	margin:0 auto;*/
	height:50px;
	background-color:#ff6060;
	cursor:pointer;
	border:0;
	margin-top:40px;
	/*padding-left: 200px;*/
	margin-left:125px;
	color: #fff;
	font-size: 20px;
	border-radius: 1px;
	font-family: 'Microsoft Yahei';
	border-radius: 1px;
	transition:background-color .3s;
}
</style>

<style type="text/css" media="screen">#flashContent {visibility:hidden}</style><link rel="stylesheet" href="assets/web/image/ui-dialog.css"></head>
<body class="root1000">



<div class="header">
    <div class="frameW">
        <a class="logo" href="http://www.zhenai.com/" title="珍爱网"></a>
        <p class="ad-word">相亲无难事，珍爱有红娘</p>
        <div class="tools"></div>
    </div>
</div>

<article class="frameW fullWrapper">
	<div class="fullWrapper-in">
        <div class="title-bar clearfix">
            <h2 class="left">上传形象照</h2>
            <a class="jump" href="javascript:;">跳过此步》</a>
        </div>

<object align="middle" height="410" width="600">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action'=>'?r=register/register_upload&user_id='.$user_id]) ?>

	<!-- <input type="text" value="<?=$user_id?>"/> -->

    <?= $form->field($upload_model, 'file[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

	<input class="reg-btn" value="免费注册 开启寻爱之旅" type="submit">
    <!-- <button>Submit</button> -->

<?php ActiveForm::end() ?>

</object>
</div>
</article>

<script type="text/javascript">
function stat(resourceId,accessPoint,sParam,isPV) {
		var ref=document.referrer;
  var url='http://cdnlog.zhenai.com/visit/?resourceId='+resourceId+'&accessPoint='+accessPoint+'&sParam='+sParam+'&isPV='+isPV+'&referer='+encodeURIComponent(ref?ref:'');
  $.ajax({
		url:url,
		dataType:"jsonp",
		success: function(data){
		 		
		}
	});
}

stat('1007','-1','-1','1');



seajs.config({
    charset:'GBK',
    base: 'http://i3.zastatic.com/zhenai3/zhenai2015/js/lib/',
    alias: {
    'dialog':'http://i1.zastatic.com/zhenai3/zhenai2015/js/lib/artDialog.v6/src/dialog.js'
  }
});

$(function(){
	seajs.use(['dialog'],function(dialog){
		$(".jump").on("click", function(){
		    dialog({
		        title:'跳过此步',
		        skin:'layer-tips-purple',
		        content:'<p class="warn-tip lh-24">没有照片的话，我们无法把你推荐给其他人哦，会严重影响你的征婚进程。确认跳过吗？</p>',
		        width: 330,
		        padding: '35px 30px',
		        fixed:'ture',
		        backdropOpacity:0.5,
		        button: [{
                    value: '取消',
                    callback: function () {
                    	stat(1641, 1, 0, 0);
                    },
                    autofocus: true
                },
                {
                    value: '确定',
                    callback: function () {
                    	stat(1644, 0, 0, 0);
                    	window.location.href="?r=index/index";
                   }
               }]
		    }).showModal();
		    $(".ui-dialog-close").on("click", function(){stat(1641, 2, 0, 0);});
		});
	});
	
	// //生成扫描二维码
	// $('#qrCode').qrcode({
 //        text: "http://m.zhenai.com/v2/login/login.do?loginInfo=qr7866b856888a43aa970fc6a69bbdb9f9",
 //        height: 150,
 //        width: 150,
 //        src: "http://i0.zastatic.com/zhenai3/zhenai2012/img/uploadimg/za-img.jpg"
 //    });
	
	// function check(){
	// 	$.get('/register/checkUploadPhoto.jsps?t=' + new Date().getTime(),function(data){
	// 		if(data.code==0){
	// 			setTimeout(function(){
	// 				check()
	// 			},4000);
	// 		}else{
	// 			window.location.href="http://register.zhenai.com/personal/uploadphotosucc.jsps?source=reg&picUrl=" + data.picUrl;	
	// 		}
	// 	});
	// }
	// check();
	
	
});
</script>
<!-- 晶赞dmp统计 -->



</body></html>