<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        .draft-box{
            padding:30px;
        }
        .draft-num{
            width: 30px;
            height:30px;
            background: #51a47a;
            border-radius: 50%;
            color: #fff;
            text-align: center;
            line-height: 30px;
            margin-left: -20px;
        }
        .draft-content{

            box-shadow: -1px 2px 5px 1px #51a47a;
            padding:20px;
        }
        .draft-content>h3,.draft-content>h5{
            color: #B8B8B8;
        }
        .draft-content>span{
            font-style: italic;
            color: #878787;
        }
        .use-draft{
            margin-left: 85%;
            text-decoration: none;
            color: #000;
            border:1px solid #51a47a;
            font-size:12px;
            border-radius: 10px;
            padding:5px;
        }
        .use-draft:hover{
            color: #fff;
            background: #51a47a;
        }
    </style>
</head>
<body>
<?php if(is_array($ajax_draft)): $i = 0; $__LIST__ = $ajax_draft;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ajax_draft): $mod = ($i % 2 );++$i;?><div class="draft-box">
        <p class="draft-num"><?php echo ($i); ?></p>
        <div class="draft-content">
            <h3>草稿内容：</h3>
            <span><?php echo ($ajax_draft["draft_content"]); ?></span>
            <h5>草稿发布时间：<?php echo ($ajax_draft["draft_time"]); ?></h5>
            <a class="use-draft" href="/Daixu/article?article_id=<?php echo ($article_id); ?>&&draft_content=<?php echo ($ajax_draft["draft_content"]); ?>">使用该草稿</a>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php echo ($ajax_draft_page); ?>
</body>
</html>