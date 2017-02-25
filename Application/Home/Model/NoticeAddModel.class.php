<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/28
 * Time: 10:50
 */

namespace Home\Model;
use Think\Model;

class NoticeAddModel extends Model
{
    protected $trueTableName = 'notice';

    protected $receive_id;//需要通知的人员id，可以为数组或单人
    protected $notice_origin_id;//原文章id
    protected $notice_origin_name;//原文章名
    protected $notice_continue_id;//原文章楼层id
    protected $notice_continue_arthor;//接楼作者id

    /*
     * 作用：接收需要通知的人员id，可以为数组array(id1，id2，id3)或单人
     * 传入参数：被通知人员id
     * 传出参数：$this
     */
    public function notice_receive_id($receive_id){
        $this->receive_id = $receive_id;

        return $this;
    }

    /*
     * 作用：接收文章类型参数
     * 传入参数：notice_origin_id（原文章id），notice_origin_name（原文章名），notice_continue_id（原文章楼层id）,notice_continue_arthor（接楼作者id）
     * 传出参数：$this
     */
    public function notice_article_param($notice_origin_id,$notice_origin_name,$notice_continue_id,$notice_continue_arthor){
        $this->notice_origin_id = $notice_origin_id;
        $this->notice_origin_name = $notice_origin_name;
        $this->notice_continue_id = $notice_continue_id;
        $this->notice_continue_arthor = $notice_continue_arthor;

        return $this;
    }

    /*
     * 作用：文章通知的写入
     * 传入参数：notice_type（通知类型）
     * 传出参数：无
     */
    public function notice_add($notice_type){
        $where_add['notice_read'] = '1';//表示该通知未被看过
        $where_add['notice_time'] = date('Y-m-d H:i:s',time());
        switch($notice_type){
            case '1'://文章通知
                $where_add['notice_type'] = '1';
                $where_add['notice_content'] = '您参与的文章《'.$this->notice_origin_name.'》有最新续写动态';
                $where_add['notice_origin_id'] = $this->notice_origin_id;
                $where_add['notice_origin_name'] = $this->notice_origin_name;
                $where_add['notice_continue_id'] = $this->notice_continue_id;
                break;
            case '2'://关注通知
                break;
            case '3'://私信通知
                break;
            case '4'://系统通知
                break;
        }

        $where_all_array = array();//为了后面可以使用addAll方法直接将所有数据一次性写入
        if(is_array($this->receive_id)){
            foreach($this->receive_id as $one_receive_id){
                if($this->notice_continue_arthor != $one_receive_id){//谁接楼，那么这条消息就不会发给谁
                    $where_add['notice_receive'] = $one_receive_id;

                    $where_all_array[] = $where_add;
                }
            }
        }else{
            $where_add['notice_receive'] = $this->receive_id;
            $where_all_array = $where_add;
        }

        $result_addAll = $this->addAll($where_all_array);

        if(!$result_addAll){
            public_log('NoticeAdd->文章通知未发送');
        }
    }
}