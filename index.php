<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

define('APP_PATH','./Application/');

// 默认绑定Home模块
//define('BIND_MODULE', 'Home');

require './ThinkPHP/ThinkPHP.php';