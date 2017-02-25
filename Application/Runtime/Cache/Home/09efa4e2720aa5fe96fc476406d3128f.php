<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/publish.css">
    <title>待叙-发布页-</title>

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

<div id="top_type"><!-- 顶部类别 begin -->
    <ul>
        <li><a id="button_rap" href="#">抢接续写</a></li>
        <li><a id="button_own" href="#">个人创作</a></li>
        <li><a id="button_free" href="#">自由续写</a></li>
    </ul>
</div><!-- 顶部类别 finish -->


<div class="center_wrap"><!-- 中间包裹层 begin -->

    <!--抢接续写-->
    <form action="/Add/add_article" method="post" enctype="multipart/form-data" onsubmit="return rap_check()">
        <input name="article_mode" value="2" hidden>
    <div class="inner_wrap" id="inner_wrap1"><!-- 内部包裹层 begin -->
        <span id="tips">抢接续写模式下是通过抢接按钮来续写故事</span>
        <span id="title_name">标题</span>
        <input type="text" class="title_content_input" name="article_name" placeholder="请输入标题" id="rap_title_content">
        <span id="rule_name">续写规则</span>
        <textarea name="article_rule" class="rule_content" placeholder="在这里输入规则吧！" id="rap_rule_content"></textarea>
        <!--<a href="#"><img src="/Public/img/coverImg.jpg" alt="coverImg" id="cover_img" /><br></a>插入封面图片-->
        <div class="up_surface">
            <span>插入封面图片：</span>
            <input type="file" accept="image/*" name="img_surface">
        </div>
        <div class="face_box">
            <span>开头正文</span>
        </div>
        <textarea name="article_content" class="rule_content" placeholder="在这里输入正文！" id="rap_start_content"></textarea>
        <div class="bottom_type"><!-- 底部分类 begin -->
            <span>分类：</span>
            <ul>
                <!--<li><a href="#" class="this_page">全部续写</a></li>-->
                <!--<li><a href="#">悬疑恐怖</a></li>-->
                <!--<li><a href="#">都市言情</a></li>-->
                <!--<li><a href="#">仙侠玄幻</a></li>-->
                <!--<li><a href="#">武侠古风</a></li>-->
                <!--<li><a href="#">其他续写</a></li>-->
                <li><span>悬疑恐怖</span><input type="radio" checked="checked" name="article_classify" value="1" /></li>
                <li><span>都市言情</span><input type="radio" checked="checked" name="article_classify" value="2" /></li>
                <li><span>仙侠玄幻</span><input type="radio" checked="checked" name="article_classify" value="3" /></li>
                <li><span>武侠古风</span><input type="radio" checked="checked" name="article_classify" value="4" /></li>
                <li><span>其他续写</span><input type="radio" checked="checked" name="article_classify" value="5" /></li>
            </ul>
        </div><!-- 底部分类 finish -->
        <div class="function_box"><!-- 底部功能块 begin -->
            <div id="get_rap_draft"></div>
            <!--<span><a id="button_rap_get_draft" href="#">引入草稿</a></span>-->
            <span><a href="#" id="rap_save_draft">保存到草稿</a></span>
            <!--<span><a href="#" id="publish_article">发布文章</a></span>-->
            <button type="submit" id="publish_article" >发布文章</button>
        </div><!-- 底部功能块 finish -->
    </div><!-- 内部包裹层 finish -->
    </form>

    <!-- 个人创作-->
    <form action="/Add/add_article" method="post" enctype="multipart/form-data" onsubmit="return one_check()">
        <input name="article_mode" value="1" hidden>
    <div class="inner_wrap" id="inner_wrap2"><!-- 内部包裹层 begin -->
        <span id="tips">个人创作模式下故事需独立完成，不能被他人续写</span>
        <span id="title_name">标题</span>
        <input type="text" class="title_content_input" name="article_name" placeholder="请输入标题" id="one_title_content">
        <span id="rule_name">文章简介</span>
        <textarea name="article_rule" class="rule_content" placeholder="在这里输入规则吧！" id="one_rule_content"></textarea>
        <!--<a href="#"><img src="/Public/img/coverImg.jpg" alt="coverImg" id="cover_img" /><br></a>插入封面图片-->
        <div class="up_surface">
            <span>插入封面图片：</span>
            <input type="file" accept="image/*" name="img_surface">
        </div>
        <div class="face_box">
            <span>开头正文</span>
        </div>
        <textarea name="article_content" class="rule_content" placeholder="在这里输入正文！" id="one_start_content"></textarea>
        <div class="bottom_type"><!-- 底部分类 begin -->
            <span>分类：</span>
            <ul>
                <!--<li><a href="#" class="this_page">全部续写</a></li>-->
                <!--<li><a href="#">悬疑恐怖</a></li>-->
                <!--<li><a href="#">都市言情</a></li>-->
                <!--<li><a href="#">仙侠玄幻</a></li>-->
                <!--<li><a href="#">武侠古风</a></li>-->
                <!--<li><a href="#">其他续写</a></li>-->
                <li><span>悬疑恐怖</span><input type="radio" checked="checked" name="article_classify" value="1" /></li>
                <li><span>都市言情</span><input type="radio" checked="checked" name="article_classify" value="2" /></li>
                <li><span>仙侠玄幻</span><input type="radio" checked="checked" name="article_classify" value="3" /></li>
                <li><span>武侠古风</span><input type="radio" checked="checked" name="article_classify" value="4" /></li>
                <li><span>其他续写</span><input type="radio" checked="checked" name="article_classify" value="5" /></li>
            </ul>
        </div><!-- 底部分类 finish -->
        <div class="function_box"><!-- 底部功能块 begin -->
            <div id="get_own_draft"></div>
            <!--<span><a id="button_own_get_draft" href="#">引入草稿</a></span>-->
            <span><a href="#" id="own_save_draft">保存到草稿</a></span>
            <!--<span><a href="#" id="publish_article">发布文章</a></span>-->
            <button type="submit" id="publish_article" >发布文章</button>
        </div><!-- 底部功能块 finish -->
    </div><!-- 内部包裹层 finish -->
    </form>

    <!-- 自由续写-->
    <form action="/Add/add_article" method="post" enctype="multipart/form-data" onsubmit="return free_check()">
        <input name="article_mode" value="3" hidden>
        <div class="inner_wrap" id="inner_wrap3"><!-- 内部包裹层 begin -->
            <span id="tips">自由续写模式下是通过抢接按钮来续写故事</span>
            <span id="title_name">标题</span>
            <input type="text" class="title_content_input" name="article_name" placeholder="请输入标题" id="free_title_content">
            <!--<a href="#"><img src="/Public/img/coverImg.jpg" alt="coverImg" id="cover_img" /><br></a>插入封面图片-->
            <div class="up_surface">
                <span>插入封面图片：</span>
                <input type="file" accept="image/*" name="img_surface">
            </div>
            <div class="face_box">
                <span>开头正文</span>
            </div>
            <textarea name="article_content" class="rule_content" placeholder="在这里输入正文！" id="free_start_content"></textarea>
            <div class="bottom_type"><!-- 底部分类 begin -->
                <span>分类：</span>
                <ul>
                    <!--<li><a href="#" class="this_page">全部续写</a></li>-->
                    <!--<li><a href="#">悬疑恐怖</a></li>-->
                    <!--<li><a href="#">都市言情</a></li>-->
                    <!--<li><a href="#">仙侠玄幻</a></li>-->
                    <!--<li><a href="#">武侠古风</a></li>-->
                    <!--<li><a href="#">其他续写</a></li>-->
                    <li><span>悬疑恐怖</span><input type="radio" checked="checked" name="article_classify" value="1" /></li>
                    <li><span>都市言情</span><input type="radio" checked="checked" name="article_classify" value="2" /></li>
                    <li><span>仙侠玄幻</span><input type="radio" checked="checked" name="article_classify" value="3" /></li>
                    <li><span>武侠古风</span><input type="radio" checked="checked" name="article_classify" value="4" /></li>
                    <li><span>其他续写</span><input type="radio" checked="checked" name="article_classify" value="5" /></li>
                </ul>
            </div><!-- 底部分类 finish -->
            <div class="function_box"><!-- 底部功能块 begin -->
                <div id="get_free_draft"></div>
                <!--<span><a id="button_free_get_draft" href="#">引入草稿</a></span>-->
                <span><a href="#" id="free_save_draft">保存到草稿</a></span>
                <!--<span><a href="#" id="publish_article">发布文章</a></span>-->
                <button type="submit" id="publish_article" >发布文章</button>
            </div><!-- 底部功能块 finish -->
        </div><!-- 内部包裹层 finish -->
    </form>

