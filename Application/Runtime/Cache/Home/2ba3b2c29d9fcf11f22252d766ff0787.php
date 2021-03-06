<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/home.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/set.css">
    <title>待续-个人设置</title>
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
        <div class="content_left_top_set"><!-- content_left_top  begin--最左边内容顶部-->
            <ul id="all_set">
                <li class="this_set">账号设置</li>
                <li>消息设置</li>
                <li>隐私设置</li>
                <li>账号安全</li>
                <li>密码修改</li>
            </ul>
        </div><!-- content_left_top  finish--最左边内容顶部-->

            <div id="for_obtain_div">
                    <div id="personal_info"><!-- 个人信息设置块 begin -->
                        <h4>账号设置</h4>

                        <hr>

                        <form action="/Action/upload_user_img" method="POST" enctype="multipart/form-data">
                            <span>更换头像：</span>
                            <input type="file" accept="image/*" name="img_surface">

                            <button type="submit">提交</button>
                        </form>

                    </div><!-- 个人信息设置块 finish -->
                    <div id="news_set" class="hide_box"><!-- 消息设置块 begin -->
                        <h4>消息设置</h4>

                            <ul>
                                <li>
                                    <h4>@我的</h4>
                                    <p>我可以收到哪些人的@消息<br>
                                        <span><label><input type="radio" name='receive_news' checked="true">接受所有人消息</label></span>
                                        <span><label><input type="radio" name="receive_news">只接受关注人消息</label></span>
                                    </p>
                                </li>
                                <li>
                                    <h4>赞</h4>
                                    <p>是否接受赞提醒<br>
                                        <span><label><input type="radio" name='praise' checked="true">提醒</label></span>
                                        <span><label><input type="radio" name="praise">不提醒</label></span>
                                    </p>
                                </li>
                                <li>
                                    <h4>私信</h4>
                                    <p>我可以收到哪些人私信<br>
                                        <span><label><input type="radio" name='privacy_new' checked="true">所有人</label></span>
                                        <span><label><input type="radio" name="privacy_new">我关注的人</label></span>
                                    </p>
                                </li>
                                <li>
                                    <h4>关注</h4>
                                    <p>接收哪些人的关注提醒<br>
                                        <span><label><input type="radio" name='attention' checked="true">所有人</label></span>
                                        <span><label><input type="radio" name='attention'>关注的人</label></span>
                                        <span><label><input type="radio" name="attention">不提醒</label></span>
                                    </p>
                                </li>
                            </ul>
                            <input type="submit" value="保存" id="preserve">
                    </div><!-- 消息信息设置块 finish -->
                <div id="privacy_set" class="hide_box"><!-- 一隐私设置块 begin -->
                    <h4>隐私设置</h4>
                        <ul>
                            <li>
                                <p>何种方式找到我<br>
                                    <span><label><input type="radio" name='receive_news' checked="true">电子邮件</label></span>
                                    <span><label><input type="radio" name="receive_news">手机号码</label></span>
                                </p>
                            </li>
                            <li>
                                <p>是否推荐通讯录好友<br>
                                    <span><label><input type="radio" name='praise' checked="true">是</label></span>
                                    <span><label><input type="radio" name="praise">否</label></span>
                                </p>
                            </li>
                            <li>
                                <p>是否隐藏我的个人动态<br>
                                    <span><label><input type="radio" name='privacy_new' checked="true">是</label></span>
                                    <span><label><input type="radio" name="privacy_new">否</label></span>
                                </p>
                            </li>
                        </ul>
                        <input type="submit" value="保存" id="preserve">
                </div><!-- 一隐私设置块 finish -->
                <div id="accounts_security" class="hide_box"><!-- 账号安全设置块 begin -->
                    <h4>账号安全</h4>
                        <ul>
                            <li>
                                <span><b>登录账号</b></span>
                                <span class="gray_color">12345678</span>
                                <span class="green_pointer">&nbsp;</span>
                            </li>
                            <li>
                                <span><b>手机号码</b></span>
                                <span class="gray_color">未绑定</span>
                                <span class="green_pointer">绑定</span>
                            </li>
                            <li>
                                <span><b>邮箱地址</b></span>
                                <span class="gray_color">~~~~.@163.com</span>
                                <span class="green_pointer">修改</span>
                            </li>
                            <li>
                                <span><b>绑定QQ</b></span>
                                <span class="gray_color">未绑定</span>
                                <span class="green_pointer">绑定</span>
                            </li>
                            <li>
                                <span><b>绑定微信</b></span>
                                <span class="gray_color">未绑定</span>
                                <span class="green_pointer">绑定</span>
                            </li>
                        </ul>
                        <input type="submit" value="保存" id="preserve">
                </div><!-- 账号安全设置块 finish -->
                <div id="password_modify" class="hide_box"><!-- 密码修改设置块 begin -->
                    <h4>密码修改</h4>
                        <ul>
                            <li>
                                <i id="remind_info">为了保证你的账号安全，请验证身份，验证成功后进行协议女友操作</i>
                            </li>
                            <li>
                                <select name="" id="" style="width: 300px ;height: 40px;">
                                    <option value="">使用邮箱~~~.com验证</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </li>
                            <li>
                                <input type="text" style="width: 200px ;height: 40px;" placeholder="请输入6位数验证码">
                                <span id="verify">发送验证码</span>
                            </li>
                            <li>
                                <label><b>请输入旧密码</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 300px ;height: 30px;"></label>
                            </li>
                            <li>
                                <label><b>请输入新密码</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 300px ;height: 30px;"></label>
                            </li>
                            <li>
                                <label><b>请重复新密码</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 300px ;height: 30px;"></label>
                            </li>
                        </ul>
                        <input type="submit" value="保存" id="preserve">
                </div><!-- 密码修改设置块 finish -->
            </div>
        </form>
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
                <a href="/Daixu/achievement"><li>成就</li></a>
                <a href="/Daixu/set"><li class="this_li">设置</li></a>
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
</div><!-- 外层包裹层 finish -->

<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/Public/js/public.js" type="text/javascript"></script>
<script src='/Public/js/home.js' type="text/javascript"></script>
<script src='/Public/js/set.js' type="text/javascript"></script>
</body>
</html>