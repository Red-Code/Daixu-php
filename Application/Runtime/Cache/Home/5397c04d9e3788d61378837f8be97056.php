<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/home.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/data.css">
    <link rel="stylesheet" href="/Public/css/achievement.css">
    <title>待续-个人成就</title>
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
        <a href="/Daixu/end_article">完结</a>
        <a href="/Daixu/game">游戏</a>
        <a href="/Daixu/shopping">商城</a>
        <a href="/Daixu/app.html">APP</a>
        <div><a class="title_publish" href="/Daixu/publish"><p>发布</p></a></div>
        <div id="title_login">
            <img src="/Public/img/title_person.png">
            <a href="/Daixu/view_login">登录</a>
            <input value="<?php echo ($login_login_info["user_id"]); ?>" type="hidden">
            <a class="title_register" href="/Daixu/view_register">注册</a>
        </div>
        <a href="/Daixu/notice" id="notice_news_num"><?php echo ($notice_news_num); ?></a>
        <div id="title_personal">
            <img src="/Public/img/title_person.png">
            <a href="/Daixu/personal?user_id=<?php echo ($login_info["user_id"]); ?>" id="fixed_wid_username"><?php echo ($login_info["user_name"]); ?></a>
            <a class="title_register" href="/Action/del_login">退出</a>
        </div>
    </div>
</div>

