<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/3
 * Time: 23:09
 */
namespace Home\Model;
use Think\Model;

class UserInfoModel extends Model {
    protected $trueTableName = 'user';

    public function select_info($user_id){
        $where['user_id'] = $user_id;
        $result = $this->where($where)->select();

        $int_sex = $result[0]['user_sex'];
        switch($int_sex){
            case 1:
                $char_sex = '男';
                break;
            case 2:
                $char_sex = '女';
                break;
            case 3:
                $char_sex = '保密';
                break;
        }
        $result[0]['user_sex'] = $char_sex;

        return $result;
    }
}