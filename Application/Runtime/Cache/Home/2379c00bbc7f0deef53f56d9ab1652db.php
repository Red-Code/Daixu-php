<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/home.css">
    <title>待续-个人中心</title>

    <style type="text/css"></style>
</head>
<body>
<!--头部导航栏-->
<div class="title_whole">
    <div class="title_body">
        <img src="/Public/img/daixu_logo.png">
        <div class="title_search">
            <form>
                <div><input type="text" placeholder="    搜索关键字"></div>
            </form>
        </div>
        <a href="/Daixu">首页</a>
        <a href="/Daixu/classify">分类</a>
        <a href="/Daixu/end">完结</a>
        <a href="/Daixu/game">游戏</a>
        <a href="/Daixu/shopping">商城</a>
        <a href="/Daixu/app">APP</a>
        <div><a class="title_publish" href="/Daixu/publish"><p>发布</p></a></div>
        <div id="title_login">
            <img src="/Public/img/title_person.png">
            <a href="/Daixu/view_login">登录</a>
            <input value="<?php echo ($login_user_info["user_id"]); ?>" type="hidden">
            <a class="title_register" href="/Daixu/view_register">注册</a>
        </div>
        <div id="title_personal">
            <img src="/Public/img/title_person.png">
            <a href="/Daixu/personal"><?php echo ($login_info["user_name"]); ?></a>
            <a class="title_register" href="/Action/del_login">退出</a>
        </div>
    </div>
</div>

