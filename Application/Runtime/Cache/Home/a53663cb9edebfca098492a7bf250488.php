<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/classify.css">
    <title>待续-分类</title>

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

<!--主体begin-->
<div class="wrap"><!-- wrap--begin 最外层包裹层-->
    <div class="content_left"><!-- content_left  begin--最左边内容-->
        <div class="top_classify"><!-- top_classify  begin--顶部分类块-->
            <table class="top_classify_table">
                <tr>
                    <td width="40px"><h2>分类：</h2></td>
                    <td>
                        <ul id="first_row">
                            <a href="/Daixu/classify?article_mode=<?php echo ($article_mode); ?>&&article_order=<?php echo ($article_order); ?>"><li id="classify_classify_all">全部续写</li></a>
                            <a href="/Daixu/classify?article_classify=1&&article_mode=<?php echo ($article_mode); ?>&&article_order=<?php echo ($article_order); ?>"><li id="classify_classify_fear">悬疑恐怖</li></a>
                            <a href="/Daixu/classify?article_classify=2&&article_mode=<?php echo ($article_mode); ?>&&article_order=<?php echo ($article_order); ?>"><li id="classify_classify_modern">都市言情</li></a>
                            <a href="/Daixu/classify?article_classify=3&&article_mode=<?php echo ($article_mode); ?>&&article_order=<?php echo ($article_order); ?>"><li id="classify_classify_fantasy">仙侠玄幻</li></a>
                            <a href="/Daixu/classify?article_classify=4&&article_mode=<?php echo ($article_mode); ?>&&article_order=<?php echo ($article_order); ?>"><li id="classify_classify_history">武侠古风</li></a>
                            <a href="/Daixu/classify?article_classify=5&&article_mode=<?php echo ($article_mode); ?>&&article_order=<?php echo ($article_order); ?>"><li id="classify_classify_other">其他续写</li></a>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td width="40px"><h2>模式：</h2></td>
                    <td>
                        <ul id="second_row">
                            <a href="/Daixu/classify?article_classify=<?php echo ($article_classify); ?>&&article_order=<?php echo ($article_order); ?>"><li id="classify_mode_all">全部</li></a>
                            <a href="/Daixu/classify?article_classify=<?php echo ($article_classify); ?>&&article_mode=4&&article_order=<?php echo ($article_order); ?>"><li id="classify_mode_fine">精品</li></a>
                            <a href="/Daixu/classify?article_classify=<?php echo ($article_classify); ?>&&article_mode=1&&article_order=<?php echo ($article_order); ?>"><li id="classify_mode_one">个人创作</li></a>
                            <a href="/Daixu/classify?article_classify=<?php echo ($article_classify); ?>&&article_mode=2&&article_order=<?php echo ($article_order); ?>"><li id="classify_mode_rap">抢接续写</li></a>
                            <a href="/Daixu/classify?article_classify=<?php echo ($article_classify); ?>&&article_mode=3&&article_order=<?php echo ($article_order); ?>"><li id="classify_mode_free">自由续写</li></a>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td width="40px"><h2>排序：</h2></td>
                    <td>
                        <ul id="third_row">
                            <a href="/Daixu/classify?article_classify=<?php echo ($article_classify); ?>&&article_mode=<?php echo ($article_mode); ?>&&article_order=1"><li id="classify_order_new">最新</li></a>
                            <a href="/Daixu/classify?article_classify=<?php echo ($article_classify); ?>&&article_mode=<?php echo ($article_mode); ?>&&article_order=2"><li id="classify_order_total">最热</li></a>
                        </ul>
                    </td>
                </tr>
            </table>
        </div><!-- top_classify  finish--22顶部分类块-->

        <?php if(is_array($select_article_list)): $i = 0; $__LIST__ = $select_article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select_article_list): $mod = ($i % 2 );++$i;?><div class="publish_content"><!-- publish_content  begin--读者发布内容块-->
            <div class="publish_content_top">
                <img src="<?php echo ($select_article_list["user_img"]); ?>"><h3><a href="/Daixu/personal?user_id=<?php echo ($select_article_list["user_id"]); ?>"><?php echo ($select_article_list["user_name"]); ?></h3>
                <img src="/Public/img/add.jpg" class="add">
            </div>
            <div class="publish_content_center">
                <!--<img src="<?php echo ($select_article_list["article_surface"]); ?>" class='publish_content_center_img'>

                <a href="/Daixu/article?article_id=<?php echo ($select_article_list["article_id"]); ?>"><h1><?php echo ($select_article_list["article_name"]); ?></h1></a>
                <p>
                    <?php echo ($select_article_list["article_content"]); ?>
                </p>-->
                <img src="<?php echo ($select_article_list["article_surface"]); ?>" class='publish_content_center_img'>
                <a href="/Daixu/article?article_id=<?php echo ($select_article_list["article_id"]); ?>"><h1><?php echo ($select_article_list["article_name"]); ?></h1></a>
                <div class="article_description">
                    <?php echo ($select_article_list["article_content"]); ?>
                </div>
            </div>
            <div class="publish_content_bottom"><!-- 发布内容底部  begin -->
                <div class="publish_content_bottom_left">
                    <img src="/Public/img/classify_icon.jpg" class="classify_icon">
                    <span><?php echo ($select_article_list["article_classify"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="gray_color"><?php echo ($select_article_list["article_update"]); ?></span>
                </div>
                <div class="publish_content_bottom_right">
                    <span class="gray_color" id="">赞（<i id=""><?php echo ($select_article_list["article_praise"]); ?></i>）</span><span class="gray_color" id="">回复数（<i id=""><?php echo ($select_article_list["article_total"]); ?></i>）</span>
                </div>
            </div><!-- 发布内容底部  finish -->
        </div><!-- publish_content  finish--读者发布内容块--><?php endforeach; endif; else: echo "" ;endif; ?>

    </div><!-- content_left  finish--最左边内容-->

    <div class="content_right"><!-- content_right  begin--最右边内容-->
        <div class="advertise"><!-- 右侧广告 -->
            <img src="/Public/img/test11.png">
        </div>
        <div class="comment_article"><!-- 推荐文章 begin-->
            <div class="comment_article_title">
                <h2>推荐文章</h2>
            </div>
            <div class="comment_article_list"><!-- 推荐文章列表 begin -->
                <ol>
                    <?php if(is_array($article_today_select)): $i = 0; $__LIST__ = $article_today_select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article_today_select): $mod = ($i % 2 );++$i;?><li><a href="/Daixu/article?article_id=<?php echo ($article_today_select["tarticle_article"]); ?>"><?php echo ($article_today_select["tarticle_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ol>
            </div><!-- 推荐文章列表 finish -->
        </div><!-- 推荐文章 finish-->
        <div class="advertise2"><!-- 右侧广告 -->
            <img src="/Public/img/advertise2.jpg">
        </div>
    </div><!-- content_right  finish--最右边内容-->
</div>
    <!--主体finish-->
<div>
    <?php echo ($obj_page); ?>
</div>
<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script type="text/javascript" language="JavaScript">
    //这是获取数据用的，不能单独放到js文件中
    var static_article_classify = '<?php echo ($article_classify); ?>';//分类
    var static_article_mode = '<?php echo ($article_mode); ?>';//模式
    var static_article_order = '<?php echo ($article_order); ?>';//排序
</script>
<script src="/Public/js/public.js" type="text/javascript"></script>
<script src="/Public/js/classify.js" type="text/javascript"></script>
</body>
</html>