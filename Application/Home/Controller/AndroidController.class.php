<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/2
 * Time: 20:06
 */
namespace Home\Controller;
use Think\Controller;

//Android查询请求控制器
class AndroidController extends Controller {
    private $key_app;
    private $obj_redis;
    private $now_user_id;//现在操作的用户的id

    public function __construct(){
        parent::__construct();

        $this->key_app = I('param.key_app');

        $this->now_user_id = I('param.user_id');

//        $this->now_user_id = cookie('user_id');

        $this->obj_redis = public_connect_redis();
    }

    //获取用户资料
    public function user_info(){
        $user_id = I('param.user_id');

        $D_UserInfo = D('UserInfo');

        $result_user_info = $D_UserInfo->select_info($user_id);

        $json_user_info = json_encode($result_user_info);

        echo $json_user_info;
    }

    //获取文章列表
    public function article_list(){
        $get_article_classify = I('param.classify');//1为恐怖悬疑，2为都市言情，3为玄幻，4为古风，5为其他（默认为其他）
        $get_article_order = I('parm.order');//1为最新排序，2为最热排序（默认为最新排序）
        $get_article_mode = I('param.mode');//1为个人创作，2为抢接续写，3为自由续写（默认为抢接续写）
        $get_start_num = I('param.start_num');//开始查询的条数(最初从0开始查)

        $D_ArticleList = D('ArticleList');
        $result_list = $D_ArticleList->get_app_param($this->key_app,$get_start_num)->classify_list_select($get_article_classify,$get_article_mode,$get_article_order);

        echo $result_list;
    }

    /*
     * 作用：文章页的展示
     * 传入参数：文章id，用户id
     * 传出参数：抢接剩余时间，文章id，抢接状态，文章首楼信息，文章接楼信息。
     */
    public function article_info(){
        $id_article = I('param.article_id');

        $D_ArticleInfo = D('ArticleInfo');
        $select_article = $D_ArticleInfo->get_key($this->key_app)->select_article($id_article);

        $article_first = public_user_more($select_article[0][0],'article_author');
        $article_content = public_user_more($select_article[1],'continue_author');

        /*
         * 作用：（给前端传递一个抢接状态信息，控制页面展示）根据传入的参数判断抢接状态，并传出参数。实现步骤：查询redis里面有没有这篇文章的抢接值，如果没有表示可以接龙
         * 传入参数：user_id（当前用户id），文章id，
         * 传出参数：1表示没有被人抢,2表示你正在续写阶段,3表示不能抢,4表示被禁言了
         */
        $user_id = $this->now_user_id;
        $article_id = $article_first[0]['article_id'];
        $obj_redis = public_connect_redis();
        $can_continue_author = $obj_redis->get("cache_continue_droit_$article_id");
        if($can_continue_author){
            //如果当前用户id=redis中存id
            if($user_id==$can_continue_author){
                $article_rap =  "2";
                $redis_time = $obj_redis->pttl("cache_continue_droit_$article_id");
            }else{
                $article_rap =  "3";
            }
        }else{
            //查看是否存在这个redis，存在则表示被禁言
            if($obj_redis->get("ban_$user_id")){
                $article_rap = "4";
            }else{
                $article_rap =  "1";
            }
        }

        $article_info['redis_time'] = round($redis_time/1000);//抢接用户的剩余时间
        $article_info['article_id'] = $article_id;
        $article_info['article_rap'] = $article_rap;//1表示能接，2表示他正在接，3表示在被别人接，4表示用户正在被禁言
        $article_info['article_first'] = $article_first[0];
        $article_info['article_content'] = $article_content;

        echo json_encode($article_info);
    }
}