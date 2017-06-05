<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>婚恋网后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="assets/99fb244b/jquery.js"></script>
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
                
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>请填写您的邮箱：</th>
                                <td>
                                    <input class="common-text required" id="admin_email" name="admin_email" size="50" value="" type="text">
                                </td>
                            </tr>
                            
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="button">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>

                        </tbody></table>
                
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
<script>
    $(".btn-primary").click(function(){
        var email = $("#admin_email").val();
        var reg = /^[a-zA-Z0-9_-]+@(qq|sina|163).(com|cn|net)$/;
        if(!email.match(reg))
        {
            alert("请填写正确格式的邮箱");
        }
        else
        {
            $.ajax({
                type:'get',
                url:'?r=login/check',
                data:{admin_email:email},
                success:function(msg){
                    // alert(msg)
                    if(msg == "0")
                    {
                        alert("您填的邮箱不正确");
                    }
                    else if(msg == "1")
                    {
                        alert('邮件已发送');
                        location.href = '?r=login/logout';
                    }
                    else if(msg == "2")
                    {
                        alert("邮件发送失败");
                    }
                }
            });
        }
    });
</script>