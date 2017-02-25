<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/3
 * Time: 23:24
 */
namespace Home\Model;
use Think\Model;

class AdvRollModel extends Model {
    protected $obj_redis;
    protected $key_app;
    protected $trueTableName = 'adv';

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    public function get_key($key_app){
        $this->key_app = $key_app;
    }

    /*
* 作用：查询轮播图url
* 传出参数：轮播图url数组
* redis定义：cache_adv（轮播图缓存数据）
*/
    public function roll_select(){
        //先判断能否从redis中查询出缓存值，如果不能，就从数据库里查询
        try{
            @$cache_adv = $this->obj_redis->get("cache_adv");
        }catch (\Exception $e){
            $selete_adv = $this->field('adv_id,adv_img,adv_url')->select();

            //将这个异常写入log
            public_log('Spread模块->roll_add方法->无法链接redis并查询');

            return public_send(2,$this->key_app,$selete_adv);
        }

        //判断是否有缓存，如果有则发送缓存，没有则查询数据库发送，并缓存。
        if($cache_adv){
            return public_send(1,$this->key_app,$cache_adv);
        }else{
            //从数据库查出数据
            $selete_adv = $this->field('adv_id,adv_img,adv_url')->select();

            //如果没有将数据存入缓存，则将异常写入log
            if(!public_save_redis($this->obj_redis,"cache_adv",$selete_adv)){
                public_log('Spread模块->roll_add方法->缓存存入失败');
            }

            return public_send(2,$this->key_app,$selete_adv);
        }
    }
}