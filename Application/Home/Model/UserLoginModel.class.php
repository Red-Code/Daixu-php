<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/3
 * Time: 21:07
 */
namespace Home\Model;
use Think\Model;

class UserLoginModel extends Model {
    protected $trueTableName = 'user';

    public function login($user_account,$user_password){
        $where_psw['user_account']= $user_account;
        $select_user = $this->where($where_psw)->field('user_id,user_password')->select();

        //密码一致则登录成功
        if(md5($user_password) == $select_user[0]['user_password']){
            return $select_user[0]['user_id'];
        }else{
            return False;
        }
    }
}