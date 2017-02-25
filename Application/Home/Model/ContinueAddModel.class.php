<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 1:20
 */
namespace Home\Model;
use Think\Model;

class ContinueAddModel extends Model{
    protected $obj_redis;
    protected $key_app;
    protected $trueTableName = 'continue';

    public function __construct(){
        parent::__construct();

        $this->obj_redis = public_connect_redis();
    }

    public function get_key($key_app){
        $this->key_app = $key_app;

        return $this;
    }

    public function add_continue($article_id,$article_mode,$article_author,$continue_content,$continue_author,$continue_time){
        if($this->key_app!="1"){
            $result = $this->check_mode($article_id,$article_mode,$article_author,$continue_author);
        }else{
            $result = 1;
        }
        switch($result){
            case 1:
                $add_continue['continue_head'] =$article_id;
                $add_continue['continue_content'] =$continue_content;
                $add_continue['continue_author'] =$continue_author;
                $add_continue['continue_time'] =$continue_time;

                $result_add = $this->add($add_continue);

                if($result_add){
                    $this->obj_redis->delete("cache_continue_droit_$article_id");
                    $this->obj_redis->delete("ban_$continue_author");
                    return 1;
                }else{
                    return 2;
                }
                break;
            case 2:
                return 2;
            default:
                return 2;
        }
    }

    //检查能否续写
    private function check_mode($article_id,$article_mode,$article_author,$continue_author){
        //个人创作判断
        if($article_mode==1){
            if($article_author!=$continue_author){
                return 2;
            }
        }

        //如果为抢接续写类型，那么查看该文章的redis是否为可续写状态，如果可续写则判断续写作者和当前提交作者是否一致。
        if($article_mode==2){
            try{
                $result_continue_author = @$this->obj_redis->get("cache_continue_droit_$article_id");
                //如果查不出redis（表明为不可续写状态），如果redis内容和当前续写人id不同（表明不是同一个人）。
                if(!$result_continue_author || $result_continue_author!=$continue_author){
                    throw new \Exception();
                }
            }catch (\Exception $e){
                return 2;
            }
        }

        return 1;
    }
}