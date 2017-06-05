<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<html>
<script src="assets/web/pwd/jquery-1.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>珍爱网-系统设置</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<link href="http://i2.zastatic.com/zhenai3/zhenai2015/img/favicon.ico" type="image/x-icon" rel="icon">
<link href="http://i2.zastatic.com/zhenai3/zhenai2015/img/favicon.ico" type="image/x-icon" rel="shortcut icon">
<link rel="stylesheet" href="assets/web/pwd/public_6cf18a8.css">
<link rel="stylesheet" href="assets/web/pwd/messageBase_2f28019.css">
<link rel="stylesheet" href="assets/web/pwd/aside_5803793.css">

<link rel="stylesheet" href="assets/web/pwd/set_a8d2bfe.css">


<!--[if lt IE 9]> <script type="text/javascript"> (function (){ var tag = ["address","article","aside","audio","canvas","details","figcaption","figure","header","footer","hgroup","menu","nav","section","summary","time","video"],i=0; for(i in tag){ document.createElement(tag[i]); } })();</script><![endif]-->
<script src="assets/web/pwd/hm.js"></script><script src="assets/web/pwd/LAB.js"></script>
<script src="assets/web/pwd/sea_7e06016.js"></script>
<script src="assets/web/pwd/sea-config_84b437d.js"></script>
<script src="assets/web/pwd/jsencrypt.js"></script>
<script>


/* Baidu Statistics Begin*/
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?2c8ad67df9e787ad29dbd54ee608f5d2";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
/* Baidu Statistics End*/


document.domain = "zhenai.com";
function ajaxStat(resourceId,accessPoint,sParam,isPV) {
    var ref=document.referrer;
    var url='http://cdnlog.zhenai.com/visit/?resourceId='+resourceId+'&accessPoint='+accessPoint+'&sParam='+sParam+'&isPV='+isPV+'&referer='+encodeURIComponent(ref?ref:'');
    $.ajax({
        url:url,
        dataType:"jsonp"
    });
}

/** SEO Statistics Begin */
function seoStat(entry){
    seajs.use("zhenai2015/js/seo/seo.js", function(seo){
        seo.init(entry);
    });
}//send_Code telShow


/** SEO Statistics End */
</script>

<link rel="stylesheet" href="assets/web/pwd/ui-dialog.css">
<link charset="utf8" rel="stylesheet" href="assets/web/pwd/changePhone_089eef5.css">
<link charset="utf8" rel="stylesheet" href="assets/web/pwd/common_22824a8.css">
<body>
<script src="assets/web/pwd/screenfix_608df31.js"></script>