<!--主体-->
<div class="wrap"><!-- 外层包裹层 begin -->
    <div class="top_person_info"><!-- 顶部个人信息 begin -->
        <div class="head_img"><img src="/Public/img/head3.jpg"></div>
        <div class="top_person_info_content">
            <a href=''><span id="person_id">我是一只小小鸟!</span></a><a href=''><span id="person_grade"> &nbsp;&nbsp;Lv20</span></a>&nbsp;<img src="/Public/img/vip_img.jpg" id="VIP"><br><br><span id="brief_introduction">简介：这个人很懒，没有留下东西！</span>
        </div>
    </div><!-- 顶部个人信息 finish -->
    <div class="content_left"><!-- content_left  begin--最左边内容-->
        <div class="content_left_top"><!-- content_left_top  begin--最左边内容顶部-->
            <ul>
                <a href='#'><li>全部</li></a>
                <a href='#'><li>发出的贴</li></a>
                <a href='#'><li>完结</li></a>
                <a href='#'><li>接龙贴</li></a>
                <a href='#'><li>原创帖</li></a>
                <a href='#'><li>游戏瞬间</li></a>
            </ul>
        </div><!-- content_left_top  finish--最左边内容顶部-->
        <div class="publish_content"><!-- publish_content  begin--读者发布内容块-->
            <div class="publish_content_top">
                <img src="/Public/img/head2.jpg"><a href="#"><h3>一只小飞鱼</h3></a>
                <img src="/Public/img/add.jpg" class="add">
            </div>
            <div class="publish_content_center">
                <img src="/Public/img/publish_content_center_img.jpg" class='publish_content_center_img'>

                <a href="#"><h1>旅行也需要勇气</h1></a>
                <p>
                    旅行，指远行；去外地办事或游览。去外地行走。不同于旅游。
                    旅行和旅游的区别就在于：旅行是在观察身边的景色和事物，
                    行万里路，读万卷书，相对于是指个人，是行走。
                    旅游是指游玩，通常是团体出行，在时间上是很短暂的。
                    旅游就是旅行游览活...
                </p>
            </div>
            <div class="publish_content_bottom"><!-- 发布内容底部  begin -->
                <div class="publish_content_bottom_left">
                    <img src="/Public/img/classify_icon.jpg" class="classify_icon">
                    <span>都市言情</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="gray_color">两分钟前更新</span>
                </div>
                <div class="publish_content_bottom_right">
                    <span class="gray_color" id="">赞（<i id="">230</i>）</span><span class="gray_color" id="">评论（<i id="">20</i>）</span>
                </div>
            </div><!-- 发布内容底部  finish -->
        </div><!-- publish_content  finish--读者发布内容块-->
        <div class="publish_content"><!-- publish_content  begin--读者发布内容块-->
            <div class="publish_content_top">
                <img src="/Public/img/head2.jpg"><h3>一只小飞鱼</h3>
                <img src="/Public/img/add.jpg" class="add">
            </div>
            <div class="publish_content_center">

                <h1>旅行也需要勇气</h1>
                <p>
                    旅行，指远行；去外地办事或游览。去外地行走。不同于旅游。
                    旅行和旅游的区别就在于：旅行是在观察身边的景色和事物，
                    行万里路，读万卷书，相对于是指个人，是行走。
                    旅游是指游玩，通常是团体出行，在时间上是很短暂的。
                    旅游就是旅行游览活通常是团体出行，在时间上是很短暂的。
                    旅游就是旅行游览活...
                </p>
            </div>
            <div class="publish_content_bottom"><!-- 发布内容底部  begin -->
                <div class="publish_content_bottom_left">
                    <img src="/Public/img/classify_icon.jpg" class="classify_icon">
                    <span>都市言情</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="gray_color">两分钟前更新</span>
                </div>
                <div class="publish_content_bottom_right">
                    <span class="gray_color" id="">赞（<i id="">230</i>）</span><span class="gray_color" id="">评论（<i id="">20</i>）</span>
                </div>
            </div><!-- 发布内容底部  finish -->
        </div><!-- publish_content  finish--读者发布内容块-->
        <div class="publish_content"><!-- publish_content  begin--读者发布内容块-->
            <div class="publish_content_top">
                <img src="/Public/img/head2.jpg"><h3>一只小飞鱼</h3>
                <img src="/Public/img/add.jpg" class="add">
            </div>
            <div class="publish_content_center">
                <img src="/Public/img/publish_content_center_img.jpg" class='publish_content_center_img'>

                <h1>旅行也需要勇气</h1>
                <p>
                    旅行，指远行；去外地办事或游览。去外地行走。不同于旅游。
                    旅行和旅游的区别就在于：旅行是在观察身边的景色和事物，
                    行万里路，读万卷书，相对于是指个人，是行走。
                    旅游是指游玩，通常是团体出行，在时间上是很短暂的。
                    旅游就是旅行游览活...
                </p>
            </div>
            <div class="publish_content_bottom"><!-- 发布内容底部  begin -->
                <div class="publish_content_bottom_left">
                    <img src="/Public/img/classify_icon.jpg" class="classify_icon">
                    <span>都市言情</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="gray_color">两分钟前更新</span>
                </div>
                <div class="publish_content_bottom_right">
                    <span class="gray_color" id="">赞（<i id="">230</i>）</span><span class="gray_color" id="">评论（<i id="">20</i>）</span>
                </div>
            </div><!-- 发布内容底部  finish -->
        </div><!-- publish_content  finish--读者发布内容块-->
    </div><!-- content_left  finish--最左边内容-->

    <div class="content_right"><!-- content_right  begin--最右边内容-->
        <div class="content_right_top"><!-- content_right_top  begin--最右边内容顶部-->
            <span><a href='#'><h2>10</h2>参与</a></span>
            <span><a href='#'><h2>5</h2>关注</a></span>
            <span><a href='#'><h2>80</h2>粉丝</a></span>
        </div><!-- content_right_top  finish--最右边内容顶部-->
        <div class="content_right_list"><!-- content_right_list  begin--最右边列表内容-->
            <ul>
                <a href="#"><li class="this_page">主页</li></a>
                <a href="#"><li>资料</li></a>
                <a href="#"><li>草稿</li></a>
                <a href="#"><li>收藏</li></a>
                <a href="#"><li>成就</li></a>
                <a href="#"><li>设置</li></a>
                <a href="#"><li>消息</li></a>
            </ul>
        </div><!-- content_right_list  finish--最右边列表内容-->
        <div class="content_right_blockOne"><!-- content_right_grade  begin--最右边等级内容-->
            <div class="blockOne_title"><!-- grade_title  begin--最右边等级标题内容-->
                <p>等级信息</p>
            </div><!-- grade_title  finish--最右边等级标题内容-->
            <div class="blockOne_content"><!-- grade_content  begin--最右边等级信息内容-->
                <span id="present_grade">Lv2</span><progress value="20" max="100" id="experience_item"></progress><span id="next_grade">Lv3</span>
                <br /><p>当前等级：<a href='#'><span>Lv2</span></a></p>
                <p>经验值：<a href='#'><span>12</span></a></p>
                <p>距离升级需经验值：<a href='#'><span>23</span></a></p>
            </div><!-- grade_content  begin--最右边等级信息内容-->
            <div class="blockOne_more"><!-- grade_more  begin--最右边等级更多信息信息内容-->
                <p><a href="#">查看详情</a></p>
            </div><!-- grade_more  finish--最右边等级更多信息信息内容-->

        </div><!-- content_right_badge  finish--最右边徽章内容-->
        <div class="content_right_blockOne"><!-- content_right_badge  begin--最右边徽章内容-->
            <div class="blockOne_title"><!-- grade_title  begin--最右边徽章标题内容-->
                <p>徽章信息</p>
            </div><!-- grade_title  finish--最右边徽章标题内容-->
            <div class="blockOne_content"><!-- grade_content  begin--最右边徽章信息内容-->
                <ul>
                    <li class="badge_img"></li>
                    <li class="badge_img"></li>
                    <li class="badge_img"></li>
                    <li class="badge_img"></li>
                </ul>
            </div><!-- grade_content  finish--最右边徽章信息内容-->
            <div class="blockOne_more"><!-- grade_more  begin--最右边徽章更多信息信息内容-->
                <p><a href="#">全部徽章</a></p>
            </div><!-- grade_more  finish--最右边徽章更多信息信息内容-->
        </div><!-- content_right_grade  finish--最右边等级内容-->

        <div class="content_right_blockTwo"><!-- content_right_blockTwo  begin--最右边排名内容-->
            <div class="blockTwo_title"><!-- blockTwo_title  begin--最右边排名标题内容-->
                <p>我的排名</p>
                <a href='#'><span id="achievement">成就</span></a>
                <a href='#'><span id="hot_degree">热度</span></a>
            </div><!-- blockTwo_title  finish--最右边排名标题内容-->
            <div class="blockTwo_content"><!-- blockTwo_content  begin--最右边排名信息内容-->
                <ul>
                    <a href="#"><li class="">什么小故事<span id="click_num">12340</span></li></a>
                    <a href="#"><li class="">合同里的小故事<span id="click_num">11345</span></li></a>
                </ul>
            </div><!-- blockTwo_content  finish--最右边排名信息内容-->

        </div><!-- content_right_blockTwo  finish--最右边排名内容-->

        <div class="content_right_blockTwo"><!-- content_right_blockTwo  begin--最右边跨屏浏览内容-->
            <div class="blockTwo_title_scan"><!-- blockTwo_title  begin--最右边跨屏浏览标题内容-->
                <p>跨屏浏览</p>
            </div><!-- blockTwo_title  finish--最右边跨屏浏览标题内容-->
            <div class="blockTwo_content"><!-- blockTwo_content  begin--最右边跨屏浏览信息内容-->
                <div id="scan_img"><img src="/Public/img/scan_img.jpg"></div><p>扫描二维码<br />可以用手机访问网页</p>
            </div><!-- blockTwo_content  finish--最右边跨屏浏览信息内容-->

        </div><!-- content_right_blockTwo  finish--最跨屏浏览排名内容-->
    </div><!-- content_right  begin--最右边内容-->
</div><!-- 外层包裹层 finish -->

<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/Public/js/public.js" type="text/javascript"></script>
<script src="/Public/js/home.js" type="text/javascript"></script>
</body>
</html>