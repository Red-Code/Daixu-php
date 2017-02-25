<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/24
 * Time: 17:49
 */

namespace Home\Model;


use Think\Model;

class CollectionAddModel extends Model
{
    protected $trueTableName = 'collection';

    /*
     * 作用：收藏文章
     * 传入参数：user_id（用户id），article_id（文章id）,article_classify（文章类型）,collection_time（收藏的更新时间）
     * 传出参数：1为收藏成功，2为收藏失败，3为已经收藏过了
     */
    public function add_collection($user_id,$article_id,$article_classify,$collection_time){
        //检查是否收藏过该篇文章
        $where_collection['collection_user_id'] = $user_id;
        $where_collection['collection_article_id'] = $article_id;

        $result_select = $this->where($where_collection)->select();

        if($result_select){
            return 3;
        }else{
            $add_collection['collection_user_id'] = $user_id;
            $add_collection['collection_article_id'] = $article_id;
            $add_collection['collection_article_classify'] = $article_classify;
            $add_collection['collection_time'] = $collection_time;

            $result = $this->add($add_collection);

            if($result){
                return 1;
            }else{
                return 2;
            }
        }
    }
}