<header id="jcZAHeader" class="header" style="background: rgb(242, 242, 242) none repeat scroll 0% 0%;">
    <section class="frameW top-bar clearfix">
        <a class="logo" href="http://www.zhenai.com/" title="珍爱网"><i></i></a>
        <p class="ad-word">相亲无难事，珍爱有红娘</p>
        <div class="tools">
            <ul class="clearfix">
                <li class="mobile"><a href="http://mo.zhenai.com/" target="_blank" title="珍爱网app下载">手机版</a><div class="mobile-qrcode" style="display:none;">扫一扫下载客户端<i></i></div></li>
                <li class="collect"><a href="javascript:;">收藏本站</a></li>
                <li class="cust"><a href="javascript:;">在线客服</a></li>
                <li><a href="http://www.zhenai.com/anquan/" target="_blank">安全中心</a></li>
                <li><a href="http://www.zhenai.com/ahelpcenter/index.jsp" target="_blank" rel="nofollow">帮助中心</a></li>
                <li class="tel">红娘热线：4001-520520</li>
            </ul>
        </div>
    </section>
    <section class="nav-bar">
        <div class="frameW clearfix">
            <menu class="menu">
                <ul>
                    <li id="jcMenuBeauty" class="bg-scroll"></li>
                    <li><a href="http://profile.zhenai.com/v2/personal/home.do" rel="nofollow">我的珍爱</a></li>
                    <li><a href="http://search.zhenai.com/v2/search/pinterest.do" rel="nofollow">搜索</a></li>
                    <li><a href="http://t.zhenai.com/" target="_blank">
                    直营门店
                    </a></li>
                    <li><a href="http://profile.zhenai.com/zhenaiMail/zhenaiMail.jsps" rel="nofollow">珍心会员</a></li>
                    <li><a href="http://story.zhenai.com/" target="_blank">成功故事</a></li>
                    <li><a href="http://t.zhenai.com/hnzone/articleIndex.do" target="_blank" rel="nofollow">他她说</a></li>
                    
                        <li><a href="http://profile.zhenai.com/activity/activityIndex.jsps?ddid=kt" target="_blank" rel="nofollow">活动</a></li>
                    
                    
                    
                    
                    
                </ul>
            </menu>
            <div class="header-info user-info">
                <span class="topic"><em class="user-icon"></em></span>
                <ul>
                    <li><a href="http://profile.zhenai.com/v2/userdata/showInfo.do" rel="nofollow">编辑资料</a></li>
                    <li><a href="http://profile.zhenai.com/v2/verify/verifyIndex.do" rel="nofollow">诚信认证</a></li>
                    <li><a href="http://profile.zhenai.com/v2/photo/photoIndex.do" rel="nofollow">个人相册</a></li>
                    <li><a href="http://profile.zhenai.com/v2/userdata/pwdIndex.do" rel="nofollow">系统设置</a></li>
                    <li class="quit"><a href="http://album.zhenai.com/login/logout.jsps" rel="nofollow">退出</a></li>
                </ul>
            </div>
            <div class="header-info message-info" id="jcMessageInfo">
                <span class="topic"><em class="message-icon"><span class="num-tips">13</span></em></span>
                <ul>
                    <li><a href="http://profile.zhenai.com/v2/mail/list.do" rel="nofollow">邮件<span class="num-tips">5</span></a></li>
                    <li><a href="http://profile.zhenai.com/v2/msg/msgIndex.do" rel="nofollow">消息</a></li>
                    <li><a href="http://profile.zhenai.com/v2/follow/index.do?type=1" rel="nofollow">关注</a></li>
                    <li><a href="http://profile.zhenai.com/v2/visit/index.do" rel="nofollow">谁看过我<span class="num-tips">4</span></a></li>
                    <li><a href="http://profile.zhenai.com/v2/notice/index.do" rel="nofollow">系统通知<span class="num-tips">4</span></a></li>
                    <li><a href="http://profile.zhenai.com/v2/intercourse/intercourseIndex.do" rel="nofollow">交往对象</a></li>
                    
                </ul>
            </div>
            
            
            <div class="header-info order-info">
                <a class="link" href="http://profile.zhenai.com/personal/zhenaiAccountInfo.jsps?tabFlag=1" title="您暂时没有待支付订单"><em class="order-icon"></em></a>
            </div>
            
        </div>
    </section>
</header>
<article class="m-setUp frameW clearfix">
    

<div class="m-side">
    <div class="side-1">
        <div class="side-header">
            <a href="http://profile.zhenai.com/v2/photo/photoIndex.do" target="_blank"><img src="assets/web/pwd/men-100-1.jpg" alt="dfsfsd"><b></b></a>
        </div>
        <div class="side-user-info">
            <div class="side-name"><a href="http://album.zhenai.com/u/102004007" target="_blank" class="side-user-name" id="uid">会员<?php 
                    $session = yii::$app->session;
                echo  $session['user']['user_id'];?></a></div>
            <div class="side-icon">
                


<a class="flag-mobile" href="http://profile.zhenai.com/profile/validateContactPre.jsps" target="_blank" title="已验证手机号" rel="nofollow"></a>
<a class="flag-iden-n" href="http://profile.zhenai.com/v2/verify/zmIndex.do?type=2&amp;source=9" onclick="ajaxStat(1963,9,0,0)" target="_blank" title="未通过完整身份认证" rel="nofollow"></a>
<a class="flag-mail-n" href="http://album.zhenai.com/personal/serv_emailvalidate.jsps" target="_blank" title="未通过邮箱认证" rel="nofollow"></a>

        <a class="flag-credit-n credit-js" href="http://profile.zhenai.com/v2/verify/zmIndex.do?type=2&amp;source=10" target="_blank" title="未通过芝麻信用认证" data-mid="102004007" data-score="0" data-source="">芝麻分</a>
    
