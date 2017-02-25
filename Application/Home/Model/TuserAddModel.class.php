<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 17:29
 */

namespace Home\Model;
use Think\Model;

//将信息输入今日排名表
class TuserAddModel extends Model{
    protected $trueTableName = 'tuser';

    public function add_tuser($user_id,$tuser_publish){
        $where['user_id'] = $user_id;
        $old_publish = $this->where($where)->getField('tuser_publish');

        if($old_publish){
            $add['tuser_publish'] = $tuser_publish+$old_publish;
        }else{
            $add['tuser_publish'] = $tuser_publish;
        }

        $add['tuser_user'] = $user_id;
        $add['tuser_date'] = date('Y-m-d');

        $result = $this->add($add);

        if($result){
            return 1;
        }else{
            return 2;
        }
    }
}