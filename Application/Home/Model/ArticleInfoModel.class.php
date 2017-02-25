<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 0:28
 */
namespace Home\Model;
use Think\Model;

class ArticleInfoModel extends Model{
    protected $obj_redis;
    protected $key_app;
    protected $trueTableName = 'article';

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    public function get_key($key_app){
        $this->key_app = $key_app;

        return $this;
    }

    /*
     * 作用：查询出文章的全部信息
     * 传入参数：id_article（文章id）
     * 传出参数：cache_article_文章id（是一个多维数组，最外层的0项的0项是文章首楼，最外层的1项是后面的所有楼层，最外层的2项是不重复的所有参与的用户的id）
     * redis定义：cache_article_文章id，cache_article_join_文章id
     */
    public function select_article($id_article){

        try{
            if($this->key_app=="1"){
                throw new \Exception();
            }
            @$cache_article_info = $this->obj_redis->get("cache_article_$id_article");
            if($cache_article_info=='Array'){
                throw new \Exception();
            }
            if($cache_article_info){
                return public_send(1,"",$cache_article_info);
            }else{
                throw new \Exception();
            }
        }catch (\Exception $e)
        {
            $table_continue = M('continue');

            $where_article_info['article_id'] = $id_article;
            $where_continue_info['continue_head'] = $id_article;

            $select_article_total = $this->where($where_article_info)->select();
            $select_article_total = public_get_classify_word($select_article_total);

            $select_article_continue = $table_continue->where($where_continue_info)->order('continue_head')->select();

            $select_article_info = array($select_article_total,$select_article_continue);

            if($this->key_app=="1"){
                $json_article_info = public_change_android_symbol(json_encode($select_article_info));
            }else{
                $json_article_info = public_change_symbol(json_encode($select_article_info));
            }

            $article_info = json_decode($json_article_info,true);

            //将参与过的用户查询出来，并写入cache_article_join_$id_article缓存中
            $article_arthor_id = $select_article_total[0][0]['article_author'];//文章的作者id
            $where_join_all_id['continue_head'] = $id_article;
            $join_all_id = $table_continue->where($where_join_all_id)->distinct(true)->field('continue_author')->select();//查询出不重复的参与者id
            $join_finally_all_id = array();
            foreach($join_all_id as $onejoin_id){
                if($article_arthor_id != $onejoin_id["continue_author"]){//只有当参与者id与文章作者id不同时才加入数组
                    $join_finally_all_id[] = $onejoin_id["continue_author"];//这是为了保证数组的格式为array（id1,id2,id3）
                }
            }
            $join_finally_all_id[] = $article_arthor_id;//最后再加入文章作者id
            public_save_redis($this->obj_redis,"cache_article_join_$id_article",$join_finally_all_id);

            $result_set_redis = public_save_redis($this->obj_redis,"cache_article_$id_article",$article_info);

            if(!$result_set_redis){
                public_log('Article->select_article->redis无法写入');
            }

            return public_send(2,"",$article_info);
        }
    }
}