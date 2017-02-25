<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/6
 * Time: 12:46
 */

namespace Home\Model;


use Think\Model;

class DraftDelModel extends Model
{
    protected $trueTableName = 'draft';

    /*
     * 作用：删除指定草稿，传入用户id的作用是查看被删除的草稿是否属于该用户（防止用户直接上传参数，删除他人草稿）
     * 传入参数：用户id，草稿id
     * 传出参数：1为删除成功，2为删除失败
     */
    public function del_draft($user_id,$draft_id){
        $where_del_draft['draft_id'] = $draft_id;
        $where_del_draft['draft_author'] = $user_id;

        $result_del = $this->where($where_del_draft)->delete();

        if($result_del){
            return 1;
        }else{
            return 2;
        }
    }
}