<script>
/** 芝麻信用 begin */
$LAB.script("http://i3.zastatic.com/zhenai3/zhenai2015/js/lib/jquery-1.8.3.min_e128811.js").wait(function (){
     seajs.use(['zhenai2015/js/public/creditTip.js'],function(credit){
         credit.init();
     });
})
/** 芝麻信用 end */
</script>

            </div>
        </div>
        <div class="side-credit clearfix">
            <a href="http://profile.zhenai.com/v2/verify/verifyIndex.do" class="rSideI">诚信值<span class="red">2</span><em></em></a>
            <a href="http://profile.zhenai.com/v2/verify/zmIndex.do" class="rSideI">芝麻分<span class="red">--</span></a>
        </div>
    </div>
    <div class="side-2">
        <ul>
            <li class="set-item">
                <a href="javascript:;" class="item-h"><i class="icon-1"></i>基本资料<b class="arrow"></b></a>
                <ul class="item-r">
                    <li><a href="http://profile.zhenai.com/v2/userdata/showRegInfo.do">注册信息</a></li>
                    <li><a href="http://profile.zhenai.com/v2/userdata/showObjInfo.do">择偶条件</a></li>
                    <li><a href="http://profile.zhenai.com/v2/userdata/showIntroduce.do">内心独白</a></li>
                </ul>
            </li>
            <li class="set-item">
                <a href="javascript:;" class="item-h  "><i class="icon-2"></i>详细资料<b class="arrow"></b></a>
                <ul class="item-r">
                    <li><a href="http://profile.zhenai.com/v2/userdata/showDetailInfo.do">详细资料</a></li>
                </ul>
            </li>
            <li class="set-item">
                <a href="javascript:;" class="item-h"><i class="icon-3"></i>工作生活<b class="arrow"></b></a>
                <ul class="item-r">
                    <li><a href="http://profile.zhenai.com/v2/userdata/showLifeInfo.do">生活状态</a></li>
                    <li><a href="http://profile.zhenai.com/v2/userdata/showWorkInfo.do">工作情况</a></li>
                </ul>
            </li>
            <li class="set-item">
                <a href="javascript:;" class="item-h "><i class="icon-4"></i>兴趣爱好<b class="arrow"></b></a>
                <ul class="item-r">
                    <li><a href="http://profile.zhenai.com/v2/userdata/showHobbyInfo.do">兴趣爱好</a></li>
                </ul>
            </li>
            <li class="set-item">
                <a href="javascript:;" class="item-h"><i class="icon-5"></i>婚姻观<b class="arrow"></b></a>
                <ul class="item-r">
                    <li><a href="http://profile.zhenai.com/v2/userdata/showMarriageInfo.do">婚姻观</a></li>
                    <li><a href="http://profile.zhenai.com/v2/userdata/showFamilyInfo.do">家庭情况</a></li>
                </ul>
            </li>
            <li class="set-item">
                <a href="http://profile.zhenai.com/v2/verify/verifyIndex.do" class="item-h "><i class="icon-7"></i>我的认证<b class="hot"></b></a>
                <ul class="item-r">
                </ul>
            </li>
            <li class="set-item">
                  <a href="javascript:;" class="item-h "><i class="icon-6"></i>我的相册<b class="arrow"></b></a>
                  <ul class="item-r">
                       <li><a href="http://profile.zhenai.com/v2/photo/photoIndex.do">我的相册</a></li>
                  </ul>
            </li>
            
            
            
            
            <li class="set-item">
                  <a href="javascript:;" class="item-h"><i class="icon-10"></i>系统设置<b class="arrow"></b></a>
                  <ul class="item-r" style="display:block">
                       <li><a href="?r=pwd/pwd" class="current">修改登录密码</a></li>
                       <li><a href="http://profile.zhenai.com/v2/userdata/privilegeIndex.do">权限设置</a></li>
                  </ul>
            </li>
        </ul>
    </div>
