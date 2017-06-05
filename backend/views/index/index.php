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
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
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
        <div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">官方交流网站：</label><span class="res-info"><a href="http://www.mycodes.net/" target="_blank">源码之家</a></span>
                    </li>
                    <li>
                        <label class="res-lab">官方交流QQ群：</label><span class="res-info"><a class="qq-link" target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=4ba39c297a33fa548de56a257f6128c7c9e3dd14473e4c86557d93f2197c33e8"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="JS-前端开发" title="JS-前端开发"></a> </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
<script src="jss/jquery-1.7.min.js"></script>
<script>

        $('.find').click(function(){
         alert('<input type="text">');


    });
</script>