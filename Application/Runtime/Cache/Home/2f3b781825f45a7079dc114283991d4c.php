<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/view_register.css">
    <style>
        body{
            background: url(/Public/img/body_bg2.jpg);
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="register-box"><!-- 注册盒子 begin -->

    <form action="/Add/register" method="post" class="form-horizontal" id="register_form">
        <div class="form-group" id="acount_box">
            <label for="user_account" class="col-md-3 control-label">账号</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="user_account" name="user_account" placeholder="英文和数字的组合，30个字符以内">
                <span class="help-block"  id="acount_hint_info"></span>
                <span id="acount_icon"></span>
            </div>
        </div>
        <div class="form-group" id="pwd_box">
            <label for="password" class="col-md-3 control-label">用户密码</label>
            <div class="col-md-8">
                <input type="password" class="form-control" id="password" name="user_password" placeholder="英文和数字的组合，15个字符以内">
                <span class="help-block" id="pwd_hint_info"></span>
                <span id="pwd_icon"></span>
            </div>
        </div>
        <!--<div class="form-group" id="pwda_box">-->
            <!--<label for="password_again" class="col-md-3 control-label">密码确认</label>-->
            <!--<div class="col-md-8">-->
                <!--<input type="text" class="form-control" id="password_again" name="password_again" placeholder="请再次输入您的密码" disabled="">-->
                <!--<span class="help-block" id="pwda_hint_info"></span>-->
                <!--<span id="pwda_icon"></span>-->
            <!--</div>-->
        <!--</div>-->
        <div class="form-group" id="user_box">
            <label for="username" class="col-md-3 control-label">昵称</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="username" name="user_name" placeholder="8-25个字符,数字,字母,下划线，汉字组合">
                <span class="help-block"  id="user_hint_info"></span>
                <span id="user_icon"></span>
            </div>
        </div>
        <div class="agreement">
            <input type="checkbox" id="agree_protocol">我同意<a href="">《用户服务协议》</a>
        </div>


        <input type="submit" class="my_submit" value="注册">
    </form>
    <span id="imme_login">已有账户？<a href="/Daixu/view_login">立即登录》》</a></span>
</div><!-- 注册盒子 finish -->
<script type="text/javascript" src="/Public/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/js/view_register.js"></script>
<srcrpt type="text/javascript">



</srcrpt>
</body>
</html>