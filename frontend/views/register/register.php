<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=gbk">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">	
	<title>珍爱网注册_免费注册珍爱网</title>
	<link rel="stylesheet" href="assets/web/entry1.css">
	<link href="assets/web/login.css" rel="stylesheet" type="text/css" charset="GBK">
	
	<link href="assets/web/button.css" rel="stylesheet" media="screen">
	<link href="assets/web/newsite_layer.css" rel="stylesheet" media="screen">
	<link href="assets/web/lead_box.css" rel="stylesheet">
	<script src="assets/web/jquery-1.js"></script>
	<script src="assets/web/sea.js"></script>
	<script src="assets/web/fixCore.js"></script>
	<script src="assets/web/global.js" charset="UTF-8"></script>
	<script type="text/javascript" src="assets/web/syscodeapi.js"></script>
	<script src="assets/web/entry.js" charset="GBK"></script>
	<script type="text/javascript" src="assets/web/za_dialog.js"></script>
	<link rel="stylesheet" href="assets/web/default.css"><script type="text/javascript" src="assets/web/jquery.js" charset="GBK"></script>
	<script type="text/javascript" src="assets/web/commonOption.js"></script>
	<script type="text/javascript">
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
					url:"http://www.zhenai.com/register/validateMobile3.jsps",
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