</div>
    <div class="m-content">
         <!-- 系统设置 start -->
        <div class="content-1 clearfix">
            <strong class="step_title"> 修改登录密码</strong>
        </div>
         
         
        <div class="set-step">
            <div class="step-box clearfix">
                <span class="sIcon step1 current"><span class="txt">安全认证</span><span class="num">1</span></span>
                <span class="sLine step1 current"></span>
                <span class="sIcon step2"><span class="txt">输入新密码</span><span class="num">2</span></span>
                <span class="sLine step2"></span>
                <span class="sIcon step3"><span class="txt">修改成功</span><span class="num">3</span></span>
            </div>
        </div>
        <div class="setWrap">
            <div id="dis" class="step1-js">
                <div class="col-form">
                    <label>您的认证手机：</label>
                    <span class="telShow">18812613820</span>
                    <a href="javascript:;" class="code-btn" id="send_Code">免费获取验证码</a>
                    <a href="javascript:;" id="toChangeTel">已换手机号？</a>
                </div>
                <div class="col-tip">
                    <span class="tipStyle right sendCodeTip" style="display: none;"></span>
                </div>
                <div class="col-form">
                    <label>确认码：</label>
                    <input autocomplete="off" class="input-text input_wrong" placeholder="请输入手机收到的确认码" onpaste="return false" id="codeInput" type="text">
                </div>
                <div class="col-tip">
                    <span class="tipStyle codeTip" style="">请输入收到的确认码！</span>
                </div>
                <!-- <div class="col-form">
                    <label>验证码：</label>
                    <input class="input-text imgCode-input" name="imgCode" id="imgCode" autocomplete="off" maxlength="4" type="text">
                    <span class="codeImg"><img id="codeImg" src="assets/web/pwd/codeImg.jpg"></span>
                    <a href="javascript:;" id="refreshCode">看不清，换一张</a>
                </div> -->
                <div class="col-tip">
                    <span class="tipStyle right imageCodeTip" style="display: none;"></span>
                </div>
                <div class="col-form pT-30">
                    <label>&nbsp;</label>
                    <a href="javascript:;" id="next" class="btnR2 goNext1-js">下一步</a>
                </div>
            </div>


            <div id="dis1" class="step2-js" style="display: none;">
                <div class="col-form">
                    <label> 输入您的用户名1：</label>
                    <input autocomplete="off" class="input-text" placeholder="请输入密码" onpaste="return false" id="uname" type="text">
                    <span class="checkPswBox danger" id="checkPswBox" style="display: none;"><span class="item"></span></span>
                </div>
                <input type="hidden" id="tra" value="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC0Llg1bVZhnyslfezwfeOkvnXW
q59bDtmQyHvxkP/38Fw8QQXBfROCgzGc+Te6pOPl6Ye+vQ1rAnisBaP3rMk40i3O
pallzVkuwRKydek3V9ufPpZEEH4eBgInMSDiMsggTWxcI/Lvag6eHjkSc67RTrj9
6oxj0ipVRqjxW4X6HQIDAQAB">
                <div class="col-tip">
                    <span class="tipStyle right newPWDTip" style="display: none;"></span>
                </div>

                <div class="col-form">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <?php ActiveForm::end(); ?>
        
                </div>
                <div class="col-tip">
                    <span class="tipStyle right comPWDTip" style="display: none;"></span>
                </div>
                <div class="col-form pT-30">
                    <label>&nbsp;</label>
                    <a href="javascript:;" id="next1" class="btnR2 goNext2-js">下一步</a>
                </div>

            </div>

            <div id="dis2" class="step1-js" style="display: none;">
                <div class="col-form">
                    <label>请输入您的新密码</label>
                    <input autocomplete="off" class="input-text" placeholder="请输入密码" onpaste="return false" id="upwd" type="password">
                    <span class="checkPswBox danger" id="checkPswBox" style="display: none;"><span class="item"></span></span>
                </div>
                <div class="col-tip">
                    <span class="tipStyle right sendCodeTip" style="display: none;"></span>
                </div>
                <div class="col-form">
                    <label>确认密码：</label>
                    <input autocomplete="off" class="input-text input_wrong" placeholder="请再输入密码" onpaste="return false" id="upwd1" type="password">
                </div>
                <div class="col-form pT-30">
                    <label>&nbsp;</label>
                    <a href="javascript:;" id="next2" class="btnR2 goNext1-js">下一步</a>
                </div>
            </div>

            <div id="dis3" class="step3-js" style="display: none;">
                <p class="setC"><img src="assets/web/pwd/right_0214f69.png" style="vertical-align: middle;margin-right: 10px;">恭喜您，已成功修改登录密码！</p>
            </div> 
        </div>
    </div>
    <input id="tipMsg" value="0" type="hidden">
    
