<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 19:32
 */

namespace Home\Model;
use Think\Model;

class ArticleRankModel extends Model
{
    protected $trueTableName = 'article';
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
     * 作用：从redis中查询出目前文章总排名情况，如果无法从缓存中查询，则从数据库中查询，并将异常写入log
     * 传出参数：文章总排名情况
     */
    public function article_all_select(){
        try{
            @$cache_article_all = $this->obj_redis->get('cache_article_all');
            if(!$cache_article_all){
                throw new \Exception();
            }
        }catch (\Exception $e){
            public_log('Ranking->article_all_select->无法连接数据库');

            return public_send(2,$this->key_app,$this->article_all_updata());
        }

        return public_send(1,$this->key_app,$cache_article_all);
    }

    /*
     * 作用：查看目前所有文章并作出排名，将前十排名存入redis。
     * 传出参数：目前所有文章的排名
     * redis定义：cache_article_all
     */
    private function article_all_updata(){
        $article_all_rank = $this->order('article_total desc')->limit(10)->field('article_id,article_total,article_name')->select();

        public_save_redis($this->obj_redis,'cache_article_all',$article_all_rank,60);

        return $article_all_rank;
    }

}