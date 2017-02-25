<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/8
 * Time: 3:28
 */

namespace Home\Model;


use Think\Model;

class UserUpdataModel extends Model
{
    protected $trueTableName = 'user';

    /*
     * 作用：更新用户头像
     * 传入参数：user_id（用户id），user_img（用户头像）
     * 传出参数：1为更新成功，2为失败
     */
    public function updata_img($user_id,$user_img){
        $where_upload['user_id'] = $user_id;

        $save_upload['user_img'] = $user_img;

        $result_upload = $this->where($where_upload)->save($save_upload);

        if($result_upload){
            return 1;
        }else{
            return 2;
        }
    }

    /*
     * 作用：更新用户信息
     * 传入参数：user_id（用户id），user_sex（性别），user_brief（简介），user_email（邮箱）
     * 传出参数：1为成功，2为失败
     */
    public function updata_info($user_id,$user_sex,$user_brief,$user_email){
        $where_upload['user_id'] = $user_id;

        $save_upload["user_sex"] = $user_sex;
        $save_upload["user_brief"] = $user_brief;
        $save_upload["user_email"] = $user_email;

        $result = $this->where($where_upload)->save($save_upload);

        if($result){
            return 1;
        }else{
            return 2;
        }
    }
}