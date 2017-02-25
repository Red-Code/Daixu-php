<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/attention.css">
    <title>个人中心-<?php echo ($user_info["user_name"]); ?></title>
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
        <a href="/Daixu/notice" id="notice_news_num"><?php echo ($notice_news_num); ?></a>
        <div id="title_personal">
            <img src="/Public/img/title_person.png">
            <a href="/Daixu/personal?user_id=<?php echo ($login_info["user_id"]); ?>"><?php echo ($login_info["user_name"]); ?></a>
            <a class="title_register" href="/Action/del_login">退出</a>
        </div>
    </div>
</div>

<div class="wrap"><!-- 外层包裹层 begin -->
    <div class="top_person_info"><!-- 顶部个人信息 begin -->
        <img src="/Public/img/head_img2.jpg" id="head_img">
        <span class="person_some_info"><b>用户名</b><i>等级</i><i class="vip_icon"></i></span>
        <p>简介： </p>
    </div><!-- 顶部个人信息 finish -->
    <div class="content_left">
          <div class="all_attention">
              全部关注：<b>5</b>
          </div>
          <div id="have_attent"><!--全部关注信息 begin-->
              <ul>
                  <li>
                       <div class="attent_person_info"><!--关注人信息块 begin -->
                           <img src="/Public/img/head_img2.jpg" alt="">
                           <span class="more_person_info"><b>用户名用户名用户名</b>  &nbsp;&nbsp;等级&nbsp;&nbsp;<i class="person_vip_icon"></i></span>
                           <p><i class="attent_symbol"></i>&nbsp;&nbsp;已关注</p>
                           <p class="attent_person_description">这就是简介！！！！这就是简介！！！！这就是简介！！！！</p>
                       </div><!--关注人信息块 end -->
                       <span class="set_button">
                          设置备注
                       </span>
                       <span class="set_button cancel_attent">
                          取消关注
                       </span>
                  </li>
                  <li>
                      <div class="attent_person_info"><!--关注人信息块 begin -->
                          <img src="/Public/img/head_img2.jpg" alt="">
                          <span class="more_person_info"><b>用户名用户名用户名</b>  &nbsp;&nbsp;等级&nbsp;&nbsp;<i class="person_vip_icon"></i></span>
                          <p><i class="attent_symbol"></i>&nbsp;&nbsp;已关注</p>
                          <p class="attent_person_description">这就是简介！！！！这就是简介！！！！这就是简介！！！！</p>
                      </div><!--关注人信息块 end -->
                       <span class="set_button">
                          设置备注
                       </span>
                       <span class="set_button cancel_attent">
                          取消关注
                       </span>
                  </li>
                  <li>
                      <div class="attent_person_info"><!--关注人信息块 begin -->
                          <img src="/Public/img/head_img2.jpg" alt="">
                          <span class="more_person_info"><b>用户名用户名用户名</b>  &nbsp;&nbsp;等级&nbsp;&nbsp;<i class="person_vip_icon"></i></span>
                          <p><i class="attent_symbol"></i>&nbsp;&nbsp;已关注</p>
                          <p class="attent_person_description">这就是简介！！！！这就是简介！！！！这就是简介！！！！</p>
                      </div><!--关注人信息块 end -->
                       <span class="set_button">
                          设置备注
                       </span>
                       <span class="set_button cancel_attent">
                          取消关注
                       </span>
                  </li>
                  <li></li>
              </ul>
          </div><!--全部关注信息 end-->
    </div>
    <div class="content_right"><!--最右边内容 begin-->
        <div class="content_right_top"><!-- content_right_top  begin--最右边内容顶部-->
            <span><a href='#'><b>11</b><br />参与</a></span>
            <span><a href='#'><b>11</b><br />关注</a></span>
            <span><a href='#'><b>11</b><br />粉丝</a></span>
        </div><!-- content_right_top  finish--最右边内容顶部-->
        <div class="content_right_list" id="content_right_list"><!-- content_right_list  begin--最右边列表内容-->
            <ul>
                <a href="/Daixu/personal?user_id=<?php echo ($user_info["user_id"]); ?>"><li>主页</li></a>
                <a href="/Daixu/data"><li>资料</li></a>
                <a href="/Daixu/draft"><li>草稿</li></a>
                <a href="/Daixu/collection"><li>收藏</li></a>
                <a href="/Daixu/achievement"><li>成就</li></a>
                <a href="/Daixu/set"><li>设置</li></a>
                <a href="/Daixu/notice"><li>消息</li></a>
            </ul>
        </div><!-- content_right_list  finish--最右边列表内容-->
    </div><!--最右边内容 end-->


</div><!-- 外层包裹层 end -->
</body>
</html>