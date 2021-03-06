<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/view_login.css">
    <style>
        body{
            background: url(/Public/img/body_bg2.jpg);
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="register-box"><!-- 注册盒子 begin -->

    <form action="/Action/login" method="post" class="form-horizontal" id="login_from">
        <div class="login_header">
            <p>登录待叙<a href="/Daixu/view_register">注册</a></p>
        </div>
        <div class="form-group reduce_margin" id="acount_box">
            <div class="col-md-8 col-md-offset-2">
                <input type="text" class="form-control" id="user_acount" name="user_account" placeholder="请输入您的用户账号">
            </div>
        </div>
        <div class="form-group" id="pwd_box">
            <div class="col-md-8 col-md-offset-2">
                <input type="password" class="form-control" id="user_password" name="user_password" placeholder="请输入您的用户密码">
            </div>
        </div>
        <div class="forget_secret">
            <a href="">忘记密码？</a>
        </div>


        <input type="submit" class="my_submit" value="登录">
    </form>
    <div class="all_icon">
        <span><img src="/Public/img/all_icons.png" alt="" class="qq_icon"></span>
        <span><img src="/Public/img/all_icons.png" alt="" class="weixin_icon"></span>
        <span><img src="/Public/img/all_icons.png" alt="" class="weibo_icon"></span>
    </div>
</div><!-- 注册盒子 finish -->
<script type="text/javascript" src="/Public/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/js/view_login.js"></script>

</body>
</html>