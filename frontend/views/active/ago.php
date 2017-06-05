<!doctype html>
<html>
<head>
    <meta charset=utf-8>
    <title>活动页面</title>
    <meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
    <meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />
    <link href="active/css/styles.css" rel="stylesheet">
    <link href="active/css/animation.css" rel="stylesheet">
    <!-- 返回顶部调用 begin -->
    <link href="active/css/lrtk.css" rel="stylesheet" />
    <script type="text/javascript" src="active/js/jquery.js"></script>
    <script type="text/javascript" src="active/js/js.js"></script>
    <script src="assets/bc127fe5/jquery.min.js"></script>
    <!-- 返回顶部调用 end-->
    <!--[if lt IE 9]>
    <script src="active/js/modernizr.active/js"></script>
    <![endif]-->
    <style>

    </style>
</head>
<body>
<header>
    <nav id="nav">
        <ul>
            <li><a href="?r=active/index" >活动</a></li>
            <li><a href="?r=active/ago" >往期回顾</a></li>
        </ul>
        <script src="active/js/silder.js"></script><!--获取当前页导航 高亮显示标题-->
    </nav>
</header>
<!--header end-->
<div id="mainbody">
    <div class="info">
        <figure> <img src="active/images/art.jpg"  alt="Panama Hat">
            <figcaption><strong>我希望我的爱情是这样的</strong>我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</figcaption>
        </figure>
        <div class="card">
            <h1>我的名片</h1>
            <p>网名：DanceSmile | 即步非烟</p>
            <p>职业：Web前端设计师、网页设计</p>
            <p>电话：13662012345</p>
            <p>Email：dancesmiling@qq.com</p>
            <ul class="linkmore">
                <li><a href="/" class="talk" title="给我留言"></a></li>
                <li><a href="/" class="address" title="联系地址"></a></li>
                <li><a href="/" class="email" title="给我写信"></a></li>
                <li><a href="/" class="photos" title="生活照片"></a></li>
                <li><a href="/" class="heart" title="关注我"></a></li>
            </ul>
        </div>
    </div>
    <!--info end-->
    <div class="blank"></div>
    <div class="blogs">
        <ul class="bloglist">

            <!-- 循环活动 -->

            <?php foreach ($sel as $key => $val){ ?>

                <li>
                    <div class="arrow_box">
                        <div class="ti"></div>
                        <!--三角形-->
                        <div class="ci"></div>
                        <!--圆形-->
                        <h2 class="title"><a href="?r=active/content&id=<?=$val['id']?>&ago=1" target="_blank"><?=$val['appointment_title'].$val['id'];?></a></h2>
                        <ul class="textinfo">
                            <a href="/"><img src="<?=$val['appointment_image'];?>"></a>
                            <p><?=$val['appointment_content'];?></p>
                        </ul>
                        <ul class="details">
                            <li class="comments"><?=$val['user_name']?></li>
                            <li class="icon-time"><?=$val['appointment_time'];?></li>
                        </ul>
                    </div>
                    <!--arrow_box end-->
                </li>
            <?php } ?>
            <!-- 循环活动结束 -->
            <li id="fen">
                <div class="arrow_box">
                    <div class="ti"></div>
                    <!--三角形-->
                    <div class="ci"></div>
                    <!--圆形-->
                    <h2 class="title" align="center" id="more">

                        <?php if ($page_total == 1){ ?>
                            暂无更多资源
                        <?php }else{ ?>
                            <a href="javascript:void(0)" opt="<?=$page_total?>" id="down">加载更多↓</a>
                        <?php } ?>
                    </h2>
                </div>
                <!--arrow_box end-->
            </li>
        </ul>
        <!--bloglist end-->
        <aside>
            <div class="tuijian">
                <h2>推荐文章</h2>
                <ol>
                    <li><span><strong>1</strong></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
                    <li><span><strong>2</strong></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
                    <li><span><strong>3</strong></span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
                    <li><span><strong>4</strong></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
                    <li><span><strong>5</strong></span><a href="/">女生清新个人博客网站模板</a></li>
                    <li><span><strong>6</strong></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
                    <li><span><strong>7</strong></span><a href="/">Column 三栏布局 个人网站模板</a></li>
                    <li><span><strong>8</strong></span><a href="/">时间煮雨-个人网站模板</a></li>
                    <li><span><strong>9</strong></span><a href="/">花气袭人是酒香—个人网站模板</a></li>
                </ol>
            </div>
            <div class="toppic">
                <h2>图文并茂</h2>
                <ul>
                    <li><a href="/"><img src="active/images/k01.jpg">腐女不可怕，就怕腐女会画画！
                            <p>伤不起</p>
                        </a></li>
                    <li><a href="/"><img src="active/images/k02.jpg">问前任，你还爱我吗？无限戳中泪点~
                            <p>感兴趣</p>
                        </a></li>
                    <li><a href="/"><img src="active/images/k03.jpg">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。
                            <p>喜欢</p>
                        </a></li>
                </ul>
            </div>
            <div class="clicks">
                <h2>热门点击</h2>
                <ol>
                    <li><span><a href="/">慢生活</a></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
                    <li><span><a href="/">爱情美文</a></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
                    <li><span><a href="/">慢生活</a></span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
                    <li><span><a href="/">博客模板</a></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
                    <li><span><a href="/">女生个人博客</a></span><a href="/">女生清新个人博客网站模板</a></li>
                    <li><span><a href="/">Wedding</a></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
                    <li><span><a href="/">三栏布局</a></span><a href="/">Column 三栏布局 个人网站模板</a></li>
                    <li><span><a href="/">个人网站模板</a></span><a href="/">时间煮雨-个人网站模板</a></li>
                    <li><span><a href="/">古典风格</a></span><a href="/">花气袭人是酒香—个人网站模板</a></li>
                </ol>
            </div>
            <div class="search">
                <form class="searchform" method="get" action="#">
                    <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
                </form>
            </div>
            <div class="viny">
                <dl>
                    <dt class="art"><img src="active/images/artwork.png" alt="专辑"></dt>
                    <dd class="icon-song"><span></span>南方姑娘</dd>
                    <dd class="icon-artist"><span></span>歌手：赵雷</dd>
                    <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
                    <dd class="icon-like"><span></span><a href="/">喜欢</a></dd>
                    <dd class="music">
                        <audio src="active/images/nf.mp3" controls></audio>
                    </dd>
                    <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
                </dl>
            </div>
        </aside>
    </div>
    <!--blogs end-->
