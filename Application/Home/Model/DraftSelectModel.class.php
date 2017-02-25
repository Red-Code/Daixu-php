<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/7
 * Time: 15:09
 */

namespace Home\Model;


use Think\Model;

class DraftSelectModel extends Model
{
    protected $trueTableName = 'draft';

    /*
     * 作用：查询用户草稿
     * 传入参数：用户id，草稿类型
     * 传出参数：array（草稿数组,分页对象）
     */
    public function select_draft($draft_author,$draft_type){
        $where_select_draft['draft_author'] = $draft_author;
        $where_select_draft['draft_type'] = $draft_type;

        $obj_page = public_getpage($this, $where_select_draft, 5);
        $obj_show = $obj_page->show();// 分页显示输出

        $result_draft = $this->where($where_select_draft)->order('draft_time desc')->limit($obj_page->firstRow . ',' . $obj_page->listRows)->select();

        $result_json_draft = public_change_symbol(json_encode($result_draft));

        $result_change_draft = json_decode($result_json_draft,true);

        return array($result_change_draft,$obj_show);
    }
}