<?php
use yii\helpers\Html;
use yii\helpers\Url;
$session = \YII::$app->session;
$is_login = $session->get("is_login");//登陆信息
if(!$is_login){
    header("content-type: text/html; charset=utf-8");
    echo "<script>alert('请先登录'); location.href='?r=login/login';</script>";

    die;
}

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>婚恋网后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="codebase/GooCalendar.css"/>
    <script  type="text/javascript" src="codebase/jquery-1.3.2.min.js"></script>
    <script  type="text/javascript" src="codebase/GooFunc.js"></script>
    <script  type="text/javascript" src="codebase/GooCalendar.js"></script>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">
                        <?php
                        $session = \YII::$app->session;
                        $admin_login = $session->get("user_info");
                        echo $admin_login =$admin_login['admin_name'];
                        ?>
                    </a></li>
                <li><a href="?r=login/login">登陆</a></li>
                <li><a href="?r=login/change">修改密码</a></li>
                <li><a href="?r=login/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="?r=admin/admin"><i class="icon-font">&#xe008;</i>管理员管理</a></li>
                        <li><a href="?r=activity/activity"><i class="icon-font">&#xe005;</i>活动管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="?r=activity/add" method="post" id="myform"  enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="appointment_title" size="50" value="" type="text">
                                </td>
                            </tr>
                           <tr>
                               <th><i class="require-red">*</i>时间：</th>
                               <td>
                                   <input type="text" value="" id="calen2" name="appointment_time" placeholder="请选择"/>
<!--                                   -<input type="text" value="" id="calen1" name="end_time" placeholder="截止时间"/>-->
                               </td>

                               <!--<input type="text" value="" id="calen"/>
                               <input type="text" value="" onKeyUp="value=value.replace(/\D{2}[0-2][0-3]/g,'')"/>
                               -->

                               <!--<div id="fff" style="width:600px; height:400px;"></div>-->

                           </tr>
                            <tr>
                                <th><i class="require-red">*</i>图片：</th>
                                <td><input name="appointment_img" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="appointment_content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>地点：</th>
                                <td>
                                    <input class="common-text required" id="" name="address" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>

                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
<script type="text/javascript">
    var property2={
        divId:"demo2",//日历控件最外层DIV的ID
        needTime:true,//是否需要显示精确到秒的时间选择器，即输出时间中是否需要精确到小时：分：秒 默认为FALSE可不填
        yearRange:[1970,2030],//可选年份的范围,数组第一个为开始年份，第二个为结束年份,如[1970,2030],可不填
        week:['日','一','二','三','四','五','六'],//数组，设定了周日至周六的显示格式,可不填
        month:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],//数组，设定了12个月份的显示格式,可不填
        format:"yyyy-MM-dd hh:mm:ss"
        /*设定日期的输出格式,可不填*/
    };
    //var property={
    //	divId:"demo",
    //	needTime:true,
    //	fixid:"fff"
    //	/*决定了日历的显示方式，默认不填时为点击INPUT后出现，但如果填了此项，日历控件将始终显示在一个id为其值（如"fff"）的DIV中（且此DIV必须存在）*/
    //};
    $(document).ready(function(){
//	canva1=$.createGooCalendar("calen",property);
        canva2=$.createGooCalendar("calen2",property2);
        //canva2.setDate({year:2008,month:11,day:22,hour:14,minute:52,second:45});
    });
    $(document).ready(function(){
//	canva1=$.createGooCalendar("calen",property);
        canva1=$.createGooCalendar("calen1",property2);
        //canva2.setDate({year:2008,month:11,day:22,hour:14,minute:52,second:45});
    });
</script>