</div>
<!--mainbody end-->
<footer>
    <div class="footer-mid">
        <div class="links">
            <h2>友情链接</h2>
            <ul>
                <li><a href="/">杨青个人博客</a></li>
                <li><a href="http://www.3dst.com">3DST技术服务中心</a></li>
            </ul>
        </div>
        <div class="visitors">
            <h2>最新评论</h2>
            <dl>
                <dt><img src="active/images/s8.jpg">
                <dt>
                <dd>DanceSmile
                    <time>49分钟前</time>
                </dd>
                <dd>在 <a href="http://www.yangqq.com/active/jstt/bj/2013-07-28/530.html" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd>
                <dd>文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</dd>
            </dl>
            <dl>
                <dt><img src="active/images/s7.jpg">
                <dt>
                <dd>yisa
                    <time>2小时前</time>
                </dd>
                <dd>在 <a href="http://www.yangqq.com/news/s/2013-07-31/533.html" class="title">芭蕾女孩的心事儿</a>中评论：</dd>
                <dd>我手机里面也有这样一个号码存在</dd>
            </dl>
            <dl>
                <dt><img src="active/images/s6.jpg">
                <dt>
                <dd>小林博客
                    <time>8月7日</time>
                </dd>
                <dd>在 <a href="http://www.yangqq.com/active/jstt/bj/2013-06-18/285.html" class="title">如果个人博客网站再没有价值，你还会坚持吗？ </a>中评论：</dd>
                <dd>博客色彩丰富，很是好看</dd>
            </dl>
        </div>
        <section class="flickr">
            <h2>摄影作品</h2>
            <ul>
                <li><a href="/"><img src="active/images/01.jpg"></a></li>
                <li><a href="/"><img src="active/images/02.jpg"></a></li>
                <li><a href="/"><img src="active/images/03.jpg"></a></li>
                <li><a href="/"><img src="active/images/04.jpg"></a></li>
                <li><a href="/"><img src="active/images/05.jpg"></a></li>
                <li><a href="/"><img src="active/images/06.jpg"></a></li>
                <li><a href="/"><img src="active/images/07.jpg"></a></li>
                <li><a href="/"><img src="active/images/08.jpg"></a></li>
                <li><a href="/"><img src="active/images/09.jpg"></a></li>
            </ul>
        </section>
    </div>
    <div class="footer-bottom">
        <p>Copyright 2013 Design by <a href="http://www.yangqq.com">DanceSmile</a></p>
    </div>
</footer>
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->
</body>
</html>
<script>
    //加载更多
    var page = 2;
//    alert(page)
    $('#down').click(function(){

        var str = '';

        $.ajax({
            type:'get',
            url:'?r=active/show',
            data:'page='+page+'&ago=1',
            dataType:'json',
            success:function(msg){
                $.each(msg,function(k,v){
                    str += '<li><div class="arrow_box">';
                    str += '<div class="ti"></div>';
                    str += '<div class="ci"></div>';
                    str += '<h2 class="title"><a href="?r=active/content&id='+v['id']+'&ago=1" target="_blank">'+v['appointment_title']+v['id']+'</a></h2>';
                    str += '<ul class="textinfo">';
                    str += '<a href="/"><img src="'+v['appointment_image']+'"></a>';
                    str += '<p>'+v['appointment_content']+'</p></ul>';
                    str += '<ul class="details">';
                    str += '<li class="comments">'+v['user_name']+'</li>';
                    str += '<li class="icon-time"><a href="#">'+v['appointment_time']+'</a></li></ul></div></li>';
                });
                if(page > $('#down').attr('opt'))
                {
                    $('#fen').before(str);
                    $('#more').html('暂无更多资源');
                }
                else
                {
                    $('#fen').before(str);
                }

            }
        });

        page ++;
    });
    //点击加入
    $(document).delegate('.j_likes','click',function(){
        var id=$(this).attr('opt');
        var num = parseInt($(this).prev().html());
        var need = $(this).children().html();
        var _this = $(this);
        $.ajax({
            type:'get',
            url:'?r=active/join',
            data:'id='+id+'&need='+need,
            success:function(msg){
                if(msg==1)
                {
                    _this.prev().html(num+1);
                    _this.children().html("取消加入");
                    alert("加入成功");

                }
                else if(msg==0)
                {
                    alert("加入失败");
                }
                else if(msg==2)
                {
                    _this.prev().html(num-1);
                    _this.children().html("点击加入");
                    alert("取消加入成功");
                }
                else if(msg==3)
                {
                    alert("取消加入失败");
                }
            }
        });
    });

    //查看更多
    $(document).delegate('.user_name','click',function(){
        var _this = $(this);
        var id = _this.attr('opt');
        $.ajax({
            type:'get',
            url:'?r=active/show_user_name',
            data:{id:id},
            success:function(msg){
                _this.parent().html(msg);
            }
        });
    });
</script>