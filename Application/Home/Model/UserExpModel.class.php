<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/8
 * Time: 2:31
 */

namespace Home\Model;


use Think\Model;

class UserExpModel extends Model
{
    protected $trueTableName = 'user';

    /*
     * 作用：更新用户的经验值
     * 传入参数：$user_id（用户id），$add_exp（增加的经验值）
     * 传出参数：1为成功，2为失败
     */
    public function add_exp($user_id,$add_exp){
        $where_updata_exp['user_id'] = $user_id;

        $old_exp = $this->where($where_updata_exp)->getField('user_exp');

        $new_exp = $old_exp+$add_exp;

        $array_exp = public_get_level($new_exp);

        $save_exp['user_exp'] = $new_exp;
        $save_exp['user_rank'] = $array_exp[0];
        $save_exp['user_surplus_exp'] = $array_exp[1];

        $result_save = $this->where($where_updata_exp)->save($save_exp);

        if($result_save){
            return 1;
        }else{
            return 2;
        }
    }
}