<script src="assets/web/screenfix.js"></script>
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
			<div class="in">
				<div class="title-bar">
					<h2 class="left">编辑征婚资料</h2>
				</div>
				<form action="?r=register/register_info" method="post" onsubmit="
				return ZACheckInput.validateCheckAll();">
				    <!--  隐藏域 -->
					<input name="baseInfo.sex" value="0" type="hidden">
					
						<input name="dateForm.year" value="1994" type="hidden">
						<input name="dateForm.month" value="6" type="hidden">
						<input name="dateForm.day" value="30" type="hidden">
						<input name="areaForm.workProvince" value="10102000" type="hidden">
						<input name="areaForm.workCity" value="10102008" type="hidden">
					
					<input name="baseInfo.marriage" value="1" type="hidden">
					<input name="step" value="3" type="hidden">
				<!-- 生日 {-->
							
				<!-- 我的身高 {-->
				<div class="col-form">
					<label>我的身高：</label>
					<div class="height-ruler" id="HeightRuler">
						<div class="ruler" style="width: 190px;"></div>
						<div class="cur-height" style="left: 200px;"></div>
						<div class="cur-value" style="left: 170px;">
							<span>170cm</span>
							<i></i>
						</div>
						<input name="baseInfo.height" value="170" type="hidden">
					</div>
					<div id="HeightRulerCheck" class="check-form" style="display: block;">
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
							<input data-check="#MyEducationCheck" id="MyEducationInput" name="baseInfo.education" value="5" type="hidden">
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
							<input id="MySalaryInput" data-check="#MySalaryCheck" name="baseInfo.salary" value="-1" type="hidden">
						<a data-value="-1" href="javascript:;">请选择</a><a data-value="3" href="javascript:;">3000元以下</a><a data-value="4" href="javascript:;">3001-5000元</a><a data-value="5" href="javascript:;">5001-8000元</a><a data-value="6" href="javascript:;">8001-12000元</a><a data-value="7" href="javascript:;">12001-20000元</a><a data-value="8" href="javascript:;">20001-50000元</a><a data-value="9" href="javascript:;">50000元以上</a></dd>
					</dl>
					<div id="MySalaryCheck" class="check-form" data-tip="请选择&quot;月收入&quot;" data-worning="请选择&quot;月收入&quot;">
						<i></i><span></span><b></b><em></em>
					</div>
				</div>				
				<!-- 我的月薪 }-->
				<div class="tody-reg-stutas">
					今天已有 <span id="CurRegNum">23355</span> 位新会员加入珍爱网
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
					<input autocomplete="off" class="input-text" placeholder="请输入您的手机号" name="baseInfo2.servicemobile" id="MyPhoneInputID" data-check="#MyPhoneCheck" type="text">
					<div id="MyPhoneCheck" class="check-form" data-tip="可直接使用手机号登录，号码绝不会被公开" data-worning="手机号码长度错误，请确认">
						<i></i><span></span><b></b><em></em>
					</div>
				</div>
				<!-- 我的手机号 }-->
				<!-- 校验码 {-->		
				<div class="col-form" style="display: none;" id="checkCode">
					<label>校 验 码：</label>
					<!-- <input class="input-text" type="text" name="imgCode" id="imgCode" data-check="#CheckCodeCheck" onblur="validateCode('#imgCode');"/> -->
					<input class="input-text" name="imgCode" id="imgCode" data-check="#CheckCodeCheck" type="text">
					<img class="check-code-img" title="看不清？换一张" alt="验证码" style="vertical-align: middle" src="assets/web/codeImg.jpg" onclick="this.src='http://register.zhenai.com/register/codeImg.jsps?t='+(+new Date())">
					<div id="CheckCodeCheck" class="check-form" data-tip="请填写校验码。" data-worning="校验码错误。" style="display:block;">
						<i></i><span></span><b></b><em></em>
					</div>
				</div>
				<!-- 校验码 }-->							
				<div class="col-form">
					<label>创建密码：</label>
					<input autocomplete="off" class="input-text" placeholder="请输入密码" name="loginInfo.pwd" id="MyPassword" data-check="#MyPasswordCheck" type="password">
					<span class="checkPswBox danger" id="checkPswBox" style="display: none;"><span class="item"></span></span>
					<div id="MyPasswordCheck" class="check-form" data-tip="请输入密码" data-worning="密码格式错误！">
						<i></i><span></span><b></b><em></em>
					</div>
				</div>	
				<div class="col-form">
					<label>确认密码：</label>
					<input autocomplete="off" class="input-text" placeholder="请再输入一次密码" name="loginInfo.pwd2" id="CheckMyPSW" data-check="#CheckMyPSWCheck" type="password">
					<div id="CheckMyPSWCheck" class="check-form" data-tip="再次确认密码。" data-worning="确认密码错误！">
						<i></i><span></span><b></b><em></em>
					</div>
				</div>		
				<div class="agreement clearfix">
					<label><input checked="checked" name="" id="AgreementInput" type="checkbox">已阅读和同意珍爱网的 <a href="http://register.zhenai.com/register/serverrulenew.jsp" target="_blank">服务条款</a> 和 <a href="http://register.zhenai.com/register/intimacy.jsp" target="_blank">信息保护政策</a><br>并同意将本人提供之信息由珍爱网提供线上/线下服务使用</label>
					<div id="AgreementCheck" class="check-form">
						<i></i><span>请阅读和同意左侧的条款</span><b></b><em></em>
					</div>
				</div>
				<input class="reg-btn" value="免费注册 开启寻爱之旅" type="submit">
				</form>			
			</div>
		</div>
		<div class="col-right">
			<div class="sibe-bar">
				<div class="sibe-bar-about">
					<img src="assets/web/bg2.png" alt="">
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
						<li><a href="http://connect.zhenai.com/qq/login.x" target="_blank"><img src="assets/web/ico_18x18_qq.png">QQ登录</a></li>
						<li><a href="http://static.zhenai.com/weibo/login.jsps" target="_blank"><img src="assets/web/ico_18x18_sina.png">微博登录</a></li>
						<li><a href="http://static.zhenai.com/baidu/preLogin.jsps" target="_blank"><img src="assets/web/ico_18x18_baidu.png">百度</a></li>
						<li><a href="http://profile.zhenai.com/sns/zfbLogin.jsps" target="_blank"><img src="assets/web/ico_18x18_alipay.png">支付宝登录
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
            
