<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/6/30
 * Time: 13:45
 */
var_dump('start');
class Welcome
{
    //订阅
    public function subscribe()
    {
        var_dump('end1');
        $redis = new Redis();
        $redis->connect('127.0.0.1',8970);//ip地址和端口号
        $redis->auth('heikequsi690081');//密码
        var_dump('end2');
        function f($redis, $channel, $message)
        {
            var_dump('end5');
            echo '123';
        }
        //用下面这行设置的时候没有起作用
        // ini_set('default_socket_timeout', '-1');

        var_dump('end3');
        $redis->subscribe(array('channel1'), 'f');
        var_dump('end4');
    }

    //发布
    public function publish()
    {
        $redis = new Redis();
        $redis->connect('127.0.0.1',8970);//ip地址和端口号
        $redis->auth('heikequsi690081');//密码
        $redis->publish('channel1', 'hello');
    }
}

$welcome = new Welcome();
$welcome->subscribe();
var_dump('end');

