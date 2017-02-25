<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/5
 * Time: 1:29
 */

namespace Home\Model;

use Think\Model;

class UserOwnerRankModel extends Model
{
    protected $trueTableName = 'user';
    protected $obj_redis;
    protected $key_app;

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    public function get_key($key_app){
        $this->key_app = $key_app;
    }

    /*
     * 作用：查询用户自己的所在排名
     * 传入参数：用户id
     * 传出参数：用户所在排名
     * redis定义：cache_owner_rank_用户id（里面存的是排名）
     */
    public function select_owner_rank($user_id){
        try{
            @$user_rank = $this->obj_redis->get("cache_owner_rank_$user_id");

            if(!$user_rank){
                throw new \Exception();
            }
        }catch (\Exception $e){
            $where_exp['user_id'] = $user_id;
            $owner_exp = $this->where($where_exp)->getField('user_exp');

            $where_count['user_exp'] = array('gt',$owner_exp);
            $userCount = $this->where($where_count)->count();//查询大于用户经验值的用户的人数

            $user_rank = $userCount+1;

            public_save_redis($this->obj_redis,"cache_owner_rank_$user_id",$user_rank,300);

            return $user_rank;
        }

        return $user_rank;
    }

}