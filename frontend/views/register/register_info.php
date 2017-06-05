<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=gbk">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">	
	<title>珍爱网注册_免费注册珍爱网</title>
	
	<!-- 手机端seo适配  -->
	<meta name="mobile-agent" content="format=xhtml; url=http://m.zhenai.com/v2/register/register.do">
	<meta name="mobile-agent" content="format=html5; url=http://m.zhenai.com/v2/register/register.do">
	<meta name="mobile-agent" content="format=wml; url=http://m.zhenai.com/v2/register/register.do">
	<meta http-equiv="Cache-Control" content="no-transform">
	<meta http-equiv="Cache-Control" content="no-siteapp">
	<script type="text/javascript" async="" src="assets/web/register_info/s.js"></script><script type="text/javascript" async="" src="assets/web/register_info/ts.js"></script><script src="assets/web/register_info/hm.js"></script><script type="text/javascript">
	UA = navigator.userAgent.toLowerCase();
	url = window.location.toString();
	if ((UA.indexOf('iphone') != -1 || UA.indexOf('mobile') != -1
			|| UA.indexOf('android') != -1 || UA.indexOf('ipad') != -1
			|| UA.indexOf('windows ce') != -1 || UA.indexOf('ipod') != -1)
			&& UA.indexOf('ipod') == -1) {
			location.href = "http://m.zhenai.com/v2/register/register.do";
	}
	</script>
	
	<link rel="stylesheet" href="assets/web/register_info/entry.css">
	<link href="assets/web/register_info/login.css" rel="stylesheet" type="text/css" charset="GBK">
	
	<link href="assets/web/register_info/button.css" rel="stylesheet" media="screen">
	<link href="assets/web/register_info/newsite_layer.css" rel="stylesheet" media="screen">
	<link href="assets/web/register_info/lead_box.css" rel="stylesheet">
	<script src="assets/web/register_info/jquery-1.js"></script>
	<script src="assets/web/register_info/sea.js"></script>
	<script src="assets/web/register_info/fixCore.js"></script>
	<script src="assets/web/register_info/global.js" charset="UTF-8"></script>
	<script type="text/javascript" src="assets/web/register_info/syscodeapi.js"></script>
	<script src="assets/web/register_info/entry.js" charset="GBK"></script>
	<script type="text/javascript" src="assets/web/register_info/za_dialog.js"></script>
	<link rel="stylesheet" href="assets/web/register_info/default.css"><script type="text/javascript" src="assets/web/register_info/jquery.js" charset="GBK"></script>
	<script type="text/javascript" src="assets/web/register_info/commonOption.js"></script>
	<script src="assets/web/pwd/jsencrypt.js"></script>
	<script type="text/javascript">
		/* Baidu Statistics Begin*/
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "//hm.baidu.com/hm.js?2c8ad67df9e787ad29dbd54ee608f5d2";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
		/* Baidu Statistics End*/
		
	 	$(function(){
	 		$("#loginShowBar").bind('click',function(){
	 			var memberId = getCookieMemberid();
	 			if(memberId && memberId>0){
	 				location.href='http://profile.zhenai.com/personal/mymainPage.jsps?t='+Math.random();
	 			}else{
	 				ZAOption.login();
	 				setTimeout(function(){
	 					$("#fromurl").val("http://profile.zhenai.com/personal/mymainPage.jsps?t="+Math.random());
	 				},400);
	 			}
	 			return false;
	 	    });
	 	});
	 	/* function validateCode(elem){
	 		var flag = false;
	 		var elem = $(elem);
	 		var check = $(elem.attr('data-check'));
			var imgCode=$('#imgCode').val();
			if(imgCode=="" || imgCode.length<=0){
				check.show().removeClass('check-form-ok').find('span').html( '校验码不能为空！' );
				return false;
			}else{
				$.ajax({
					url:"/register/validateCodeImg.jsps",
					data:{imgCode:imgCode},
					dataType:"json",
					type:'post',
					async:false,
					success:function(result){
						result = result || {};
						if(result.status==1){
							check.show().addClass('check-form-ok');
							flag=true;
						}else{
							$('#imgCode').val('');
							check.show().removeClass('check-form-ok').find('span').html( '校验码错误！' );
							flag=false;
						}
					}
				});
			}
			return flag;
		} */
	</script>
</head>
<body>

