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
class AddController extends Controller {
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
     * 作用：注册,如果账户存在则不让注册,用户名相同也不能注册
     * 传入参数：账户名，用户名，密码
     * 传出参数：
     */
    public function register(){
        $user_account = I('param.user_account');
        $user_name = I('param.user_name');
        $user_password = I('param.user_password');

        $D_User_register = D('UserRegister');

        $result = $D_User_register->register($user_account,$user_name,$user_password);

        switch($result[0]){
            case 1:
                if($this->key_app == "1"){
                    echo "true";
                }else{
                    $this->success($result[1],'/Daixu/homepage');
                }
                break;
            case 2:
                if($this->key_app == "1"){
                    echo "false";
                }else{
                    $this->error($result[1]);
                }
        }
    }

    /*
     * 作用：上传轮播图，并将图片地址存入数据库，同时清除adv的redis缓存
     * 接收参数：adv_url（上传图片所对应的url的name值）
     * 传出参数：成功或失败反馈
     * 定义：adv_img（上传图片的name值）
     */
    public function roll_add(){
        $info = public_upload('daixu_picture/adv/');

        if(!$info['adv_img']) {
            $this->error('上传失败');
        }else{
            $adv_img='/Public/daixu_picture/adv/'.$info['adv_img']['savename'];//数据库中的存储地址
            $adv_url = I('param.adv_url');//获取轮播图所对应的地址

            $table_adv = M('adv');

            $add['adv_img']=$adv_img;
            $add['adv_url']=$adv_url;

            $result=$table_adv->add($add);

            if($result){
                $this->obj_redis->del('cache_adv');
                $this->success('添加成功');
            }else{
                $this->error('上传数据库失败');
            }
        }
    }

