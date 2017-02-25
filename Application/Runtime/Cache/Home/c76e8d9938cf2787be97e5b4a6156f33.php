<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/css/draft_edit.css">
    <title>编辑草稿</title>
</head>
<body>
<form action="/Action/updata_draft" method="post" onsubmit="return check_change_draft()">
    <input value="<?php echo ($draft_id); ?>" name="draft_id" hidden>
    <textarea id="editor_draft" name="draft_content"><?php echo ($draft_content); ?></textarea>
    <button type="submit">保存修改</button>
</form>
<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/js/draft_edit.js" type="text/javascript"></script>
<script charset="utf-8" src="/Public/editor/kindeditor.js"></script>
<script charset="utf-8" src="/Public/editor/lang/zh-CN.js"></script>
<script>
    //KindEditor脚本
    KindEditor.ready(function(K) {
        editor_draft = K.create('#editor_draft', {
            items : ['undo','redo','cut','copy','paste','selectall','justifyleft','justifycenter','justifyright','fontname','fontsize','forecolor','bold','image','emoticons'],
        });

    });
</script>
</body>
</html>