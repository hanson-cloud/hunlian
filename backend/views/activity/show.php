
<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;
$session = \YII::$app->session;
$is_login = $session->get("is_login");//登陆信息
if(!$is_login){
    header("content-type: text/html; charset=utf-8");
    echo "<script>alert('请先登录'); location.href='?r=login/login';</script>";

    die;
}

?>

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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <table class="search-tab">
                    <tr>
                        <th width="70">关键字:</th>
                        <td><input class="common-text" placeholder="请输入标题"  id="keywords" type="text"></td>
                        <td><button class="btn btn-primary btn2" id="search">查询</button></td
                    </tr>
                </table>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <div class="result-list">
                    <a href="?r=activity/activity_add"><i class="icon-font"></i>新增作品</a>
                    <a id="batchDel" href="javascript:void(0)" class="qq"><i class="icon-font"></i>批量删除</a>
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序(*发布或未发布)</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" id="m" type="checkbox"></th>
                        <th>ID</th>
                        <th>标题</th>
                        <th>内容</th>
                        <th>时间</th>
                        <th>地点</th>
                        <th>图片</th>
                        <th>操作</th>
                    </tr>
                    <tbody class="ddd">
                    <?php foreach($list as $k=>$val){ ?>
                        <tr>
                            <td class="tc"><input title="<?php echo $val['id'];?>" name="check[]"  class="ke" type="checkbox"></td>
                            <td id="d"class="dd"><?php echo $val['id']?></td>
                            <td><span class="content"><?php echo $val['appointment_title']?></span></td>
                            <td><span class="nei"><?php echo $val['appointment_content']?></span></td>
                            <td><?php echo date("Y-m-d H:i:s",$val['appointment_time'])?></td>
                            <td><span class="dian"><?php echo $val['address'] ?></span></td>
                            <td><img width="100" height="100" src="<?php echo $val['appointment_image']?>"</td>
                            <td>
                                <a class="del" href="#" id="del">删除</a>
                                <a class="link-del" href="#">发布</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>

                <center>
                    <?php
                    echo "<br>".$pages;
                    ?>
                </center>

            </div>
        </div>
        <!--/main-->
    </div>
</body>

<script src="jss/jquery-1.7.min.js"></script>
<script>
    // 地点
    $(document).on("click",".dian",function(){
        var  dian = $(this).html();
        $(this).parent().html("<input type='text' value='"+ dian+"' name='sort'>");
        $(document).on("blur","input[name='sort']",function(){
            var news = $(this).val();
            var id = $(".dd").html();
            var obj = $(this);
            if(content == news){
                $(this).parent().html("<span class='dian'>"+dian+"</span>")
            }else{
                if(news==""){
                    alert("请输入要修改的内容!")
                    $(this).parent().html("<input type='text' value='"+dian+"' name='sort'>");
                }
                else{
                    $.ajax({
                        type:"post",
                        url:"<?php echo url::to(['activity/dian'])?>",
                        data:{
                            id:id,
                            news:news
                        },
                        success:function(msg){
                            if(msg==0){
                                alert("哎呀,修改失败了!")
                                obj.parent().html("<span class='dian'>"+sort+"</span>");
                            }else{
                                obj.parent().html("<span class='dian'>"+news+"</span>");
                            }
                        }
                    })
                }


            }
        })
    });
    // 标题 集点集改
    $(document).on("click",".content",function(){
        var content = $(this).html();
        $(this).parent().html("<input type='text' value='"+content+"' name='sort'>");
        $(document).on("blur","input[name='sort']",function(){
            var news = $(this).val();
            var id = $(".dd").html();
            var obj = $(this);
            if(content == news){
                $(this).parent().html("<span class='content'>"+content+"</span>")
            }else{
                if(news==""){
                    alert("请输入要修改的内容!")
                    $(this).parent().html("<input type='text' value='"+content+"' name='sort'>");
                }
                else{
                    $.ajax({
                        type:"post",
                        url:"<?php echo url::to(['activity/gai'])?>",
                        data:{
                            id:id,
                            news:news
                        },
                        success:function(msg){
                            if(msg==0){
                                alert("哎呀,修改失败了!")
                                obj.parent().html("<span class='content'>"+sort+"</span>");
                            }else{
                                obj.parent().html("<span class='content'>"+news+"</span>");
                            }
                        }
                    })
                }


            }
        })
    });


    // 内容 集点集改
    $(document).on("click",".nei",function(){
        var nei = $(this).html();
        $(this).parent().html("<input type='text' value='"+nei+"' name='sort'>");
        $(document).on("blur","input[name='sort']",function(){
            var news = $(this).val();
            var id = $(".dd").html();
            var obj = $(this);
            if(nei == news){
                $(this).parent().html("<span class='nei'>"+nei+"</span>")
            }else{
                if(news==""){
                    alert("请输入要修改的内容!")
                    $(this).parent().html("<input type='text' value='"+nei+"' name='sort'>");
                }
                else{
                    $.ajax({
                        type:"post",
                        url:"<?php echo url::to(['activity/gai_t'])?>",
                        data:{
                            id:id,
                            news:news
                        },
                        success:function(msg){
                            if(msg==0){
                                alert("哎呀,修改失败了!")
                                obj.parent().html("<span class='nei'>"+sort+"</span>");
                            }else{
                                obj.parent().html("<span class='nei'>"+news+"</span>");
                            }
                        }
                    })
                }


            }
        })
    });

    //单删
    $('.del').click(function(){
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
        var id = $("#d").html();
        $.ajax({
            type: "get",
            url: "<?php echo url::to(['activity/del'])?>",
            data: {id:id},
            success: function(msg){
                if(msg ==1){
                    $("#del").parent().parent().remove();
                }
            }
        });
    })
    //搜索
    $('#search').click(function(){
        var search = $("#keywords").val();
        $.ajax({
            type: "GET",
            url: "<?php echo url::to(['activity/search'])?>",
            data: {search:search},
            success: function(msg){

                $(".html").html(msg);
            }
        });


    })
    //全选
    $(document).on("click", "allChoose", function ()
    {
        if(this.checked){
            $("input[name='check[]']").each(function ()
            {
                $(this).prop("checked", true);
            });

        }else{
            $("input[name='check[]']").each(function ()
            {
                $(this).prop("checked", false);
            });
        }
    });

    //反选
    $(document).on("click", "#m", function () {
        var length = $(".ke").size();
        for (var i = 0; i < length; i++) {
            if ($(".ke")[i].checked == true) {
                $(".ke")[i].checked = false;
            } else {
                $(".ke")[i].checked = true;
            }
        }
    })
    //批删
    $(".qq").click(function(){


        var id = document.getElementsByName("check[]");
        var str = "";
        for(var i=0;i<id.length;i++){
            if(id[i].checked){
                str = str +","+ id[i].title;
            }
        }
        str = str.substr(1);
        if(str){
            $.ajax({
                type: "get",
                url: "<?php echo url::to(['activity/delall'])?>",
                data: {str:str},
                success: function(msg){
                    if(msg ==1){
//                   $('.ddd').remove();
//                   $("#del").parent().parent().remove();
                        location.reload()//重载
                    }
                }
            });
        }else{
            alert("请选择要删除的内容");
        }


    });


</script>