</article>



        <div class="hot-city">
            <div class="city-wrap frameW">
                <div class="city-list clearfix">
                    城市征婚：
                       <a target="_blank" href="http://city.zhenai.com/beijing">北京</a>
                       <a target="_blank" href="http://city.zhenai.com/shanghai">上海</a>
                       <a target="_blank" href="http://city.zhenai.com/guangzhou">广州</a>
                       <a target="_blank" href="http://city.zhenai.com/shenzhen">深圳</a>
                       <a target="_blank" href="http://city.zhenai.com/nanjing">南京</a>
                       <a target="_blank" href="http://city.zhenai.com/chongqing">重庆</a>
                       <a target="_blank" href="http://city.zhenai.com/wuhan">武汉</a>
                       <a target="_blank" href="http://city.zhenai.com/chengdu">成都</a>
                       <a target="_blank" href="http://city.zhenai.com/hangzhou">杭州</a>
                       <a target="_blank" href="http://city.zhenai.com/changsha">长沙</a>
                       <a target="_blank" href="http://city.zhenai.com/xian">西安</a>
                       <a target="_blank" href="http://city.zhenai.com/dongguan">东莞</a>
                       <a target="_blank" href="http://city.zhenai.com/foshan">佛山</a>
                       <a target="_blank" href="http://city.zhenai.com/suzhou">苏州</a>
                       <a target="_blank" href="http://city.zhenai.com/tianjin">天津</a>
                       <a target="_blank" href="http://city.zhenai.com/kunming">昆明</a>
                       <a target="_blank" href="http://city.zhenai.com/shenyang">沈阳</a>
                       <a target="_blank" href="http://city.zhenai.com/jinan">济南</a>
                       <a target="_blank" href="http://city.zhenai.com/changchun">长春</a>
                       <a target="_blank" href="http://city.zhenai.com/taiyuan">太原</a>
                       <a target="_blank" href="http://city.zhenai.com/hefei">合肥</a>
                       <a target="_blank" href="http://city.zhenai.com/guiyang">贵阳</a>
                       <a target="_blank" href="http://city.zhenai.com/fuzhou">福州</a>
                       <a target="_blank" href="http://city.zhenai.com/">[更多城市]</a>
                   </div>
               </div>
           </div>
    

<footer class="footer">
    <div class="frameW clearfix">
        <div class="about">
            <div class="quick"><a target="_blank" href="http://about.zhenai.com/">关于我们</a>|<a target="_blank" href="http://tv.zhenai.com/MeiTiGuanZhu/index.x" rel="nofollow">媒体关注</a>|<a target="_blank" href="http://contact.zhenai.com/">联系我们</a>|<a target="_blank" href="http://www.zhenai.com/job/">加入我们</a>|<a target="_blank" href="http://about.zhenai.com/huoban" rel="nofollow">合作伙伴</a>|<a target="_blank" href="http://profile.zhenai.com/personal/getguestbookbegin.jsps" rel="nofollow">意见反馈</a>|<a href="http://www.zhenai.com/sitemap.html" target="_blank">网站地图</a>
            |<a href="http://album.zhenai.com/" target="_blank">珍爱会员</a>|<a href="http://city.zhenai.com/" target="_blank">珍爱相亲</a></div>
            <div class="brand grayL"><span>品牌：12年专业婚恋服务</span>&nbsp;&nbsp;<span>专业：庞大的资深红娘队伍</span>&nbsp;&nbsp;<span>真实：诚信会员验证体系</span></div>
            <div class="contact grayL"><span>客服热线：4001-520-520（周一至周日：9:00-21:00）</span><span>客服信箱：kefu@zhenai.com（周一至周五：10:00-19:00）</span></div>
            <div class="contact grayL"><span><a style="color:#9f9f9f;" href="http://profile.zhenai.com/v2/sys/reportEntry.do" target="_blank" rel="nofollow">违法和不良信息举报</a></span>&nbsp;&nbsp;<span>违法和不良信息举报专线：4008829288</span>&nbsp;&nbsp;<span>举报信箱：<a style="color: #9f9f9f;" href="mailto:jubao@zhenai.com" class="underlines" rel="nofollow">jubao@zhenai.com</a></span></div>
        </div>
        <div class="copyright grayL">
            <p>Copyright &#169; 2005-2017 版权所有：深圳市珍爱网信息技术有限公司<br>增值电信业务经营许可证粤B2-20040382号 粤ICP备09157619</p>
            <div class="out-link">
                <a target="_blank" title="深圳网警备案" href="http://szgabm.qq.com/" class="link2" rel="nofollow"></a>
                <a target="_blank" title="国际联网备案" href="http://www.sznet110.gov.cn/webrecord/innernet/Welcome.jsp?bano=4403301900797" class="link1" rel="nofollow"></a>
                <a title="深圳举报中心" href="http://szwljb.gov.cn/" class="link6" target="_blank" rel="nofollow"></a>
                <a title="违法和不良信息举报中心" href="http://www.12377.cn/" class="link3" target="_blank" rel="nofollow"></a>  
                <a title="诚信示范网站" href="https://search.szfw.org/cert/l/CX20150630010588010670" class="link4" target="_blank" rel="nofollow"></a>
                <a title="AAA级信用企业" href="http://www.itrust.org.cn/Home/Index/itrust_certifi?wm=1761973720" class="link7" target="_blank" rel="nofollow"></a>
            </div>
        </div>
    </div>
    <a href="" id="qw">我456</a>
