<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="" content="">
    <link rel="stylesheet" type="text/css" href="/Public/css/ranking.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">

    <title>待续-排名</title>
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
            <input value="<?php echo ($login_user_info["user_id"]); ?>" type="hidden">
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

<div class="Body">
    <div class="Body_left">
        <div class="Body_left_big">
            <div class="charts">
                <div id="charts_left">
                    <!--<p id="chengjiu" onclick="click_achieve()">用户成就排行榜</p>-->
                    <p id="chengjiu">用户成就排行榜</p>
                </div>
                <div id="charts_right">
                    <!--<p id="redu" onclick="click_story()">故事热度排行榜</p>-->
                    <p id="redu">故事热度排行榜</p>
                </div>
            </div>
            <div class="rank_way" id="selection">
                <p class="jinri">今日</p>
                <p class="benzhou">本周</p>
                <p class="all">全部</p>
            </div>
            <div class="rank_inf">
                <p class="paiming">排名</p>
                <p class="zuozhe">作者</p>
                <p class="rezhishu">热度指数</p>
            </div>
            <div class="line_box">
                <div class="line_1"></div>
            </div>
            <div id="rank_inf_box_achieve" >
                <div class="all_rank_box_1" >
                    <p class="rank_num">1、</p>
                    <div class="rank_headpic_1"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">一只小飞鱼</p>
                        <p class="rank_signature">飞鱼的梦想你可知道</p>
                    </div>
                    <p class="rank_hot_num">12236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">2、</p>
                    <div class="rank_headpic"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">3、</p>
                    <div class="rank_headpic"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">4、</p>
                    <div class="rank_headpic"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">5、</p>
                    <div class="rank_headpic"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">6、</p>
                    <div class="rank_headpic"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">7、</p>
                    <div class="rank_headpic"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">8、</p>
                    <div class="rank_headpic"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">9、</p>
                    <div class="rank_headpic"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
                <div class="all_rank_box_2">
                    <p class="rank_num">10、</p>
                    <div class="rank_headpic_10"></div>
                    <div class="name_and_signature">
                        <p class="rank_name">川岛</p>
                        <p class="rank_signature">点一根烟、送给我自己</p>
                    </div>
                    <p class="rank_hot_num">11236</p>
                </div>
            </div>
            <div id="rank_inf_box_story" >
                <div class="rank_inf">
                    <p class="paiming">排名</p>
                    <p class="zuozhe">故事名</p>
                    <p class="rezhishu">热度指数</p>
                </div>
                <div class="line_box">
                    <div class="line_1"></div>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">1、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">2、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">3、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">4、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">5、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">6、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">7、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">8、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">9、</p>
                    <div class="story_name_box">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
                <div class="rank_box_story_1" >
                    <p class="story_rank_num">10、</p>
                    <div class="story_name_box_10">
                        <p class="rank_story_name">什么小故事</p>
                    </div>
                    <p class="story_rank_hot_num">12236</p>
                </div>
            </div>
        </div>
        <div class="Ad"></div>
    </div>

    <div class="content_right"><!-- content_right  begin--最右边内容-->

        <!-- 用户登录后展示-->
        <div id="user_info_login">
            <div class="right_top_personalInfo"><!-- 右边顶部个人信息 begin -->
                <img src="<?php echo ($login_info["user_img"]); ?>" alt="">
                <p id="writer_id"><a href="/Daixu/personal"><?php echo ($login_info["user_name"]); ?></a></p>
                <div class="attend_attention_fans"><!-- 参加，关注，粉丝  begin -->
                    <span><a href='#'><h2><?php echo ($login_info["user_join"]); ?></h2>参与</a></span>
                    <span><a href='#'><h2><?php echo ($login_info["user_follow"]); ?></h2>关注</a></span>
                    <span><a href='#'><h2><?php echo ($login_info["user_fans"]); ?></h2>粉丝</a></span>
                </div><!-- 参加，关注，粉丝  finish -->
            </div><!-- 右边顶部个人信息 finish -->

            <div class="signIn_time_mission"><!-- signIn_time_mission  begin--最右边签到，时间，任务块-->
                <ul>
                    <a><li>签到</li></a>
                    <a><li><?php echo ($today_time); ?></li></a>
                    <a><li>我的任务</li></a>
                </ul>
            </div><!-- signIn_time_mission  finish--最右边签到，时间，任务块-->
        </div>
        <div class="right_box"><!-- 右边排名内容 begin-->
            <div class="box_title"><!--  begin--最右边排名标题内容-->
                <h3>我的排名</h3>
                <a href='#'><span id="achievement">成就</span></a>
                <a href='#'><span id="hot_degree">热度</span></a>
            </div><!--  finish--最右边排名标题内容-->
            <div class="box_content"><!--  begin--最右边排名信息内容-->
                <ol>
                    <a href="#"><li class="">什么小故事<span id="click_num">12340</span></li></a>
                    <a href="#"><li class="">合同里的小故事<span id="click_num">11345</span></li></a>
                </ol>
            </div><!--   finish--最右边信息内容-->

        </div><!--  finish--最右边排名内容-->
        <div class="right_box"><!-- 右边排名规则内容 begin-->
            <div class="box_title"><!--  begin--最右边排名规则标题内容-->
                <h3>排名规则</h3>
            </div><!--  finish--最右边排名规则标题内容-->
            <div class="box_content"><!--  begin--最右边规则信息内容-->
                <p>首先！其次！最后！所以你不能怎样怎样要怎样怎样怎样。</p>
            </div><!--   finish--最右边规则信息内容-->

        </div><!--  finish--最右边排名规则内容-->
    </div><!-- content_right  begin--最右边内容-->
</div>

<!--主体-->
<div>
</div>

<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/Public/js/public.js" type="text/javascript"></script>
<script src="/Public/js/ranking.js" type="text/javascript"></script>
</body>
</html>