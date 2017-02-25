<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/7
 * Time: 17:58
 */
namespace Home\Controller;
use Think\Controller;

//应用层，显示视图控制器
class AjaxController extends Controller
{

    private $user_id;

    /*
     * 作用：验证是否登录
     * 传入参数：cookie
     * 传出参数：用户信息
     */
    public function __construct()
    {
        parent::__construct();

        $this->user_id = cookie('user_id');
    }

    //同过ajax发来请求，发送草稿列表
    public function ajax_draft_list(){
        $user_id = $this->user_id;
        $draft_type = I('param.draft_type');
        $article_id = I('param.article_id');
        if($draft_type==""){
            $draft_type='1';
        }

        $D_DraftSelect = D('DraftSelect');
        $result_continue_draft = $D_DraftSelect->select_draft($user_id,$draft_type);

        $this->assign('article_id',$article_id);
        $this->assign('ajax_draft',$result_continue_draft[0]);
//        $this->assign('ajax_draft_page',$result_continue_draft[1]);

        $content = $this->fetch('ajax_draft_list');

        echo $content;
    }
}