<script src="assets/web/register_info/screenfix.js"></script>
	<div class="header">
		<div class="frameW">
			<a class="logo" href="http://www.zhenai.com/" title="珍爱网"></a>
			<p class="ad-word">相亲无难事，珍爱有红娘</p>
			<div class="tools">
				<a href="javascript:;" class="login" id="loginShowBar">登录</a>
			</div>
		</div>
	</div>
	<div class="wrapper frameW clearfix">
		<div class="col-left">
			<!-- <div class="border-top"></div> -->
			<div class="in">
				<div class="title-bar">
					<h2 class="left">编辑征婚资料</h2>
				</div>
				<!-- return ZACheckInput.validateCheckAll(); -->
		<form action="?r=user/create" method="post" onsubmit="return checksubmit();">
				<!-- <input name="regToken" value="GJqH" type="hidden"> -->
				 <!--  隐藏域 -->
	<!-- 		 	<input name="isReliveCardMember" value="-1" type="hidden">
			 	<input name="_csrf-frontend" type="hidden" id="_csrf" value="">
				<input id="doublemail" value="" type="hidden">
  				<input id="invalidateMobile" value="" type="hidden">
  				
  				<input name="snsType" value="" type="hidden">
    			<input name="copyTag" value="" type="hidden">
			    <input id="whichTV" name="whichTV" value="null" type="hidden">
				<input id="regType" name="regType" value="phone" type="hidden">
				
    		    				
    			<input id="hideMobile" name="hideMobile" value="" type="hidden">
    			<input id="viewMemberId" name="viewMemberId" value="" type="hidden"> -->
    			 <!-- 新旧注册页分流 -->
    			<!-- <input name="regFlag" value="" type="hidden"> -->
   				 <!--  隐藏域 -->
				<!-- 性别 {-->
				<!-- <input name="_csrf-frontend" type="hidden" id="_csrf" value=""> -->
				<div class="col-form">
					<label>我是一位：</label>
					<div class="za-radio" id="SexRadio">
					<input id="SexRadioInput" name="sex" value="" type="hidden">
					<a href="javascript:;" data-value="0"><i></i><b>男士</b></a><a href="javascript:;" data-value="1"><i></i><b>女士</b></a></div>
					<div id="SexRadioCheck" class="check-form"><i></i><span>此项注册后不可修改，请慎重填写</span><b></b><em></em></div>
				</div>
				<!-- 性别 {-->
				<!-- 生日 {-->
				<div class="col-form">
					<label>我的生日：</label>
					<div class="za-item-selector" id="BirthdaySelector">
						<dl class="year-selector">
							<dt>请选择</dt>
							<dd>
								<input id="BirthYear" value="-1" name="date_year" type="hidden">
							<p><i>90后:</i><a data-value="1990" href="javascript:;">1990</a><a data-value="1991" href="javascript:;">1991</a><a data-value="1992" href="javascript:;">1992</a><a data-value="1993" href="javascript:;">1993</a><a data-value="1994" href="javascript:;">1994</a><a data-value="1995" href="javascript:;">1995</a><a data-value="1996" href="javascript:;">1996</a><a data-value="1997" href="javascript:;">1997</a><a data-value="1998" href="javascript:;">1998</a><a data-value="1999" href="javascript:;">1999</a></p><p><i>80后:</i><a data-value="1980" href="javascript:;">1980</a><a data-value="1981" href="javascript:;">1981</a><a data-value="1982" href="javascript:;">1982</a><a data-value="1983" href="javascript:;">1983</a><a data-value="1984" href="javascript:;">1984</a><a data-value="1985" href="javascript:;">1985</a><a data-value="1986" href="javascript:;">1986</a><a data-value="1987" href="javascript:;">1987</a><a data-value="1988" href="javascript:;">1988</a><a data-value="1989" href="javascript:;">1989</a></p><p><i>70后:</i><a data-value="1970" href="javascript:;">1970</a><a data-value="1971" href="javascript:;">1971</a><a data-value="1972" href="javascript:;">1972</a><a data-value="1973" href="javascript:;">1973</a><a data-value="1974" href="javascript:;">1974</a><a data-value="1975" href="javascript:;">1975</a><a data-value="1976" href="javascript:;">1976</a><a data-value="1977" href="javascript:;">1977</a><a data-value="1978" href="javascript:;">1978</a><a data-value="1979" href="javascript:;">1979</a></p><p><i>60后:</i><a data-value="1960" href="javascript:;">1960</a><a data-value="1961" href="javascript:;">1961</a><a data-value="1962" href="javascript:;">1962</a><a data-value="1963" href="javascript:;">1963</a><a data-value="1964" href="javascript:;">1964</a><a data-value="1965" href="javascript:;">1965</a><a data-value="1966" href="javascript:;">1966</a><a data-value="1967" href="javascript:;">1967</a><a data-value="1968" href="javascript:;">1968</a><a data-value="1969" href="javascript:;">1969</a></p><p><i>50后:</i><a data-value="1950" href="javascript:;">1950</a><a data-value="1951" href="javascript:;">1951</a><a data-value="1952" href="javascript:;">1952</a><a data-value="1953" href="javascript:;">1953</a><a data-value="1954" href="javascript:;">1954</a><a data-value="1955" href="javascript:;">1955</a><a data-value="1956" href="javascript:;">1956</a><a data-value="1957" href="javascript:;">1957</a><a data-value="1958" href="javascript:;">1958</a><a data-value="1959" href="javascript:;">1959</a></p><p><i>40后:</i><a data-value="1940" href="javascript:;">1940</a><a data-value="1941" href="javascript:;">1941</a><a data-value="1942" href="javascript:;">1942</a><a data-value="1943" href="javascript:;">1943</a><a data-value="1944" href="javascript:;">1944</a><a data-value="1945" href="javascript:;">1945</a><a data-value="1946" href="javascript:;">1946</a><a data-value="1947" href="javascript:;">1947</a><a data-value="1948" href="javascript:;">1948</a><a data-value="1949" href="javascript:;">1949</a></p><p><i>30后:</i><a data-value="1930" href="javascript:;">1930</a><a data-value="1931" href="javascript:;">1931</a><a data-value="1932" href="javascript:;">1932</a><a data-value="1933" href="javascript:;">1933</a><a data-value="1934" href="javascript:;">1934</a><a data-value="1935" href="javascript:;">1935</a><a data-value="1936" href="javascript:;">1936</a><a data-value="1937" href="javascript:;">1937</a><a data-value="1938" href="javascript:;">1938</a><a data-value="1939" href="javascript:;">1939</a></p></dd>
						</dl>
						<span>年</span>
						<dl class="month-selector">
							<dt>请选择</dt>
							<dd>
								<input id="BirthMonth" value="-1" name="date_month" type="hidden">
							<p><a data-value="1" href="javascript:;">1</a><a data-value="2" href="javascript:;">2</a><a data-value="3" href="javascript:;">3</a><a data-value="4" href="javascript:;">4</a><a data-value="5" href="javascript:;">5</a><a data-value="6" href="javascript:;">6</a><a data-value="7" href="javascript:;">7</a><a data-value="8" href="javascript:;">8</a><a data-value="9" href="javascript:;">9</a><a data-value="10" href="javascript:;">10</a><a data-value="11" href="javascript:;">11</a><a data-value="12" href="javascript:;">12</a></p></dd>
						</dl>
						<span>月</span>
						<dl class="day-selector">
							<dt>请选择</dt>
							<dd>
								<input id="BirthDay" value="-1" name="date_day" type="hidden">
							<p>请先选择年月</p></dd>
						</dl>
						<span>日</span>
					</div>
					<div data-worning="请选择&quot;出生日期&quot;" data-tip="此项注册后不可修改，请慎重填写" data-checkerror="您还没满18岁" class="check-form" id="BirthdayCheck">
						<i></i><span></span><b></b><em></em>
					</div>
				</div>		
				<!-- 生日 } -->
				<!-- 地区 { -->
				<div class="col-form">
					<label>所在地区：</label>
					<div class="za-item-selector" id="DistrictSelector">
						<dl class="province-selector" style="">
							<dt>省/直辖市</dt>
							<dd style="display: none;">
								<input value="-1" name="province" type="hidden">
							<span><a href="javascript:;" data-value="10102000">北京</a></span><span><a href="javascript:;" data-value="10104000">天津</a></span><span><a href="javascript:;" data-value="10103000">上海</a></span><span><a href="javascript:;" data-value="10105000">重庆</a></span><div class="border"></div><span><a href="javascript:;" data-value="10101000">广东</a></span><span><a href="javascript:;" data-value="10118000">江苏</a></span><span><a href="javascript:;" data-value="10131000">浙江</a></span><span><a href="javascript:;" data-value="10127000">四川</a></span><span><a href="javascript:;" data-value="10107000">福建</a></span><span><a href="javascript:;" data-value="10124000">山东</a></span><span><a href="javascript:;" data-value="10115000">湖北</a></span><span><a href="javascript:;" data-value="10112000">河北</a></span><span><a href="javascript:;" data-value="10125000">山西</a></span><span><a href="javascript:;" data-value="10121000">内蒙古</a></span><span><a href="javascript:;" data-value="10120000">辽宁</a></span><span><a href="javascript:;" data-value="10117000">吉林</a></span><span><a href="javascript:;" data-value="10114000">黑龙江</a></span><span><a href="javascript:;" data-value="10106000">安徽</a></span><span><a href="javascript:;" data-value="10119000">江西</a></span><span><a href="javascript:;" data-value="10113000">河南</a></span><span><a href="javascript:;" data-value="10116000">湖南</a></span><span><a href="javascript:;" data-value="10109000">广西</a></span><span><a href="javascript:;" data-value="10111000">海南</a></span><span><a href="javascript:;" data-value="10110000">贵州</a></span><span><a href="javascript:;" data-value="10130000">云南</a></span><span><a href="javascript:;" data-value="10128000">西藏</a></span><span><a href="javascript:;" data-value="10126000">陕西</a></span><span><a href="javascript:;" data-value="10108000">甘肃</a></span><span><a href="javascript:;" data-value="10123000">青海</a></span><span><a href="javascript:;" data-value="10122000">宁夏</a></span><span><a href="javascript:;" data-value="10129000">新疆</a></span><div class="border"></div><span><a href="javascript:;" data-value="10132000">澳门</a></span><span><a href="javascript:;" data-value="10133000">香港</a></span><span><a href="javascript:;" data-value="10134000">台湾</a></span><span><a href="javascript:;" data-value="10200000">国外</a></span></dd>
						</dl>
						<span class="label"></span>
						<dl class="city-selector">
							<dt>市/区</dt>
							<dd>
								<input value="-1" name="City" type="hidden">
								<span>请先选择省/直辖市</span>
							</dd>
						</dl>
						<span class="label"></span>
						<dl class="county-selector">
							<dt>选择区/县</dt>
							<dd>
								<input value="-1" name="" type="hidden">
								<span>请先选择省/直辖市，和市/区</span>
							</dd>
						</dl>
						<span class="label"></span>
					</div>
					<div data-worning="请选择具体的工作地区" data-tip="请选择具体的工作地区" class="check-form" id="DistrictCheck" style="display: none;">
						<i></i><span>请选择具体的工作地区</span><b></b><em></em>
					</div>
				</div>
				<!-- 地区 { -->
				<!-- 婚姻现状 {-->
				<div class="col-form">
					<label>婚姻状态：</label>
					<div class="za-radio" id="MaritalStatus">
						<input name="marital_state" value="1" type="hidden">
					<a class="select" href="javascript:;" data-value="1"><i></i><b>未婚</b></a><a href="javascript:;" data-value="3"><i></i><b>离婚</b></a><a href="javascript:;" data-value="4"><i></i><b>丧偶</b></a></div>
					<div id="MaritalStatusCheck" class="check-form">
						<i></i><span>此项注册后不可修改，请慎重填写</span><b></b><em></em>
					</div>
				</div>
				<!-- 婚姻现状 }-->
				<!-- 我的身高 {-->
				<div class="col-form">
					<label>我的身高：</label>
					<div class="height-ruler" id="HeightRuler">
						<div class="ruler" style="width: 30px;"></div>
						<div class="cur-height" style="left: 40px;"></div>
						<div class="cur-value" style="left: 9px;">
							<span>小于140</span>
							<i></i>
						</div>
						<input name="height" value="139" type="hidden">
					</div>
					<div id="HeightRulerCheck" class="check-form" style="display: none;">
						<i></i><span>注册后不可改</span><b></b><em></em>
					</div>
				</div>
				<!-- 我的身高 {-->
				<!-- 我的学历 {-->
				<div class="col-form">
					<label>我的学历：</label>
					<dl class="za-selector" id="MyEducation" style="width: 162px;">
						<dt class="arrow">大学本科</dt>
						<dd>
							<input data-check="#MyEducationCheck" id="MyEducationInput" name="degree" value="5" type="hidden">
						<a data-value="3" href="javascript:;">高中及以下</a><a data-value="2" href="javascript:;">中专</a><a data-value="4" href="javascript:;">大专</a><a data-value="5" href="javascript:;">大学本科</a><a data-value="6" href="javascript:;">硕士</a><a data-value="7" href="javascript:;">博士</a></dd>
					</dl>
					<div id="MyEducationCheck" class="check-form" data-tip="此项注册后不可修改，请慎重填写" data-worning="请选择&quot;学历&quot;">
						<i></i><span></span><b></b><em></em>
					</div>
				</div>
				<!-- 我的学历 }-->
				<!-- 我的月薪 {-->
				<div class="col-form">
					<label>我的月薪：</label>
					<dl class="za-selector" id="MySalary" style="width: 162px;">
						<dt class="arrow">请选择</dt>
						<dd>
							<input id="MySalaryInput" data-check="#MySalaryCheck" name="salary" value="-1" type="hidden">
						<a data-value="-1" href="javascript:;">请选择</a><a data-value="3" href="javascript:;">3000元以下</a><a data-value="4" href="javascript:;">3001-5000元</a><a data-value="5" href="javascript:;">5001-8000元</a><a data-value="6" href="javascript:;">8001-12000元</a><a data-value="7" href="javascript:;">12001-20000元</a><a data-value="8" href="javascript:;">20001-50000元</a><a data-value="9" href="javascript:;">50000元以上</a></dd>
					</dl>
					<div id="MySalaryCheck" class="check-form" data-tip="请选择&quot;月收入&quot;" data-worning="请选择&quot;月收入&quot;">
						<i></i><span></span><b></b><em></em>
					</div>
				</div>				
				<!-- 我的月薪 }-->
				<div class="tody-reg-stutas">
					今天已有 <span id="CurRegNum">32103</span> 位新会员加入珍爱网
				</div>
				<script type="text/javascript">
				(function(){
					var D = new Date(),
						h = D.getHours(),
						m = D.getMinutes();
					$('#CurRegNum').html( (h*60+m)*27 );
				})();
				</script>
				<!-- 我的手机号 {-->
				<div class="col-form">
					<label>我的手机号：</label>
					<input autocomplete="off" class="input-text" placeholder="您的手机号" name="tel" id="MyPhoneInputID" data-check="#MyPhoneCheck" type="text"><span id="MyPhoneCheck"></span>
					<!-- <div id="MyPhoneCheck" class="check-form" data-tip="可直接使用手机号登录，号码绝不会被公开" data-worning="手机号码长度错误，请确认">
						<i></i><b></b><em></em>
					</div> -->
				</div>
				<!-- 我的手机号 }-->
				<!-- 校验码 {-->		
				<!-- <div class="col-form" style="display: none;" id="checkCode">
					<label>校 验 码：</label>
					<input class="input-text" name="imgCode" id="imgCode" data-check="#CheckCodeCheck" type="text">
					<img class="check-code-img" title="看不清？换一张" alt="验证码" style="vertical-align: middle" src="assets/web/register_info/codeImg.jpg" onclick="this.src='http://register.zhenai.com/register/codeImg.jsps?t='+(+new Date())">
					<div id="CheckCodeCheck" class="check-form" data-tip="请填写校验码。" data-worning="校验码错误。" style="display:block;">
						<i></i><span></span><b></b><em></em>
					</div>
				</div> -->
				<input type="hidden" id="tra" value="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC0Llg1bVZhnyslfezwfeOkvnXW
q59bDtmQyHvxkP/38Fw8QQXBfROCgzGc+Te6pOPl6Ye+vQ1rAnisBaP3rMk40i3O
pallzVkuwRKydek3V9ufPpZEEH4eBgInMSDiMsggTWxcI/Lvag6eHjkSc67RTrj9
6oxj0ipVRqjxW4X6HQIDAQAB">
				<!-- 校验码 }-->
				<div class="col-form">
					<label>创建密码：</label>
					<input autocomplete="off" class="input-text" placeholder="请输入密码" name="user_pwd" id="MyPassword" data-check="#MyPasswordCheck" onpaste="return false" type="password"><span id="checkPswBox"></span>
					<!-- <span class="checkPswBox" id="checkPswBox" style="display: none;"><span class="item"></span></span> -->
					<!-- <div id="MyPasswordCheck" class="check-form" data-tip="请输入密码" data-worning="密码格式错误！">
						<i></i><span></span><b></b><em></em>
					</div> -->
				</div>
				<div class="col-form">
					<label>确认密码：</label>
					<input autocomplete="off" class="input-text" placeholder="请再输入一次密码" name="" id="CheckMyPSW" data-check="#CheckMyPSWCheck" type="password"><span id="CheckMyPSWCheck"></span>
					<!-- <div id="CheckMyPSWCheck" class="check-form" data-tip="再次确认密码。" data-worning="确认密码错误！">
						<i></i><b></b><em></em>
					</div> -->
				</div>		
				<div class="agreement clearfix">
					<label><input checked="checked" name="" id="AgreementInput" type="checkbox">已阅读和同意珍爱网的 <a href="http://register.zhenai.com/register/serverrulenew.jsp" target="_blank">服务条款</a> 和 <a href="http://register.zhenai.com/register/intimacy.jsp" target="_blank">信息保护政策</a><br>并同意将本人提供之信息由珍爱网提供线上/线下服务使用</label>
					<div id="AgreementCheck" class="check-form">
						<i></i><span>请阅读和同意左侧的条款</span><b></b><em></em>
					</div>
				</div>
				<!-- <span id="ccc">567</span> -->
				<input class="reg-btn" value="免费注册 开启寻爱之旅" type="submit">
			</form>			
			</div>
		</div>
		<div class="col-right">
			<div class="sibe-bar">
				<div class="sibe-bar-about">
					<img src="assets/web/register_info/bg2.png" alt="">
					<dl>
						<dt><strong>1</strong>亿</dt>
						<dd>截止2016年10月，珍爱网会员注册量已经突破1亿</dd>
					</dl>
					<dl>
						<dt><strong>12</strong>年</dt>
						<dd>珍爱网成立于2005年，专注婚恋12年，经验丰富</dd>
					</dl>
					<dl>
						<dt><strong>3000</strong>位</dt>
						<dd>拥有庞大的专业红娘团队，3000位受过婚恋心理培训的红娘</dd>
					</dl>
					<dl>
						<dt><strong>NO.1</strong></dt>
						<dd>蝉联工信部中国婚恋行业第一品牌，获2013央视年度品牌</dd>
					</dl>
					<dl>
						<dt><strong>47</strong>家</dt>
						<dd>在全国一/二线城市拥有47家专业的线下服务门店</dd>
					</dl>
				</div>
				<div class="more-logins">
					<h2>其他登录方式：</h2>
					<ul>
						<li><a href="http://connect.zhenai.com/qq/login.x" target="_blank"><img src="assets/web/register_info/ico_18x18_qq.png">QQ登录</a></li>
						<li><a href="http://static.zhenai.com/weibo/login.jsps" target="_blank"><img src="assets/web/register_info/ico_18x18_sina.png">微博登录</a></li>
						<li><a href="http://static.zhenai.com/baidu/preLogin.jsps" target="_blank"><img src="assets/web/register_info/ico_18x18_baidu.png">百度</a></li>
						<li><a href="http://profile.zhenai.com/sns/zfbLogin.jsps" target="_blank"><img src="assets/web/register_info/ico_18x18_alipay.png">支付宝登录
					</a></li></ul><a href="http://profile.zhenai.com/sns/zfbLogin.jsps" target="_blank">
				</a></div><a href="http://profile.zhenai.com/sns/zfbLogin.jsps" target="_blank">
			</a></div><a href="http://profile.zhenai.com/sns/zfbLogin.jsps" target="_blank">
		</a></div><a href="http://profile.zhenai.com/sns/zfbLogin.jsps" target="_blank">
	</a></div><a href="http://profile.zhenai.com/sns/zfbLogin.jsps" target="_blank">

<script>
$(function(){
	function remoteVerify(){
        var result = {};
        $.ajax({
            url:"/cooperation/verifyActiveCode.jsps",
            async:false,
            data:{
                activeCode:$("#activeCode").val(),
                randomCode:$("#randomCode").val()
            },
            success:function(data){result=data;}
        });
        return result;
	}
	
    function checkActiveCode(){
        var $activeCode = $("#activeCode");
        if(!/^\d{10}$/.test($activeCode.val())){
            $activeCode.next().removeClass("righttip").addClass("bantip").html("激活码格式不正确");
            return false;
        }
        var rmtResult = remoteVerify();
        if(rmtResult.code!=1){
            $activeCode.next().removeClass("righttip").addClass("bantip").html(rmtResult.msg||"激活码验证失败");
            return false;
        }
        $activeCode.next().removeClass("bantip").addClass("righttip").html("");
        return true;
    }
    
	function checkRandomCode(){
		$randomCode=$("#randomCode");
        if(!/^\d{4}$/.test($randomCode.val())){
            $randomCode.next().removeClass("righttip").addClass("bantip").html("随机码格式不对");
            return false;
        }
        $randomCode.next().removeClass("bantip").addClass("righttip").html("");
        return true;
	}
    
    function checkAll(){
        if(checkActiveCode() && checkRandomCode())
            return true;
        return false;
    }
	
    $("#activeCode").on("blur",function(){
        checkActiveCode();
    }).on("focus",function(){
        $(this).next().removeClass("righttip").addClass("bantip").html("请输入激活码");
    });
    
    $("#randomCode").on("blur",function(){
        checkRandomCode();
    }).on("focus",function(){
        $(this).next().removeClass("righttip").addClass("bantip").html("请输入随机码");
    });
});
</script>

<input value="" id="tempSex" type="hidden">	
<input value="" id="tempMarriage" type="hidden">
<input value="" id="tempEducation" type="hidden">	
<input value="" id="tempSalary" type="hidden">	
<script>
	a = false;
	b = false;
	c = false;
$('#MyPhoneInputID').blur(function(){
	var tel = $('#MyPhoneInputID').val();
	if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(tel))){
        alert("不是完整的11位手机号或者正确的手机号前七位");
        $("#MyPhoneCheck").html('手机号输入不合法');
        document.getElementById("MyPhoneCheck").style.color="red";
        a = false;
        // document.mobileform.mobile.focus();
        return false;
    } 
	var encrypt = new JSEncrypt();
    encrypt.setPublicKey($("#tra").val());//设置公有key
    var data = encrypt.encrypt(tel);
    tel_new = encodeURI(data).replace(/\+/g, '%2B')
    $.ajax({
        url:'?r=register/tel_verify&tel='+tel_new,
        Type:"get",
        dataType:'json',
        success:function(obj)
        {
            if(obj.code == -1)
			{
				$("#MyPhoneCheck").html('×'+obj.msg);
				document.getElementById("MyPhoneCheck").style.color="red";
			}
			else if(obj.code == 0)
			{
				$("#MyPhoneCheck").html('×'+obj.msg);
				document.getElementById("MyPhoneCheck").style.color="red";
			}
			else
			{
				$("#MyPhoneCheck").html('√');
				document.getElementById("MyPhoneCheck").style.color="green";
				a = true;
			}
        }
    });
})
$('#MyPassword').blur(function(){
	if($('#MyPassword').val() == '')
	{
		// alert("密码不能为空");
		$("#checkPswBox").html('密码不能为空');
		document.getElementById("checkPswBox").style.color="red";
		b = false;
	}
	else
	{
		var reg = new RegExp(/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/);
		if ($('#MyPassword').val().length <6) {
			$("#checkPswBox").html('密码需大于6位');
			document.getElementById("checkPswBox").style.color="red";
        	b = false;
	    }
	    else if(!reg.test($('#MyPassword').val()))
	    {
		    $("#checkPswBox").html('不能包含特殊字符');
			document.getElementById("checkPswBox").style.color="red";
	        b = false;
	    }
	    else
	    {
			$("#checkPswBox").html('√');
			document.getElementById("checkPswBox").style.color="green";
			b = true;
	    }
	}
	
});
$('#CheckMyPSW').blur(function(){
	if($('#CheckMyPSW').val() != $('#MyPassword').val())
	{
		alert("确认密码不能为空");
		$("#CheckMyPSWCheck").html('确认密码不能为空');
		document.getElementById("CheckMyPSWCheck").style.color="red";
		c = false;
	}
	else
	{
		c = true;
	}
	
});
function checksubmit()
{
	var tel = $('#MyPhoneInputID').val();
	if(tel == '')
	{
		alert("手机号不能为空");
		a = false;
	}
	if($('#MyPassword').val() == '')
	{
		alert("密码不能为空");
		b = false;
	}
	if($('#CheckMyPSW').val() != $('#MyPassword').val())
	{
		alert("确认密码不能为空");
		c = false;
	}
	if( a && b && c)
	{
		return true;
	}
	else
	{
		return false;
	}
}
// $("#ccc").click(function()
// {
// 	alert(checksubmit());
// })

	new ZARadio({
		id: '#SexRadio',
		value: '',
		data: [[0,'男士'],[1,'女士']]
	});
	new ZABirthdaySelector({
		id:'#BirthdaySelector'
	});
	new ZAdistrictSelector({
		id:'#DistrictSelector'
	});
	new ZARadio({
		id: '#MaritalStatus',
		value: $("#tempMarriage").val()==''?1:$("#tempMarriage").val(),
		data: [[1,'未婚'],[3,'离婚'],[4,'丧偶']]
	});
	ZAHeightRuler('HeightRuler','小于140');
	new ZASelector({
		id:'#MyEducation',
		data:[
			['3','高中及以下'],
			['2','中专'],
			['4','大专'],
			['5','大学本科'],
			['6','硕士'],
			['7','博士']
		],
		value:$("#tempEducation").val()==''?5:$("#tempEducation").val(),
		width:162
	});	
	new ZASelector({
		id:'#MySalary',
		data:[
		    ['-1','请选择'],
			['3','3000元以下'],
			['4','3001-5000元'],
			['5','5001-8000元'],
			['6','8001-12000元'],
			['7','12001-20000元'],
			['8','20001-50000元'],
			['9','50000元以上']
		],
		value:$("#tempSalary").val()==''?-1:$("#tempSalary").val(),
		width:162
	});	
	$('#BirthdaySelector input').val( -1 );
	$('#DistrictSelector input').val( -1 );
	// 表单验证
 //    $('.input-text').bind('focus', function () {
 //    	var check = $($(this).attr('data-check'));
 //    	check.show().removeClass('check-form-ok').find('span').html( $(check).attr('data-tip') );
 //    	$(this).css({border:'1px solid #00A5DB'});
 //    })
 //    .bind('blur', function(){
 //    	$(this).css({border:'1px solid #C9C9C9'});
 //    });
 //    // $('#MyPhoneInputID').bind('blur',function(){
 //    // 	ZACheckInput.validatePhoneCode();
 //    // 	if(flag && flag==1){
 //    //    	 	weblog('copyPhoneRegister',1,'show',GetCookieIM("sid"),0)
 //    //    	}
    	
 //    // });
 //    $('#MyPassword').bind('blur', function(){
 //    	ZACheckInput.password(this);
	// 	$('#checkPswBox').hide();
 //    });
	// $('#MyPassword').bind('focus', function(){
	// 	$('#checkPswBox').show();
	// 	$('#MyPasswordCheck').hide();
	// });
	// $('#MyPassword').bind('input propertychange focus blur', function(){
	// 	var $this=$(this),
	// 		value= $.trim($this.val());

	// 	if (value.length > 20) $(this).val(value.substring(0, 20));
	// 	ZACheckInput.password(this);
	// });
	// $('#CheckMyPSW').bind('input propertychange', function(){
	// 	var $this=$(this),
	// 		value= $.trim($this.val());
	// 	if (value.length > 20) $(this).val(value.substring(0, 20));
	// });

    
 //    $('#CheckMyPSW').bind('blur', function(){
 //    	ZACheckInput.checkPSW(this, '#MyPassword');
 //    });
 //    $('#NickName').bind('blur', function(){
 //    	ZACheckInput.nickname(this);
 //    });

 //    $('#MyEducation').bind('mouseover', function(){
 //    	var check = $('#MyEducationCheck');
 //    	check.show().find('span').html($(check).attr('data-tip'));
 //    }).bind('mouseout', function(){
 //    	var check = $('#MyEducationCheck');
 //    	if(!ZACheckInput.selector( $('#MyEducation input') ))check.hide();
 //    });
 //    $('#MyEducation a').bind('click', function(){
 //    	ZACheckInput.selector( $('#MyEducation input') );
 //    });


 //    $('#MySalary').bind('mouseover', function(){
 //    	var check = $('#MySalaryCheck');
 //    	check.show().find('span').html($(check).attr('data-tip'));
 //    }).bind('mouseout', function(){
 //    	var check = $('#MySalaryCheck');
 //    	if(!ZACheckInput.selector( $('#MySalary input') ))check.hide();
 //    });
 //    $('#MySalary a').bind('click', function(){
 //    	ZACheckInput.selector( $('#MySalary input') );
 //    });

 //    $('#SexRadio').bind('mouseover', function(){
 //    	$('#SexRadioCheck').show();
 //    })
 //    .bind('mouseout', function(){
 //    	$('#SexRadioCheck').hide();
 //    });

 //    $('#BirthdaySelector').bind('mouseover', function(){
 //    	var check = $('#BirthdayCheck');
 //    	check.show().find('span').html($(check).attr('data-tip'));
 //    });
 //    $('#BirthdaySelector .day-selector a').live('click', function(){
 //    	ZACheckInput.birthday();
 //    });

 //    $('#DistrictSelector').bind('mouseover', function(){
 //    	var check = $('#DistrictCheck');
 //    	check.show().find('span').html($(check).attr('data-tip'));
 //    });
 //    $('#DistrictSelector .province-selector a').live('click', function(){
 //    	var check = $('#DistrictCheck');
 //    	$('#DistrictCheck').removeClass('check-form-ok').find('span').html( $(check).attr('data-worning') );
 //    });    
 //    $('#DistrictSelector .city-selector a').live('click', function(){
 //    	var input = $('#DistrictSelector input');
 //    	var check = $('#DistrictCheck');
 //    	if(ZAdistrictMap['c'+input.eq(0).val()].d==1&&input.eq(2)!=-1){
 //    		$('#DistrictCheck').addClass('check-form-ok');
 //    	}else{
 //    		$('#DistrictCheck').removeClass('check-form-ok').find('span').html( $(check).attr('data-worning') );
 //    	}
 //    });
 //    $('#DistrictSelector .county-selector a').live('click', function(){
 //    	var input = $('#DistrictSelector input');
 //    	if(input.eq(0)!=-1&&input.eq(1)!=-1&&input.eq(2)!=-1){
 //    		$('#DistrictCheck').addClass('check-form-ok');
 //    	}
 //    });
 //    $('#MaritalStatus').bind('mouseover', function(){
 //    	$('#MaritalStatusCheck').show();
 //    })
 //    .bind('mouseout', function(){
 //    	$('#MaritalStatusCheck').hide();
 //    }); 

 //    $('#HeightRuler').bind('mouseover', function(){
 //    	$('#HeightRulerCheck').show();
 //    })
 //    .bind('mouseout', function(){
 //    	$('#HeightRulerCheck').hide();
 //    });
 //    $('#AgreementInput').bind('click', function() {
 //    	ZACheckInput.agreement('#AgreementInput');
 //    });
 //    $('#SexRadioInput').val('');
</script>	
<!-- 晶赞统计代码 -->
<script type="text/javascript">
var _zdmpq = _zdmpq || [];
_zdmpq.push(['_setAccount', 'm-1-1']);
 (function() {
     var zp = document.createElement('script'); zp.type = 'text/javascript'; zp.async = true;
     zp.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.gtags.net/js/ts.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(zp, s);
 })();
</script>
<script type="text/javascript">
var _zampq = _zampq || [];
_zampq.push(["_setAccount","14"]);
(function() {
var zp = document.createElement("script"); zp.type = "text/javascript"; zp.async = true;
zp.src = ("https:" == document.location.protocol ? "https://" : "http://") + "cdn.zampda.net/s.js";
var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(zp, s);
})();
</script>
<script type="text/javascript">
$(function(){
	seajs.use('http://i2.zastatic.com/zhenai3/zhenai2015/js/fraud/index.js',function(fruad){
		fruad.init({sessionId:""});
	});
});
</script>




</a><div style="display: none; position: absolute;" class=""><div class="aui_outer"><table class="aui_border"><tbody><tr><td class="aui_nw"></td><td class="aui_n"></td><td class="aui_ne"></td></tr><tr><td class="aui_w"></td><td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move;"></div><a class="aui_close" href="javascript:/*zhenai.com*/;">×</a></div></td></tr><tr><td class="aui_icon" style="display: none;"><div class="aui_iconBg" style="background: transparent none repeat scroll 0% 0%;"></div></td><td class="aui_main" style="width: auto; height: auto;"><div class="aui_content" style="padding: 20px 25px;"></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons" style="display: none;"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se" style="cursor: se-resize;"></td></tr></tbody></table></div></div></body></html>