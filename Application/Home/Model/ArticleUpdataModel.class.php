<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 1:14
 */
namespace Home\Model;
use Think\Model;

class ArticleUpdataModel extends Model
{
    protected $obj_redis;
    protected $key_app;
    protected $trueTableName = 'article';

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    public function get_key($key_app){
        $this->key_app = $key_app;
    }

    public function updata_continue($article_id,$continue_time){
        //清除该文章的缓存
        $this->obj_redis->delete("cache_article_$article_id");

        //增加总楼数,且更新文章的更新时间
        $where_total['article_id'] = $article_id;
        $select_article_total = $this->where($where_total)->field('article_total')->select();
        $save_article['article_total'] = $select_article_total[0]['article_total']+1;

        $save_article['article_update'] = $continue_time;
        $this->where($where_total)->save($save_article);
    }
}