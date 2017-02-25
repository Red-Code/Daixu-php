<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 1:49
 */
namespace Home\Model;
use Think\Model;

class ContinueDelModel extends Model{
    protected $obj_redis;
    protected $key_app;
    protected $trueTableName = 'continue';

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    public function get_key($key_app){
        $this->key_app = $key_app;
    }

    public function del_continue($article_id,$continue_id){
        $where_delete['continue_id'] = $continue_id;

        $result_delete = $this->where($where_delete)->delete();
        //如果删除成功，则清除文章缓存
        if($result_delete){
            $this->obj_redis->delete("cache_article_$article_id");
            return 1;
        }else{
            return 2;
        }
    }
}
