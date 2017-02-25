<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/6
 * Time: 2:27
 */

namespace Home\Model;


use Think\Model;

class DraftAddModel extends Model
{
    protected $trueTableName = 'draft';

    /*
     * 作用：获取草稿内容，并存入数据库
     * 传入参数：$draft_content(草稿内容)，$draft_time(创建时间),$draft_author（作者id），$draft_type（1为接龙草稿，2为发布草稿），$draft_article（所属文章id）
     * 传出参数：1为添加成功，2为失败
     */
    public function add_draft($draft_content,$draft_time,$draft_author,$draft_type,$draft_article,$draft_article_name){
        $add_draft['draft_content'] = $draft_content;
        $add_draft['draft_time'] = $draft_time;
        $add_draft['draft_author'] =$draft_author;
        $add_draft['draft_type'] =$draft_type;
        $add_draft['draft_article'] =$draft_article;
        $add_draft['draft_article_name'] =$draft_article_name;

        $result_draft = $this->add($add_draft);

        if($result_draft){
            return 1;
        }else{
            return 2;
        }
    }
}