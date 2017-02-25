<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/7
 * Time: 16:44
 */

namespace Home\Model;


use Think\Model;

class DraftUpdataModel extends Model
{
    protected $trueTableName = 'draft';

    //参数：作者id，草稿id，草稿内容，更新时间
    public function updata_draft($user_id,$draft_id,$draft_content,$updata_time){
        $where_updata['draft_author'] = $user_id;
        $where_updata['draft_id'] = $draft_id;
        $save_updata['draft_content'] = $draft_content;
        $save_updata['draft_time'] = $updata_time;

        $result_updata = $this->where($where_updata)->save($save_updata);

        if($result_updata){
            return 1;
        }else{
            return 2;
        }
    }
}