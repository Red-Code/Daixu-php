<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="" content="">
    <link href="/Public/img/logo.ico" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/classify.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/end_article.css">
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
        </div><!-- top_classify  finish--顶部分类块-->

        <ul id="ul_content">
            <a href="#"><!--点击在盒子即进入该盒子内容的详细页-->

                <li class="content_wrap_box"><!--包裹内容的盒子，同时也为了实现鼠标悬停在上面实现样式的改变-->
                    <div class="content_info"><!--装详细内容的盒子-->
                        <img src="/Public/img/head1.jpg" alt="">
                        <h3>这是标题</h3>
                        <span>用户名 <img src="/Public/img/add.jpg" alt=""></span>
                        <span>文章类型</span>
                        <span>创作方式</span>
                        <span>完结</span>
                        <p id="content_description">dsfsdfsdfsdfsd

                            上海人民炒房玩疯了，假离婚套
                            马继华
                            锐意进取的苹果，移动计算的瓶
                            刘兴亮
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007

                        </p>
                    </div>
                </li>
            </a>
            <a href="#">

                <li class="content_wrap_box">
                    <div class="content_info">
                        <img src="/Public/img/head1.jpg" alt="">
                        <h3>这是标题</h3>
                        <span>用户名 <img src="/Public/img/add.jpg" alt=""></span>
                        <span>文章类型</span>
                        <span>创作方式</span>
                        <span>完结</span>
                        <p id="content_description">dsfsdfsdfsdfsd

                            上海人民炒房玩疯了，假离婚套
                            马继华
                            锐意进取的苹果，移动计算的瓶
                            刘兴亮
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007

                        </p>
                    </div>
                </li>
            </a>
            <a href="#">

                <li class="content_wrap_box">
                    <div class="content_info">
                        <img src="/Public/img/head1.jpg" alt="">
                        <h3>这是标题</h3>
                        <span>用户名 <img src="/Public/img/add.jpg" alt=""></span>
                        <span>文章类型</span>
                        <span>创作方式</span>
                        <span>完结</span>
                        <p id="content_description">dsfsdfsdfsdfsd

                            上海人民炒房玩疯了，假离婚套
                            马继华
                            锐意进取的苹果，移动计算的瓶
                            刘兴亮
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007

                        </p>
                    </div>
                </li>
            </a>
            <a href="#">

                <li class="content_wrap_box">
                    <div class="content_info">
                        <img src="/Public/img/head1.jpg" alt="">
                        <h3>这是标题</h3>
                        <span>用户名 <img src="/Public/img/add.jpg" alt=""></span>
                        <span>文章类型</span>
                        <span>创作方式</span>
                        <span>完结</span>
                        <p id="content_description">dsfsdfsdfsdfsd

                            上海人民炒房玩疯了，假离婚套
                            马继华
                            锐意进取的苹果，移动计算的瓶
                            刘兴亮
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007

                        </p>
                    </div>
                </li>
            </a>
            <a href="#">

                <li class="content_wrap_box">
                    <div class="content_info">
                        <img src="/Public/img/head1.jpg" alt="">
                        <h3>这是标题</h3>
                        <span>用户名 <img src="/Public/img/add.jpg" alt=""></span>
                        <span>文章类型</span>
                        <span>创作方式</span>
                        <span>完结</span>
                        <p id="content_description">dsfsdfsdfsdfsd

                            上海人民炒房玩疯了，假离婚套
                            马继华
                            锐意进取的苹果，移动计算的瓶
                            刘兴亮
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007
                            新美大与糯米合并？决定权或在
                            Alter
                            专车新政出台，最大获益者居然
                            首席发言者
                            网约车回归中高端市场并不现实
                            柏铭007

                        </p>
                    </div>
                </li>
            </a>
        </ul>

    </div><!-- content_left  finish--最左边内容-->

    <div class="content_right"><!-- content_right  begin--最右边内容-->

        <!-- 用户登录后展示-->
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
<script src="/Public/js/classify.js" type="text/javascript"></script>
<script src='/Public/js/homepage.js' type="text/javascript"></script>
<script type="text/javascript">
    //当鼠标悬停在该盒子上时改变样式
    var ul_content = document.getElementById('ul_content');
    //var a_content = ul_content.getElementsByTagName('a');
    var  li_content = ul_content.getElementsByTagName('li');
    for(var i=0,len = li_content.length;i<len;i++){
        li_content[i].onmouseover = function () {
            this.style.boxShadow = '2px 1px 5px 0px green';
        }
        li_content[i].onmouseout = function () {
            this.style.boxShadow = '2px 1px 5px 0px gray';
        }
    }

    //这是获取数据用的，不能单独放到js文件中
    var static_article_classify = '<?php echo ($article_classify); ?>';//分类
    var static_article_mode = '<?php echo ($article_mode); ?>';//模式
    var static_article_order = '<?php echo ($article_order); ?>';//排序
</script>
</body>
</html>