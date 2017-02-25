<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/28
 * Time: 17:27
 */

namespace Home\Model;
use Think\Model;

class NoticeSelectModel extends Model
{
    protected $trueTableName = 'notice';

    protected $obj_redis;
    protected $user_id;

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    /*
     * 作用：接收用户id
     * 传入参数：$user_id(用户id)
     * 传出参数：$this
     */
    public function notice_select($user_id){
        $this->user_id = $user_id;

        return $this;
    }

    /*
     * 作用：查询出用户未读消息数量
     * 传入参数：无
     * 传出参数：未读消息数
     * 缓存定义：cache_notice_new_用户id
     */
    public function notice_new_num(){
        try{
            @$cache_notice_new = $this->obj_redis->get("cache_notice_new_$this->user_id");

            if(!$cache_notice_new){
                throw new \Exception();
            }
            return $cache_notice_new;
        }catch (\Exception $e){
            $where_new_num['notice_receive'] = $this->user_id;
            $where_new_num['notice_read'] = '1';//1为未读状态

            $result_new_num = $this->where($where_new_num)->count();
            if($result_new_num == '0'){
                $result_new_num = 'a';
            }
            public_save_redis($this->obj_redis,"cache_notice_new_$this->user_id",$result_new_num,60);

            return $result_new_num;
        }
    }

    /*
     * 作用：根据不同的参数，查询出详细的未读信息
     * 传入参数：
     * 传出参数：
     */
    public function notice_info_select(){

    }
}