$activeCode.next().removeClass("righttip").addClass("bantip").html("激活码格
式不正确");
            return false;
        }
        var rmtResult = remoteVerify();
        if(rmtResult.code!=1){
            
$activeCode.next().removeClass("righttip").addClass("bantip").html(rmtResult.msg||"
激活码验证失败");
            return false;
        }
        
$activeCode.next().removeClass("bantip").addClass("righttip").html("");
        return true;
    }
    
	function checkRandomCode(){
		$randomCode=$("#randomCode");
        if(!/^\d{4}$/.test($randomCode.val())){
            
$randomCode.next().removeClass("righttip").addClass("bantip").html("随机码格
式不对");
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
    
    $("#jcStatecosLeadBox .btn_gmR_pink").on("mousedown",function(){
        if(checkAll()){
            var $inputs = 
$("#activeCode,#randomCode,#workmate").map(function(){
                if(this.id=="activeCode"){
                    return $("<input  class=\"input-text\" 
value=\""+this.value+"\" id=\""+(this.name+"_register")+"\" 
name=\""+this.name+"\" readonly=\"readonly\"/>")[0];
                }else if(this.id=="randomCode"){
                    return $("<input type=\"hidden\" 
value=\""+this.value+"\" id=\""+(this.name+"_register")+"\" 
name=\""+this.name+"\"/>")[0];
                }else{
                    return $("<input type=\"hidden\" 
value=\""+(this.checked?1:0)+"\" id=\""+(this.name+"_register")+"\" 
name=\""+this.name+"\">")[0];
                }
            });
            $("#cooperation_col").remove();
            $(".col-form:last").after($("<div id=\"cooperation_col\" 
class=\"col-form\"><label>政企激活码：</label></div>").append($inputs));
            $.dialog.list["jcStatecosLeadBox"].close();
        }
    });
    
    $("#jcStatecosLeadBox .btn_gmR_blue").on("mousedown",function(){
        if(checkAll()){
            ZAOption.login2(function(){
                var $inputs = 
$("#activeCode,#randomCode,#workmate").map(function(){
                    return $("<input type=\"hidden\" 
value=\""+(this.type!="checkbox"?this.value:this.checked?1:0)+"\" 
id=\""+(this.name+"_login")+"\" name=\""+this.name+"\"/>")[0];
                });
                
$("#login_pop").find("#activeCode_login,#randomCode_login,#workmate_login").remove().end().find("form").append($inputs);

                $.dialog.list["jcStatecosLeadBox"].close();
                
$("#fromurl").val("http://profile.zhenai.com/personal/mymainPage.jsps?t="+Math.random());

            });
        }
    })
    
	
    $("#activeCode").on("blur",function(){
        checkActiveCode();
    }).on("focus",function(){
        
$(this).next().removeClass("righttip").addClass("bantip").html("请输入激活
码");
    });
    
    $("#randomCode").on("blur",function(){
        checkRandomCode();
    }).on("focus",function(){
        
$(this).next().removeClass("righttip").addClass("bantip").html("请输入随机
码");
    });
    
	$(".statecos_login a").on("click",function(){
		$.dialog({
			title:false,
			lock:true,
			opacity:0.5,
			content: $('#jcStatecosLeadBox')[0],
			id: 'jcStatecosLeadBox',
			padding:'0px 0px',
			init:function(){
				noRuleInit();
				$("#activeCode").focus();
			}
		});
	});
	
	$("#jcStatecosLeadBox .close").on("mousedown",function(){
		$.dialog.list["jcStatecosLeadBox"].close();
	});
	
});
</script>

<input value="0" id="tempSex" type="hidden">	
<input value="1" id="tempMarriage" type="hidden">
<input value="" id="tempEducation" type="hidden">	
<input value="" id="tempSalary" type="hidden">	
<script>
	 var height="170";
	ZAHeightRuler('HeightRuler',height);
	
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
	 
	// 表单验证
    $('.input-text').bind('focus', function () {
    	var check = $($(this).attr('data-check'));
    	check.show().removeClass('check-form-ok').find('span').html( $(check).attr('data-tip') );
    	$(this).css({border:'1px solid #00A5DB'});
    })
    .bind('blur', function(){
    	$(this).css({border:'1px solid #C9C9C9'});
    });
    

    $('#MyEducation').bind('mouseover', function(){
    	var check = $('#MyEducationCheck');
    	check.show().find('span').html($(check).attr('data-tip'));
    }).bind('mouseout', function(){
    	var check = $('#MyEducationCheck');
    	if(!ZACheckInput.selector( $('#MyEducation input') ))check.hide();
    });
    $('#MyEducation a').bind('click', function(){
    	ZACheckInput.selector( $('#MyEducation input') );
    });
    
    $('#MyPassword').bind('blur', function(){
    	ZACheckInput.password(this);
		$('#checkPswBox').hide();
    });
	$('#MyPassword').bind('focus', function(){
		$('#checkPswBox').show();
		$('#MyPasswordCheck').hide();
	});
	$('#MyPassword').bind('input propertychange focus blur', function(){
		var $this=$(this),
			value= $.trim($this.val());

		if (value.length > 20) $(this).val(value.substring(0, 20));
		ZACheckInput.password(this);
	});
	$('#CheckMyPSW').bind('input propertychange', function(){
		var $this=$(this),
			value= $.trim($this.val());
		if (value.length > 20) $(this).val(value.substring(0, 20));
	});

    $('#CheckMyPSW').bind('blur', function(){
    	ZACheckInput.checkPSW(this, '#MyPassword');
    });

    $('#MySalary').bind('mouseover', function(){
    	var check = $('#MySalaryCheck');
    	check.show().find('span').html($(check).attr('data-tip'));
    }).bind('mouseout', function(){
    	var check = $('#MySalaryCheck');
    	if(!ZACheckInput.selector( $('#MySalary input') ))check.hide();
    });
    $('#MySalary a').bind('click', function(){
    	ZACheckInput.selector( $('#MySalary input') );
    });
   
    stat(1990,1,GetCookieIM("sid"),0);
    $('#MyPhoneInputID').bind('blur',function(){
    	ZACheckInput.validatePhoneCode(this);
    	if(flag && flag==1){
    		weblog('copyPhoneRegister',1,'show',GetCookieIM("sid"),0);
    	}
    });
    
	$('#HeightRulerCheck').show();


    $('#AgreementInput').bind('click', function() {
    	ZACheckInput.agreement('#AgreementInput');
    });
    $('#SexRadioInput').val('');
</script>
<script type="text/javascript">
$(function(){
	var channelId = "901004";
	//只放宽空渠道和360渠道
	if(channelId == '' || channelId == 0 || channelId == '901438'){
		seajs.use('http://i2.zastatic.com/zhenai3/zhenai2015/js/fraud/index.js',function(fruad){
			fruad.init({sessionId:""});
		});
	}
});
if(GetCookieIM("isSEO")=="1"){
	stat(1983,2,GetCookieIM("sid"),0);
}
</script>	




</a><div style="display: none; position: absolute;" class=""><div class="aui_outer"><table class="aui_border"><tbody><tr><td class="aui_nw"></td><td class="aui_n"></td><td class="aui_ne"></td></tr><tr><td class="aui_w"></td><td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move;"></div><a class="aui_close" href="javascript:/*zhenai.com*/;">×</a></div></td></tr><tr><td class="aui_icon" style="display: none;"><div class="aui_iconBg" style="background: transparent none repeat scroll 0% 0%;"></div></td><td class="aui_main" style="width: auto; height: auto;"><div class="aui_content" style="padding: 20px 25px;"></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons" style="display: none;"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se" style="cursor: se-resize;"></td></tr></tbody></table></div></div></body></html>