<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/2
 * Time: 20:07
 */
namespace Home\Controller;
use Think\Controller;

//应用层，显示视图控制器
class ActionController extends Controller {
    private $key_app;
    private $obj_redis;
    private $now_user_id;//现在操作的用户的id

    /*
     * 作用：接收android端传过来的键值，连接redis
     */
    public function __construct(){
        parent::__construct();

        $this->key_app = I('param.key_app');
        if($this->key_app=="1"){
            $this->now_user_id = I('param.user_id');
        }else{
            $this->now_user_id = cookie('user_id');
        }

        $this->obj_redis = public_connect_redis();
    }


    /*
     * 作用：登录，登录成功后建立cookie，将账号id保存到cookie中。
     * 传入参数：登录名，密码
     * 传出参数：arr
     */
    public function login(){
        $user_account = I('param.user_account');
        $user_password = I('param.user_password');

        $D_User_login = D('UserLogin');
        $result = $D_User_login->login($user_account,$user_password);

        if($result){
            if($this->key_app =="1"){
                echo $result;
            }else{
                cookie('user_id',$result,43200);
                $this->success('登录成功','/Daixu/homepage');
            }
        }else{
            if($this->key_app =="1"){
                echo "false";
            }else{
                $this->error('密码或账号错误','/Daixu/homepage');
            }
        }
    }

    //退出登录
    public function del_login(){
        $user_id = cookie('user_id');
        if($user_id){
            cookie('user_id',null);
            $this->success('登出成功','/Daixu/homepage');
        }
    }

    //更新用户资料
    public function info_updata(){
        $user_id = $this->now_user_id;
        $user_sex = I('param.sex');
        $user_brief = I('param.brief');
        $user_email = I('param.email');

        $D_UserUpdata = D('UserUpdata');

        $result_upload = $D_UserUpdata->updata_info($user_id,$user_sex,$user_brief,$user_email);

        switch($result_upload){
            case 1:
                $this->success('信息更新成功');
                break;
            case 2:
                $this->error('信息更新成功');
                break;
            default:
                $this->error('信息更新成功');
                break;
        }
    }

    //上传用户头像
    public function upload_user_img(){
        if($this->key_app=="1"){
            $target_path  = "./Public/daixu_picture/user/";//服务器文件的存放路径
            $save_path = $target_path.basename( $_FILES['uploadedfile']['name']);//服务器的存放路径加文件名
            $db_path = "/Public/daixu_picture/user/".basename( $_FILES['uploadedfile']['name']);//存放到数据库里的字段
            if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $save_path)) {
                $article_surface = $db_path;
            } else{
                echo "false_img";
            }
        }else{
            $img_surface = public_upload('daixu_picture/user/');
            if(!$img_surface){$this->error('上传图片失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');}
            $article_surface = '/Public/daixu_picture/user/'.$img_surface['img_surface']['savename'];
        }

        $D_UserUpdata = D('UserUpdata');

        $result_upload = $D_UserUpdata->updata_img($this->now_user_id,$article_surface);

        switch($result_upload){
            case 1:
                if($this->key_app=="1"){
                    echo "true";
                }else{
                    $this->success('头像更新成功');
                }
                break;
            case 2:
                if($this->key_app=="1"){
                    echo "false";
                }else{
                    $this->error('头像更新失败');
                }
                break;
        }
    }

    /*
     * 作用：当按下抢接按钮时，会生成一个4分钟的redis，这个redis的作用是保证这个时间段内只有这个人可以接龙.
     *       同时还会生成一个1小时零5分的缓存，只要这个缓存存在，你就不能进行其他文章的续写，只有当你在规定时间内接龙后，才会消除这个redis
     * 传入参数：article_id(文章id)，continue_author(接楼者id)
     * 传出参数：无
     * redis定义：cache_continue_droit_文章id（这里面放置抢接的用户id，时限为4分钟）
     *            ban_用户id（如果为1表示被禁言，1小时内无法发言）
     */
    public function action_droit(){
        $article_id = I('param.article_id');
        $continue_author  =$this->now_user_id;

        public_save_redis($this->obj_redis,"cache_continue_droit_$article_id",$continue_author,300);
        public_save_redis($this->obj_redis,"ban_$continue_author",1,3900);

        $this->success('抢接成功');
    }

    /*
     * 作用：楼主删除指定楼层
     * 传入参数：article_id（文章id），操作者id，continue_id（楼层id）
     * 传出参数：array(),（1=成功，2=失败）
     */
    public function del_continue(){
        $article_id = I('param.article_id');
        $user_id = $this->now_user_id;
        $continue_id = I('param.continue_id');

        //检验用户是否有资格删除
        $table_article = M('article');
        $where_author['article_id'] = $article_id;
        $select_article_author = $table_article->where($where_author)->getField('article_author');
        if($select_article_author==$user_id){
            $D_ContinueDel = D('ContinueDel');
            $result = $D_ContinueDel->del_continue($article_id,$continue_id);

            switch($result){
                case 1:
                    $this->success('删除成功');
                    break;
                case 2:
                    $this->error('删除失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
                    break;
            }
        }else{
            $this->error('删除失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
        }
    }

    //删除草稿
    public function del_draft(){
        $get_draft_id = I('param.draft_id');
        $get_user_id = $this->now_user_id;

        $D_DraftDel = D('DraftDel');
        $result_del = $D_DraftDel->del_draft($get_user_id,$get_draft_id);

        switch($result_del){
            case 1:
                $this->success('删除成功');
                break;
            case 2:
                $this->error('删除失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
                break;
            default:
                $this->error('删除失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
                break;
        }
    }

    //更新草稿
    public function updata_draft(){
        $get_user_id = $this->now_user_id;
        $get_draft_id =I('param.draft_id');
        $get_draft_content = I('param.draft_content');
        $get_updata_time = date('Y-m-d H:i:s',time());

        $D_DraftUpdata = D('DraftUpdata');
        $result_updata = $D_DraftUpdata->updata_draft($get_user_id,$get_draft_id,$get_draft_content,$get_updata_time);

        switch($result_updata){
            case 1:
                $this->success('修改成功','/Daixu/draft');
                break;
            case 2:
                $this->error('修改失败，如有疑问，请联系官方邮箱：daixu8@cina.cn','/Daixu/draft');
                break;
            default:
                $this->error('修改失败，如有疑问，请联系官方邮箱：daixu8@cina.cn','/Daixu/draft');
                break;
        }
    }
}