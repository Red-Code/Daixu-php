<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>demo</title>
</head>
<body>
<?php if(is_array($name)): $i = 0; $__LIST__ = $name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i; echo ($data["adv_id"]); ?>^^^<?php echo ($data["adv_img"]); ?>^^^<?php echo ($data["adv_url"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
<form action="/Spread/roll_add" method="post" enctype="multipart/form-data">
    <input type="file" name="advlogo">
    <button type="submit">hehe</button>
</form>
</body>
</html>