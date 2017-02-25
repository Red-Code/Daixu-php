<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 19:23
 */

namespace Home\Model;


use Think\Model;

class UserRankModel extends Model
{
    protected $trueTableName = 'user';
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

    /*
     * 作用：从redis中查询出目前的用户总排名情况，如果无法从缓存中查询，则从数据库中查询，并将异常写入log
     * 传出参数：用户总排名情况
     */
    public function people_all_select(){
        try{
            @$cache_people_all = $this->obj_redis->get('cache_people_all');
            if(!$cache_people_all){
                throw new \Exception();
            }
        }catch (\Exception $e){
            public_log('Ranking->people_all_select->无法连接数据库');

            $people_all_rank = $this->people_all_updata($this->limit_num);

            return public_send(2,$this->key_app,$people_all_rank);
        }

        return public_send(1,$this->key_app,$cache_people_all);
    }

    /*
     * 作用：查看所有用户的经验值并作出排名，将前十排名存入redis。
     * 传出参数：目前所有用户的排名
     * redis定义：cache_people_all
     */
    private function people_all_updata($limit_num){
        $people_all_rank = $this->order('user_exp desc')->limit($limit_num)->field('user_id,user_name,user_exp,user_img,user_brief')->select();

        public_save_redis($this->obj_redis,'cache_people_all',$people_all_rank,60);

        return $people_all_rank;
    }

    //改变查询数目
    public function change_num($limit_num){
        $this->limit_num = $limit_num;
    }
}