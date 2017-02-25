<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 0:41
 */
namespace Home\Model;
use Think\Model;

class ArticleAddModel extends Model{
    protected $trueTableName = 'article';

    public function add_article($article_name,$article_author,$article_content,$article_rule,$article_classify,$article_mode,$article_publish,$article_update,$article_surface){
        $add_article['article_name'] =$article_name;
        $add_article['article_author'] =$article_author;
        $add_article['article_content'] =$article_content;
        $add_article['article_rule'] =$article_rule;
        $add_article['article_classify'] =$article_classify;
        $add_article['article_mode'] =$article_mode;
        $add_article['article_publish'] =$article_publish;
        $add_article['article_update'] =$article_update;
        $add_article['article_surface'] =$article_surface;

        $result_add = $this->add($add_article);
        if($result_add){
            return 1;
        }else{
            return 2;
        }
    }
}