<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 18:13
 */

namespace Home\Model;
use Think\Model;

/*
 * 作用：获取今日排名表中的今日用户排名
 * 传出参数：今日用户排名信息
 * reids定义：cache_people_rank_today（今日用户排名数据的缓存）
 */
class TuserSelectModel extends Model
{
    protected $trueTableName = 'tuser';

    protected $obj_redis;
    protected $key_app;

    protected $limit_num = 10;

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    public function get_key($key_app){
        $this->key_app = $key_app;
    }

    public function select_tuser(){
        //先尝试能否连接redis提取数据，如果不行，则从数据库中查询，并将异常写入log
        try{
            @$cache_people_rank_today = $this->obj_redis->get('cache_people_rank_today');

            //如果有缓存则发送缓存，没有则查询并存入缓存，同时设置缓存时效为60秒
            if($cache_people_rank_today){
                return public_send(1,$this->key_app,$cache_people_rank_today);
            }else{
                throw new \Exception();
            }
        }catch (\Exception $e){
            $select_tuser = $this->select_db_tuser($this->limit_num);

            $result_user_info = $this->select_user_info($select_tuser);

            $result_cache = public_save_redis($this->obj_redis,'cache_people_rank_today',$result_user_info,60);
            if(!$result_cache){
                public_log('Ranking->people_today_select->数据无法连接存入redis');
            }

            return public_send(2,$this->key_app,$result_user_info);
        }
    }

    //从数据库中查询tuser表
    private function select_db_tuser($limit_num){
        $select_tuser = $this->order('tuser_publish desc')->limit($limit_num)->select();

        return $select_tuser;
    }

    //改变查询数目
    public function change_num($limit_num){
        $this->limit_num;
    }

    //根据用户id，将用户的详细情况查询出来
    private function select_user_info($array_all_user){
        $D_UserInfo = D('UserInfo');

        foreach($array_all_user as &$array_one_user){
            $array_user_info = $D_UserInfo->select_info($array_one_user['tuser_user'])[0];

            //将用户的活跃度写入数组
            $array_user_info['tuser_publish'] = $array_one_user['tuser_publish'];

            //用详细信息替换掉原来的简陋信息
            $array_one_user = $array_user_info;
        }

        return $array_all_user;
    }
}