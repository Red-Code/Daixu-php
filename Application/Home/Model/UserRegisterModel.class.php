<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/3
 * Time: 15:16
 */
namespace Home\Model;
use Think\Model;

//传出参数：array（int，string），
//第0项：1代表成功，2代表失败。
//第1项：信息
class UserRegisterModel extends Model {
    protected $trueTableName = 'user';

    public function register($user_account,$user_name,$user_password){
        $check_result = $this->check_info($user_account,$user_name,$user_password);

        if($check_result[0] == 1){
            $result = $this->add_info($user_account,$user_name,$user_password);
            return $result;
        }else{
            return $check_result;
        }
    }

    //检查传入参数
    private function check_info($user_account,$user_name,$user_password){
        if($user_account==''||$user_name==''||$user_password==''){
            return array(2,'请输入正确格式');
        }

        $where_same_account['user_account'] = $user_account;
        $where_same_name['user_name'] = $user_name;
        $result_same_account = $this->where($where_same_account)->select();
        $result_same_name = $this->where($where_same_name)->select();

        if($result_same_account){
            return array(2,'账号已存在');
        }
        if($result_same_name){
            return array(2,'昵称已存在');
        }

        return array(1,'注册成功');
    }

    //写入信息
    private function add_info($user_account,$user_name,$user_password){
        $add['user_account'] =$user_account;
        $add['user_name'] =$user_name;
        $add['user_password'] =md5($user_password);

        $result_add = $this->add($add);

        if($result_add){
            return array(1,'注册成功');
        }else{
            return array(2,'注册失败');
        }
    }
}