<!--主体-->
<div class="wrap"><!-- 外层包裹层 begin -->
    <div class="top_person_info"><!-- 顶部个人信息 begin -->
        <div class="head_img"><img src="<?php echo ($login_info["user_img"]); ?>"></div>
        <div class="top_person_info_content">
            <a href=''><span id="person_id"><?php echo ($login_info["user_name"]); ?></span></a><a href=''><span id="person_grade"> &nbsp;&nbsp;Lv<?php echo ($login_info["user_rank"]); ?></span></a>&nbsp;<img src="/Public/img/vip1.png" id="VIP"><br><br><span id="brief_introduction">简介：<?php echo ($login_info["user_brief"]); ?></span>
        </div>
    </div><!-- 顶部个人信息 finish -->
    <div class="content_left"><!-- content_left  begin--最左边内容-->
        <div class="_up_box" id="select_box">
            <ul>
                <li class="this_box">我的任务</li>
                <li>徽章</li>
                <li>奖励</li>
            </ul>
        </div>
        <div class="_down_box">
            <ul >
                <li class="_floor">
                    任务一：赞15次（0/15）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>
                <li class="_floor">
                    任务二：接5次楼（0/5）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>
                <li class="_floor">
                    任务三：发起一次帖（0/1）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>
                <li class="_floor">
                    任务四：分享一次帖（0/1）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>
                <li class="_floor">
                    任务五：五局游戏（0/5）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>
                <li class="_floor">
                    任务六：收藏一个帖子（0/1）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>
                <li class="_floor">
                    任务七：关注一个用户（0/1）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>

                <li class="_floor">
                    任务八：评论五次（0/5）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>
                <li class="_floor">
                    任务九： 参加一次活动（0/5）
             <span class="_state_box">
                <a><p class="_state">已领取</p></a>
             </span>
                </li>
            </ul>
        </div>
    </div><!-- content_left  finish--最左边内容-->

    <div class="content_right"><!-- content_right  begin--最右边内容-->
        <div class="content_right_top"><!-- content_right_top  begin--最右边内容顶部-->
            <span><a href='#'><h2><?php echo ($login_info["user_join"]); ?></h2>参与</a></span>
            <span><a href='#'><h2><?php echo ($login_info["user_follow"]); ?></h2>关注</a></span>
            <span><a href='#'><h2><?php echo ($login_info["user_fans"]); ?></h2>粉丝</a></span>
        </div><!-- content_right_top  finish--最右边内容顶部-->
        <div class="content_right_list" id="content_right_list"><!-- content_right_list  begin--最右边列表内容-->
            <ul>
                <a href="/Daixu/personal?user_id=<?php echo ($login_info["user_id"]); ?>"><li>主页</li></a>
                <a href="/Daixu/data"><li>资料</li></a>
                <a href="/Daixu/draft"><li>草稿</li></a>
                <a href="/Daixu/collection"><li>收藏</li></a>
                <a href="/Daixu/achievement"><li class="this_li">成就</li></a>
                <a href="/Daixu/set"><li>设置</li></a>
                <a href="/Daixu/notice"><li>消息</li></a>
            </ul>
        </div><!-- content_right_list  finish--最右边列表内容-->
        <div class="content_right_blockOne"><!-- content_right_grade  begin--最右边等级内容-->
            <div class="blockOne_title"><!-- grade_title  begin--最右边等级标题内容-->
                <p>等级信息</p>
            </div><!-- grade_title  finish--最右边等级标题内容-->
            <div class="blockOne_content"><!-- grade_content  begin--最右边等级信息内容-->
                <!--<span id="present_grade">Lv2</span><progress value="20" max="100" id="experience_item"></progress><span id="next_grade">Lv3</span>-->
                <br /><p>当前等级：<a href='#'><span>Lv<?php echo ($login_info["user_rank"]); ?></span></a></p>
                <p>经验值：<a href='#'><span><?php echo ($login_info["user_exp"]); ?></span></a></p>
                <p>距离升级需经验值：<a href='#'><span id="span_need_exp"><?php echo ($login_info["user_surplus_exp"]); ?></span></a></p>
            </div><!-- grade_content  begin--最右边等级信息内容-->
            <div class="blockOne_more"><!-- grade_more  begin--最右边等级更多信息信息内容-->
                <p><a href="#">查看详情</a></p>
            </div><!-- grade_more  finish--最右边等级更多信息信息内容-->

        </div><!-- content_right_badge  finish--最右边徽章内容-->

        <!--<div class="content_right_blockOne">&lt;!&ndash; content_right_badge  begin&#45;&#45;最右边徽章内容&ndash;&gt;-->
        <!--<div class="blockOne_title">&lt;!&ndash; grade_title  begin&#45;&#45;最右边徽章标题内容&ndash;&gt;-->
        <!--<p>徽章信息</p>-->
        <!--</div>&lt;!&ndash; grade_title  finish&#45;&#45;最右边徽章标题内容&ndash;&gt;-->
        <!--<div class="blockOne_content">&lt;!&ndash; grade_content  begin&#45;&#45;最右边徽章信息内容&ndash;&gt;-->
        <!--<ul>-->
        <!--<li class="badge_img"></li>-->
        <!--<li class="badge_img"></li>-->
        <!--<li class="badge_img"></li>-->
        <!--<li class="badge_img"></li>-->
        <!--</ul>-->
        <!--</div>&lt;!&ndash; grade_content  finish&#45;&#45;最右边徽章信息内容&ndash;&gt;-->
        <!--<div class="blockOne_more">&lt;!&ndash; grade_more  begin&#45;&#45;最右边徽章更多信息信息内容&ndash;&gt;-->
        <!--<p><a href="#">全部徽章</a></p>-->
        <!--</div>&lt;!&ndash; grade_more  finish&#45;&#45;最右边徽章更多信息信息内容&ndash;&gt;-->
        <!--</div>&lt;!&ndash; content_right_grade  finish&#45;&#45;最右边等级内容&ndash;&gt;-->

        <div class="content_right_blockTwo"><!-- content_right_blockTwo  begin--最右边排名内容-->
            <div class="blockTwo_title"><!-- blockTwo_title  begin--最右边排名标题内容-->
                <p>我的排名</p>
                <!--<a href='#'><span id="achievement">成就</span></a>-->
                <!--<a href='#'><span id="hot_degree">热度</span></a>-->
            </div><!-- blockTwo_title  finish--最右边排名标题内容-->
            <div class="blockTwo_content"><!-- blockTwo_content  begin--最右边排名信息内容-->
                <p class="own_rank_info">（排名根据经验值来定，以下是您在平台中的总排名）</p>
                <p class="own_rank">第<?php echo ($select_uer_rank); ?>名</p>
                <!--<ul>-->
                <!--<a href="#"><li class="">什么小故事<span id="click_num">12340</span></li></a>-->
                <!--<a href="#"><li class="">合同里的小故事<span id="click_num">11345</span></li></a>-->
                <!--</ul>-->
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
<script src='/Public/js/home.js' type="text/javascript"></script>
<script src='/Public/js/achievement.js' type="text/javascript"></script>
</body>
</html>