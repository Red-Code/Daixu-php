<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/specialty.css">
    <title>自由续写-</title>

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
        <?php if(is_array($login_user_name)): $i = 0; $__LIST__ = $login_user_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$login_user_name): $mod = ($i % 2 );++$i;?><div id="title_personal">
                <img src="/Public/img/title_person.png">
                <a href="/Daixu/personal"><?php echo ($login_user_name["user_name"]); ?></a>
                <a class="title_register" href="/User/del_login">退出</a>
                <!--<ul>-->
                <!--<li>-->
                <!--<img src="/Public/img/title_person.png">-->
                <!--<a href=""><?php echo ($login_user_info["user_name"]); ?></a>-->
                <!--<ul>-->
                <!--<li><img src="/Public/img/title_home.png"><a href="/Daixu/home">主页</a><hr>-->
                <!--</li>-->
                <!--<li><img src="/Public/img/title_notice.png"><a href="/Daixu/notice">消息</a><hr>-->
                <!--</li>-->
                <!--<li><img src="/Public/img/title_set.png"><a href="/Daixu/set">设置</a><hr>-->
                <!--</li>-->
                <!--<li><img src="/Public/img/title_exit.png"><a href="/User/del_login">退出</a></li>-->
                <!--</ul>-->
                <!--</li>-->
                <!--</ul>-->
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

<div class="top_type"><!-- 顶部类别 begin -->
    <ul>
        <li><a href="#" class="this_page">抢接续写</a></li>
        <li><a href="#">个人创作</a></li>
        <li><a href="#">自由续写</a></li>
    </ul>
</div><!-- 顶部类别 finish -->
<div class="center_wrap"><!-- 中间包裹层 begin -->
    <div class="inner_wrap"><!-- 内部包裹层 begin -->
        <span id="tips">抢接续写模式下是通过抢接按钮来续写故事</span>
        <span id="title_name">标题</span>
        <input type="text" id="title_content" placeholder="请输入标题">
        <a href="#"><img src="/Public/img/coverImg.jpg" alt="coverImg" id="cover_img" /><br></a>插入封面图片
        <div class="face_box">
            <img src="/Public/img/faceImg.jpg" alt="faceImg"><span>表情</span>
        </div>
        <textarea name="rule_content" id="rule_content" placeholder="在这里输入正文！"></textarea>
        <div class="bottom_type"><!-- 底部分类 begin -->
            <span>分类：</span>
            <ul>
                <li class="this_page"><a href="#">全部续写</a></li>
                <li><a href="#">悬疑恐怖</a></li>
                <li><a href="#">都市言情</a></li>
                <li><a href="#">仙侠玄幻</a></li>
                <li><a href="#">武侠古风</a></li>
                <li><a href="#">其他续写</a></li>
            </ul>
        </div><!-- 底部分类 finish -->
        <div class="function_box"><!-- 底部功能块 begin -->
            <span><a href="#">预览文章</a></span>
            <span><a href="#">保存到草稿</a></span>
            <span><a href="#" id="publish_article">发布文章</a></span>
        </div><!-- 底部功能块 finish -->
    </div><!-- 内部包裹层 finish -->
</div><!-- 中间包裹层 finish -->



<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/Public/js/public.js" type="text/javascript"></script>
</body>
</html>