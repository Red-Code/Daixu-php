<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 18:24
 */

namespace Home\Model;


use Think\Model;

/*
* 作用：获取今日排名表中的今日文章排名
* 传出参数：今日文章排名信息
* reids定义：cache_article_rank_today（今日文章排名缓存）
*/
class TarticleSelectModel extends Model
{
    protected $trueTableName = 'tarticle';

    protected $obj_redis;
    protected $key_app;

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    public function get_key($key_app){
        $this->key_app = $key_app;
    }

    public function select_tarticle(){
        try{
            @$cache_article_rank_today = $this->obj_redis->get('cache_article_rank_today');

            if($cache_article_rank_today){
                return public_send(1,$this->key_app,$cache_article_rank_today);
            }else{
                throw new \Exception();
            }
        }catch (\Exception $e){
            $select_tarticle = $this->order('tarticle_continue desc')->limit(10)->select();

            $result_cache = public_save_redis($this->obj_redis,'cache_article_rank_today',$select_tarticle,60);
            if(!$result_cache){
                public_log('Ranking->article_today_select->数据无法连接存入redis');
            }

            return public_send(2,$this->key_app,$select_tarticle);
        }
    }
}