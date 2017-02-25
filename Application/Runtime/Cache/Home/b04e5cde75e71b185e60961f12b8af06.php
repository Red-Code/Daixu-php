<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>demo</title>
</head>
<body>
<?php if(is_array($name)): $i = 0; $__LIST__ = $name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i; echo ($data["adv_id"]); ?>^^^<?php echo ($data["adv_img"]); ?>^^^<?php echo ($data["adv_url"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
<form action="/Work/demo_send" method="post" enctype="multipart/form-data"  onsubmit="return login_check()">
    <input type="file" name="adv_img">
    <textarea id="article" name="article">
    </textarea>
    <button type="submit">hehe</button>
</form>
<script src="/Public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function login_check(){
        var htmlvalue2 = document.getElementById('article').innerText.toString();

        alert(htmlvalue2);
    }
</script>
</body>
</html>