    /*
     * 作用：新建文章
     * 传入参数：article_name(文章名)、
                article_author（文章作者id）
                article_content（文章第一楼内容）
                article_rule（文章规则介绍）
                article_classify（文章所属类别）、
                article_mode（文章所属模式）、
                article_surface（封面图url）
     * 传出参数：无
     */
    public function add_article(){
        $article_name =I('param.article_name');
        $article_author = $this->now_user_id;
        $article_content =I('param.article_content');
        $article_rule =I('param.article_rule');
        $article_classify =I('param.article_classify');
        $article_mode =I('param.article_mode');
        $article_publish = date('Y-m-d H:i:s',time());
        $article_update = date('Y-m-d H:i:s',time());

        if($this->key_app=="1"){
            $target_path  = "./Public/daixu_picture/figure/";//服务器文件的存放路径
            $save_path = $target_path.basename( $_FILES['uploadedfile']['name']);//服务器的存放路径加文件名
            $db_path = "/Public/daixu_picture/figure/".basename( $_FILES['uploadedfile']['name']);//存放到数据库里的字段
            if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $save_path)) {
                $article_surface = $db_path;
            } else{
                echo "falese_img";
            }
        }else{
            $img_surface = public_upload('daixu_picture/figure/');
            if(!$img_surface){$this->error('上传封面失败');}
            $article_surface = '/Public/daixu_picture/figure/'.$img_surface['img_surface']['savename'];
        }

        $D_ArticleAdd = D('ArticleAdd');
        $result = $D_ArticleAdd->add_article($article_name,$article_author,$article_content,$article_rule,$article_classify,$article_mode,$article_publish,$article_update,$article_surface);

        switch($result){
            case 1:
                $D_UserExp = D('UserExp');
                $result_add_exp = $D_UserExp->add_exp($article_author,6);

                if($this->key_app=="1"){
                    if($result_add_exp == "2"){
                        echo "false";
                    }
                    echo "true";
                }else{
                    if($result_add_exp == "2"){
                        $this->error('经验值增长失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
                    }
                    $this->success('发布成功');
                }
                break;
            case 2:
                if($this->key_app=="1"){
                    echo "false";
                }else{
                    $this->error('创建失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
                }
                break;
        }
    }

    /*
     * 作用：接楼
     * 传入参数：article_id（文章id），
                continue_content（接楼内容），
                continue_author（接楼作者id），
                article_mode（文章所属类型），
                article_author（文章作者），
                continue_time（续写发布时间）,
                article_name（文章名），
                article_all_join（文章所有的参与者）
                article_total（文章总楼数）
     * 传出参数：array(1),（1为续写成功，2为续写失败）
     */
    public function add_continue(){
        $article_id = I('param.article_id');
        $continue_content = I('param.continue_content');
        $continue_author = $this->now_user_id;
        $article_mode = I('param.article_mode');//$article_mode中1为个人创作，2为抢接续写，3为自由续写
        $article_author = I('param.article_author');
        $continue_time = date('Y-m-d H:i:s',time());
        $article_name = I('param.article_name');

        if($this->key_app!="1"){
            $article_total = I('param.article_total');
            $article_json_join = $this->obj_redis->get("cache_article_join_$article_id");
            $this->obj_redis->delete("cache_article_join_$article_id");
            $article_all_join = json_decode($article_json_join,true);
        }


        $D_ArticleUpdata = D('ArticleUpdata');
        $D_ContinueAdd = D('ContinueAdd');
        $D_UserExp = D('UserExp');
        $D_NoticeAdd = D('NoticeAdd');
        $D_ArticleUpdata->updata_continue($article_id,$continue_time);
        $result = $D_ContinueAdd->get_key($this->key_app)->add_continue($article_id,$article_mode,$article_author,$continue_content,$continue_author,$continue_time);

        switch($result){
            case 1://续写成功
                if($this->key_app=="1"){
                    $D_UserExp->add_exp($continue_author,6);

                    //更新通知
                    $D_NoticeAdd->notice_receive_id($article_all_join)->notice_article_param($article_id,$article_name,$article_total+1,$continue_author)->notice_add('1');

                    echo "1";
                }else{
                    //增长经验值
                    $result_add_exp = $D_UserExp->add_exp($continue_author,6);
                    if($result_add_exp == 2){
                        $this->error('经验值增长失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
                    }

                    //更新通知
                    $D_NoticeAdd->notice_receive_id($article_all_join)->notice_article_param($article_id,$article_name,$article_total+1,$continue_author)->notice_add('1');

                    $this->success('续写成功');
                }
                break;
            case 2:
                if($this->key_app=="1"){
                    echo "2";
                }else{
                    $this->error('续写失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
                }
                break;
            default:
                if($this->key_app=="1"){
                    echo "2";
                }else{
                    $this->error('续写失败，如有疑问，请联系官方邮箱：daixu8@cina.cn');
                }

                break;
        }
    }


    //添加草稿
    public function add_draft(){
        $get_draft_content = I('param.draft_content');
        $get_draft_time = date('Y-m-d H:i:s',time());
        $get_draft_author = $this->now_user_id;
        $get_draft_type = I('param.draft_type');
        $get_draft_article = I('param.draft_article');
        $get_draft_article_name = I('param.draft_article_name');

        $D_DraftAdd = D('DraftAdd');

        $result_add = $D_DraftAdd->add_draft($get_draft_content,$get_draft_time,$get_draft_author,$get_draft_type,$get_draft_article,$get_draft_article_name);

        switch($result_add){
            case 1:
                $this->success('草稿创建成功','/Daixu/draft/');
                break;
            case 2:
                $this->error('草稿创建失败');
                break;
            default:
                $this->error('草稿创建失败');
                break;
        }
    }

    //收藏文章（ajax）
    public function collection_article(){
        $user_id = $this->now_user_id;
        $article_id = I('param.article_id');
        $article_classify = I('param.article_classify');
        $collection_time = date('Y-m-d H:i:s');

        $D_CollectionAdd = D('CollectionAdd');

        $result_add = $D_CollectionAdd->add_collection($user_id,$article_id,$article_classify,$collection_time);

        echo $result_add;
    }
}