</footer>

<script type="text/javascript">
$("#send_Code").click(function()
{
    alert(111)
    var tel = $(".telShow").html();
    $.ajax({
        url:'?r=pwd/pwd_info&tel='+tel,
        Type:"get",
        success:function(obj)
        {
            // alert(obj);
        }
    });
})
$("#next").click(function()
{
    var codeInput = $("#codeInput").val();
    $.ajax({
        url:'?r=pwd/pwd_info1&codeInput='+codeInput,
        Type:"get",
        dataType:'json',
        success:function(obj)
        {
            if(obj.code == 1)
            {
                var nNode = document.getElementById('dis');
                nNode.style.display = "none";
                var nNode = document.getElementById('dis1');
                nNode.style.display = "";
            }
        }
    });
})
$("#next1").click(function()
{
    var uname = $("#uname").val();
    var contactform_verifycode = $("#contactform-verifycode").val();
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey($("#tra").val());//设置公有key
    var data = encrypt.encrypt(uname);
    $.ajax({
        url:'?r=pwd/pwd_email',
        data: "uname=" + encodeURI(data).replace(/\+/g, '%2B')+"&contactform_verifycode="+contactform_verifycode,
        // data: "password=" + encodeURI(data).replace(/\+/g, '%2B')+"&p="+'456',
        Type:"get",
        dataType:'json',
        success:function(obj)
        {
            // alert(obj)
            // if(obj.code == 1)
            // {
            //     var nNode = document.getElementById('dis1');
            //     nNode.style.display = "none";
            //     var nNode = document.getElementById('dis2');
            //     nNode.style.display = "";
            // }
        }
    });
})
$("#next2").click(function()
{
    alert(11112)
    var a = document.getElementById('uid');
    var s = a.innerText;//获取“内容”
    var s1 = s.substring(1);
    var upwd = $("#upwd").val();
    var upwd1 = $("#upwd1").val();
    // if(upwd != upwd1)
    // {
    //     return false;
    // }
        $.ajax({
            url:'?r=pwd/pwd_pwd&upwd='+upwd+'&id='+id,
            Type:"get",
            dataType:'json',
            success:function(obj)
            {
                // alert(obj == 11)
                if(obj == 11)
                {
                    var nNode = document.getElementById('dis2');
                    nNode.style.display = "none";
                    var nNode = document.getElementById('dis3');
                    nNode.style.display = "";
                }
            }
        });
    
})
$LAB.script("http://i3.zastatic.com/zhenai3/zhenai2015/js/lib/jquery-1.8.3.min_e128811.js")
.wait(function(){
    seajs.use('zhenai2015/js/set/passStep.js', function(step) {
        step.init({
        });
    });
})
</script>


</body></html>
