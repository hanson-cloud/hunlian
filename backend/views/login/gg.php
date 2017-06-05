<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>婚恋网后台管理</title>
    <link href="css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="?r=login/add" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="admin_name" value="" id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="admin_pwd" value="" id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <a href="javascript:void(0)" id="width">忘记密码</a>
                        <!--                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="">注册-></a>-->
                    </li>
                    <!--                    <li>-->
                    <!--                    <div class="otherLogin">-->
                    <!--                        <div class="sup">-->
                    <!--                            <h3 class="tit">合作网站帐号登录</h3>-->
                    <!--                        </div>-->
                    <!--                        <div class="sub">-->
                    <!--                            <a href="javascript:void(0)" onclick="toQzoneLogin()" class="qq"><em>腾讯QQ登录</em><i></i></a>-->
                    <!--                            <a href="http://my.daoxila.com/third/wechatlogin" class="weixin"><em>微信登录</em><i></i></a>-->
                    <!--                            <a href="http://my.daoxila.com/third/sinalogin" class="sina"><em>新浪微博登录</em><i></i></a>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    </li>-->
                    <li>
                        <input type="submit" tabindex="3" value="登陆" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script src="jss/jquery-1.7.min.js"></script>
<script>
    //找回密码
    $("#width").click(function(){
        var value=prompt('请输入邮箱');
        $.ajax({
            type:'post',
            url:"<?php echo url::to(['login/mmm'])?>",
            data:'email='+value,
            success:function(msg)
            {
                if(msg==1){
                    alert("发送成功");
                }else{
                    alert("发送失败");
                }
            }
        });
    })

</script>