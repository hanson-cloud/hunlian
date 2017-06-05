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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">管理员管理</span></div>
        </div>

        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">

                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>操作</th>
                        </tr>
                        <?php foreach($data as $k=>$val){ ?>
                        <tr>
                            <td><?php echo $val['id']?></td>
                            <td><?php echo $val['admin_name']?></td>
                                 <td>
                                <a class="link-update" href="#">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>