</div><!-- 中间包裹层 finish -->


<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/Public/js/public.js" type="text/javascript"></script>
<script src="/Public/js/publish.js" type="text/javascript"></script>
<script charset="utf-8" src="/Public/editor/kindeditor.js"></script>
<script charset="utf-8" src="/Public/editor/lang/zh-CN.js"></script>
<script type="text/javascript">
    //KindEditor脚本
    var editor;

    //抢接续写规则
    KindEditor.ready(function(K) {
        rap_rule_editor = K.create('#rap_rule_content', {
            items : ['undo','redo','cut','copy','paste','selectall','justifyleft','justifycenter','justifyright','fontname','fontsize','forecolor','bold','emoticons'],
        });
    });

    //抢接续写正文
    KindEditor.ready(function(K) {
        rap_start_editor = K.create('#rap_start_content', {
            items : ['undo','redo','cut','copy','paste','selectall','justifyleft','justifycenter','justifyright','fontname','fontsize','forecolor','bold','image','emoticons'],
        });
    });

    //个人创作简介
    KindEditor.ready(function(K) {
        one_rule_editor = K.create('#one_rule_content', {
            items : ['undo','redo','cut','copy','paste','selectall','justifyleft','justifycenter','justifyright','fontname','fontsize','forecolor','bold','emoticons'],
        });
    });

    //个人创作正文
    KindEditor.ready(function(K) {
        one_start_editor = K.create('#one_start_content', {
            items : ['undo','redo','cut','copy','paste','selectall','justifyleft','justifycenter','justifyright','fontname','fontsize','forecolor','bold','image','emoticons'],
        });
    });

    //自由续写正文
    KindEditor.ready(function(K) {
        free_start_editor = K.create('#free_start_content', {
            items : ['undo','redo','cut','copy','paste','selectall','justifyleft','justifycenter','justifyright','fontname','fontsize','forecolor','bold','image','emoticons'],
        });
    });

    //用ajax获取草稿数据
    $(document).ready(function(){
        $("#button_rap_get_draft").click(function(){
            $.get("/Ajax/ajax_draft_list?draft_type=2",function(result){
                $("#get_rap_draft").html(result);
            });
        });
    });
    $(document).ready(function(){
        $("#button_own_get_draft").click(function(){
            $.get("/Ajax/ajax_draft_list?draft_type=2",function(result){
                $("#get_own_draft").html(result);
            });
        });
    });
    $(document).ready(function(){
        $("#button_free_get_draft").click(function(){
            $.get("/Ajax/ajax_draft_list?draft_type=2",function(result){
                $("#get_free_draft").html(result);
            });
        });
    });

    //点击保存草稿按钮，进行草稿保存
    $("#rap_save_draft").click(function(){
        rap_start_editor.sync();
        // 取得要提交的参数
        var draft_content = $('#rap_start_content').val();
        var draft_type = '2';
        // 取得要提交页面的URL
        var action = '/Add/add_draft';
        // 创建Form
        var form = $('<form></form>');
        // 设置属性
        form.attr('action', action);
        form.attr('method', 'post');
        // form的target属性决定form在哪个页面提交
        // _self -> 当前页面 _blank -> 新页面
        form.attr('target', '_blank');
        // 创建Input
        var input_draft_content = $('<input type="text" name="draft_content" />');
        var input_draft_type = $('<input type="text" name="draft_type" />');

        input_draft_content.attr('value', draft_content);
        input_draft_type.attr('value', draft_type);
        // 附加到Form
        form.append(input_draft_content);
        form.append(input_draft_type);
        // 提交表单
        form.submit();
        // 注意return false取消链接的默认动作
        return false;
    });
    $("#own_save_draft").click(function(){
        own_start_editor.sync();
        // 取得要提交的参数
        var draft_content = $('#own_start_content').val();
        var draft_type = '2';
        // 取得要提交页面的URL
        var action = '/Add/add_draft';
        // 创建Form
        var form = $('<form></form>');
        // 设置属性
        form.attr('action', action);
        form.attr('method', 'post');
        // form的target属性决定form在哪个页面提交
        // _self -> 当前页面 _blank -> 新页面
        form.attr('target', '_blank');
        // 创建Input
        var input_draft_content = $('<input type="text" name="draft_content" />');
        var input_draft_type = $('<input type="text" name="draft_type" />');

        input_draft_content.attr('value', draft_content);
        input_draft_type.attr('value', draft_type);
        // 附加到Form
        form.append(input_draft_content);
        form.append(input_draft_type);
        // 提交表单
        form.submit();
        // 注意return false取消链接的默认动作
        return false;
    });
    $("#free_save_draft").click(function(){
        free_start_editor.sync();
        // 取得要提交的参数
        var draft_content = $('#free_start_content').val();
        var draft_type = '2';
        // 取得要提交页面的URL
        var action = '/Add/add_draft';
        // 创建Form
        var form = $('<form></form>');
        // 设置属性
        form.attr('action', action);
        form.attr('method', 'post');
        // form的target属性决定form在哪个页面提交
        // _self -> 当前页面 _blank -> 新页面
        form.attr('target', '_blank');
        // 创建Input
        var input_draft_content = $('<input type="text" name="draft_content" />');
        var input_draft_type = $('<input type="text" name="draft_type" />');

        input_draft_content.attr('value', draft_content);
        input_draft_type.attr('value', draft_type);
        // 附加到Form
        form.append(input_draft_content);
        form.append(input_draft_type);
        // 提交表单
        form.submit();
        // 注意return false取消链接的默认动作
        return false;
    });
</script>
</body>
</html>