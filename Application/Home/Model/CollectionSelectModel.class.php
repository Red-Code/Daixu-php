<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/24
 * Time: 18:13
 */

namespace Home\Model;


use Think\Model;

class CollectionSelectModel extends Model
{
    protected $trueTableName = 'collection';
    protected $user_id;
    protected $article_classify;

    /*
     * 作用：查询某用户收藏的文章
     * 传入参数：user_id（用户id），article_classify（收藏文章的类型）
     * 传出参数：包含已收藏文章id的数组
     */
    public function select_collection_id($user_id,$article_classify){
        $this->user_id = $user_id;
        $this->article_classify = $article_classify;

        $where_select['collection_user_id'] = $user_id;
        if($article_classify){
            $where_select['collection_article_classify'] = $article_classify;
        }

        $result_select = $this->where($where_select)->order('collection_time desc')->select();

        return $result_select;
    }

    /*
     * 作用：为了能根据包含文章id的数组，查询出这些文章id详细列表信息，所以现在将它们处理成合适的格式并输出。
     * 传入参数：包含文章id的多维数组
     * 传出参数：若果成功：string（查询文章详细信息所需的查询条件）。失败：false
     */
    public function select_collection_where($array_collection){
        if($array_collection){
            $string_where = '(';

            //$array_collection中包含了多篇文章的详细收藏对应信息，而每一个对应信息就是一个数组。$array_collection_id就是每一个对应信息数组（文章id就在其中）。
            foreach($array_collection as $k=>$array_collection_id){
                $string_where = $string_where."article_id=".$array_collection_id['collection_article_id'];

                //如果后面还有值，再加or条件
                if(next($array_collection)){
                    $string_where = $string_where.' or ';
                }
            }

            $string_where = $string_where.')';//现在呈现的样式应为“a1=1 and (a2=2 or a2=3)”

            return $string_where;
        }else{
            return false;
        }

    }
}