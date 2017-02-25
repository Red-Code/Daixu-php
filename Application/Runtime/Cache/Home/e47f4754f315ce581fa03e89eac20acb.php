<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link href="/Public/img/logo.ico" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/homepage.css">
    <title>待叙-因你而待，为你而叙</title>
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
        <a href="/Daixu/app">APP</a>
        <div><a class="title_publish" href="/Daixu/publish"><p>发布</p></a></div>
        <div id="title_login">
            <img src="/Public/img/title_person.png">
            <a href="/Daixu/view_login">登录</a>
            <input value="<?php echo ($login_info["user_id"]); ?>" type="hidden">
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

    <div class="content_left"><!-- content_left  begin--最左边内容-->
        <div id="left_slideImg"><!-- left_slideImg  begin--最左边轮播图片-->
            <div id="list" style="left: -690px;">
                <img src="/Public/img/slideImg_5.jpg" alt="1"/>
                <img src="/Public/img/slideImg_1.jpg" alt="1"/>
                <img src="/Public/img/slideImg_2.jpg" alt="2"/>
                <img src="/Public/img/slideImg_3.jpg" alt="3"/>
                <img src="/Public/img/slideImg_4.jpg" alt="4"/>
                <img src="/Public/img/slideImg_5.jpg" alt="5"/>
                <img src="/Public/img/slideImg_1.jpg" alt="5"/>
            </div>
            <div id="buttons">
                <span index="1" class="on"></span>
                <span index="2"></span>
                <span index="3"></span>
                <span index="4"></span>
                <span index="5"></span>
            </div>
            <a href="javascript:;" id="prev" class="arrow">&lt;</a>
            <a href="javascript:;" id="next" class="arrow">&gt;</a>
        </div><!-- left_slideImg  finish--最左边轮播图片-->

        <?php if(is_array($select_nine_article)): $i = 0; $__LIST__ = $select_nine_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select_nine_article): $mod = ($i % 2 );++$i;?><div class="publish_content"><!-- publish_content  begin--读者发布内容块-->
                <div class="publish_content_top">
                    <img src="<?php echo ($select_nine_article["user_img"]); ?>" id=""><a href="/Daixu/personal?user_id=<?php echo ($select_nine_article["user_id"]); ?>"><h3 id=""><?php echo ($select_nine_article["user_name"]); ?></h3></a>
                    <img src="/Public/img/add.jpg" class="add">
                </div>
                <div class="publish_content_center">
                    <!--<img src="<?php echo ($select_nine_article["article_surface"]); ?>" class='publish_content_center_img'>-->

                    <!--<a href="/Daixu/article?article_id=<?php echo ($select_nine_article["article_id"]); ?>"><h1><?php echo ($select_nine_article["article_name"]); ?></h1></a>-->
                    <!--<p>-->
                        <!--<?php echo ($select_nine_article["article_content"]); ?>-->
                    <!--</p>-->
                    <img src="<?php echo ($select_nine_article["article_surface"]); ?>" class='publish_content_center_img'>
                    <a href="/Daixu/article?article_id=<?php echo ($select_nine_article["article_id"]); ?>"><h1><?php echo ($select_nine_article["article_name"]); ?></h1></a>
                    <div class="article_description">
                        <?php echo ($select_nine_article["article_content"]); ?>
                    </div>
                </div>
                <div class="publish_content_bottom">
                    <div class="publish_content_bottom_left">
                        <img src="/Public/img/classify_icon.jpg" class="classify_icon">
                        <span id="article_classify_<?php echo ($i); ?>"><?php echo ($select_nine_article["article_classify"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="gray_color"><?php echo ($select_nine_article["article_update"]); ?></span>
                    </div>
                    <div class="publish_content_bottom_right">
                        <span class="gray_color" id="">赞（<i id=""><?php echo ($select_nine_article["article_praise"]); ?></i>）</span><span class="gray_color" id="">总楼数（<i id=""><?php echo ($select_nine_article["article_total"]); ?></i>）</span>
                    </div>

                </div>
            </div><!-- publish_content  finish--读者发布内容块--><?php endforeach; endif; else: echo "" ;endif; ?>


        <a href="/Daixu/classify">
            <div id="more_article"><!-- 更多文章按钮 begin -->
                更多文章
            </div><!-- 更多文章按钮 finish -->
        </a>
        <p id="introduce_writer">推荐作者</p>
        <div class="writer"><!-- 全部作者 begin -->
            <?php if(is_array($select_four_user)): $i = 0; $__LIST__ = $select_four_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select_four_user): $mod = ($i % 2 );++$i;?><div class="writer_info"><!-- 作者信息 begin -->
                    <img src="<?php echo ($select_four_user["user_img"]); ?>" alt="">
                    <p id="writer_id"><a href="/Daixu/personal?user_id=<?php echo ($select_four_user["user_id"]); ?>"><?php echo ($select_four_user["user_name"]); ?></p><span id="writer_introduce"></span>
                    <a href="#"><div id="attention">关注</div></a>
                </div><!-- 作者信息 finish --><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><!-- 全部作者 finish -->

    </div><!-- content_left  finish--最左边内容-->

    <div class="content_right"><!-- content_right  begin--最右边内容-->

        <!-- 用户登录后展示-->
        <div id="user_info_login">
            <div class="right_top_personalInfo"><!-- 右边顶部个人信息 begin -->
                <img src="<?php echo ($login_info["user_img"]); ?>" alt="">
                <p id="writer_id"><a href="/Daixu/personal?user_id=<?php echo ($login_info["user_id"]); ?>"><?php echo ($login_info["user_name"]); ?></a></p>
                <div class="attend_attention_fans"><!-- 参加，关注，粉丝  begin -->
                    <span><a href='#'><h2><?php echo ($login_info["user_join"]); ?></h2>参与</a></span>
                    <span><a href='#'><h2><?php echo ($login_info["user_follow"]); ?></h2>关注</a></span>
                    <span><a href='#'><h2><?php echo ($login_info["user_fans"]); ?></h2>粉丝</a></span>
                </div><!-- 参加，关注，粉丝  finish -->
            </div><!-- 右边顶部个人信息 finish -->

            <div class="signIn_time_mission"><!-- signIn_time_mission  begin--最右边签到，时间，任务块-->
                <ul>
                    <a id="button_sign"><li id="come_sign">签到</li><div id="calendar_wrap"></div></a>
                    <a><li><?php echo ($today_time); ?></li></a>
                    <a><li>我的任务</li></a>
                </ul>
            </div><!-- signIn_time_mission  finish--最右边签到，时间，任务块-->
        </div>

        <img class="logo" src="/Public/img/test11.png">

        <div class="list_box"><!-- 今日作品榜 begin-->
            <div class="list_box_title">
                <h2>今日作品榜</h2>
            </div>
            <div class="list_box_list"><!-- 今日作品榜列表 begin -->
                <?php if(is_array($article_today_select)): $i = 0; $__LIST__ = $article_today_select;if( count($__LIST__)==0 ) : echo "暂无排行" ;else: foreach($__LIST__ as $key=>$article_today_select): $mod = ($i % 2 );++$i;?><ol>
                        <li><a href="/Daixu/article?article_id=<?php echo ($article_today_select["tarticle_article"]); ?>"><?php echo ($article_today_select["tarticle_name"]); ?><span><?php echo ($article_today_select["tarticle_continue"]); ?></span></a></li>
                    </ol><?php endforeach; endif; else: echo "暂无排行" ;endif; ?>
            </div><!-- 今日作品榜列表 finish -->
            <p><a href="/Daixu/ranking?type_key=1">查看更多</a></p>
        </div><!-- 今日作品榜 finish-->

        <div class="list_box"><!-- 今日成就榜 begin-->
            <div class="list_box_title">
                <h2>今日成就榜</h2>
            </div>
            <div class="achievement_list"><!-- 今日成就榜列表 begin -->
                <ol>
                    <?php if(is_array($people_today_select)): $i = 0; $__LIST__ = $people_today_select;if( count($__LIST__)==0 ) : echo "暂无排行" ;else: foreach($__LIST__ as $key=>$people_today_select): $mod = ($i % 2 );++$i;?><li><a href="/Daixu/personal?user_id=<?php echo ($people_today_select["user_id"]); ?>"><div><img src="<?php echo ($people_today_select["user_img"]); ?>"><p><?php echo ($people_today_select["user_name"]); ?><br><span></span></p></div></a></li><?php endforeach; endif; else: echo "暂无排行" ;endif; ?>
                </ol>
            </div><!-- 今日成就榜列表 finish -->
            <p><a href="/Daixu/ranking?type_key=1">查看更多</a></p>
        </div><!-- 今日成就榜 finish-->

        <div class="list_box"><!-- 话题栏 begin-->
            <div class="list_box_title">
                <h2>话题栏</h2>
            </div>
            <div class="list_box_list"><!-- 话题栏列表 begin -->
                <ol>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                    <li><a href="#">敬请期待<span></span></a></li>
                </ol>
            </div><!-- 话题栏列表 finish -->
            <p><a href="">查看更多</a></p>
        </div><!-- 话题栏 finish-->
    </div><!-- content_right  begin--最右边内容-->
</div><!-- 外层包裹层 finish -->
<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/Public/js/public.js" type="text/javascript"></script>
<script src='/Public/js/homepage.js' type="text/javascript"></script>

</body>
</html>