<?php
namespace Home\Controller;
use Think\Controller;

//Web显示视图控制器
class DaixuController extends Controller {

	private $user_id;
	/*
	 * 作用：验证是否登录
	 * 传入参数：cookie
	 * 传出参数：用户信息
	 */
	public function __construct(){
		parent::__construct();

		$this->user_id = cookie('user_id');

		if($this->user_id){
			$D_UserInfo = D('UserInfo');
			$D_NoticeSelect = D('NoticeSelect');

			$select_user_info = $D_UserInfo->select_info($this->user_id);//查询用户信息
			$select_notice_num = $D_NoticeSelect->notice_select($this->user_id)->notice_new_num();//用户的未读消息数，如果为0就代表无消息

			$this->assign('login_info',$select_user_info[0]);
			$this->assign('notice_news_num',$select_notice_num);
		}
	}

	//注册视图展示
	public function view_register(){
		$this->display();
	}

	//登录视图展示
	public function action_login(){
		$this->display();
	}

	//首页视图展示
	public function homepage(){
		$D_AdvRoll = D('AdvRoll');
		$D_ArticleList = D('ArticleList');
		$D_UserRank = D('UserRank');
		$D_TuserSelect = D('TuserSelect');
		$D_TarticleSelect = D('TarticleSelect');

		$roll_select = $D_AdvRoll->roll_select();//轮播图查询
		$select_nine_article = $D_ArticleList->all_list_select();//九篇文章
		$D_UserRank->change_num(4);
		$select_four_user = $D_UserRank->people_all_select();//四个推荐作者

		$D_TuserSelect->change_num(5);
		$people_today_select = $D_TuserSelect->select_tuser();//今日作者排名
		$article_today_select = $D_TarticleSelect->select_tarticle();//今日文章排名

		$this->assign('roll',$roll_select);
		$this->assign('select_nine_article',$select_nine_article[0]);
		$this->assign('select_four_user',$select_four_user);
		$this->assign('today_time',date('m-d'));//今日时间
		$this->assign('people_today_select',$people_today_select);
		$this->assign('article_today_select',$article_today_select);
		$this->display();
	}

	//分类视图展示
	public function classify(){
		$get_article_classify = I('param.article_classify');//1为恐怖悬疑，2为都市言情，3为玄幻，4为古风，5为其他
		$get_article_mode = I('param.article_mode');//1为个人创作，2为抢接续写，3为自由续写，4为精品
		$get_article_order = I('param.article_order');//1为最新，2为最热

		$D_ArticleList = D('ArticleList');
		$select_article_list = $D_ArticleList->classify_list_select($get_article_classify,$get_article_mode,$get_article_order);
		$select_article_classify = array($get_article_classify,$get_article_mode,$get_article_order,$select_article_list[0],$select_article_list[1]);

		$D_TarticleSelect = D('TarticleSelect');
		$article_today_select = $D_TarticleSelect->select_tarticle();

		$this->assign('article_today_select',$article_today_select);//今日文章排名
		$this->assign('article_classify',$select_article_classify[0]);// 分类
		$this->assign('article_mode',$select_article_classify[1]);// 模式
		$this->assign('article_order',$select_article_classify[2]);// 排序
		$this->assign('select_article_list',$select_article_classify[3]);// 查询结果
		$this->assign('obj_page',$select_article_classify[4]);// 赋值分页输出

		$this->display();
	}

	//文章页的展示
	public function article(){
		$id_article = I('param.article_id');
		$get_draft_content = I('param.draft_content');
		$get_change_draft = public_change_symbol($get_draft_content);

		$D_ArticleInfo = D('ArticleInfo');
		$select_article = $D_ArticleInfo->select_article($id_article);

		$article_first = public_user_more($select_article[0][0],'article_author');
		$article_content = public_user_more($select_article[1],'continue_author');

		/*
		 * 作用：（给前端传递一个抢接状态信息，控制页面展示）根据传入的参数判断抢接状态，并传出参数。实现步骤：查询redis里面有没有这篇文章的抢接值，如果没有表示可以接龙
		 * 传入参数：user_id（当前用户id），文章id，
		 * 传出参数：1表示没有被人抢,2表示你正在续写阶段,3表示已经被别人抢了,4表示被禁言了
		 */
		$user_id = $this->user_id;
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

		$this->assign('redis_time',round($redis_time/1000));//抢接用户的剩余时间
		$this->assign('article_id',$article_id);
		$this->assign('draft_content',$get_change_draft);
		$this->assign('article_rap',$article_rap);
		$this->assign('article_first',$article_first[0]);
		$this->assign('article_content',$article_content);

		$this->display();
	}

	//排名视图展示
	public function ranking(){
		$get_type_key = I('param.type_key');//1为用户排行，2为作品排行
		$get_mode_key = I('param.mode_key');//1为今日，2为本周，3为全部
		$get_user_id = $this->user_id;

		switch($get_type_key){
			case 1:
				switch($get_mode_key){
					case 1:
						$D_TuserSelect = D('TuserSelect');
						$result_user = $D_TuserSelect->select_tuser();

						$this->assign('result_user',$result_user);
						break;
					case 2:
						break;
					case 3:
						$D_UserRank = D('UserRank');
						$result_user = $D_UserRank->people_all_select();

						$this->assign('result_user',$result_user);
						break;
					default:
						$D_TuserSelect = D('TuserSelect');
						$result_user = $D_TuserSelect->select_tuser();

						$this->assign('result_user',$result_user);
						break;
				}
				break;
			case 2:
				switch($get_mode_key){
					case 1:
						$D_TarticleSelect = D('TarticleSelect');
						$result_article = $D_TarticleSelect->select_tarticle();

						$this->assign('result_article',$result_article);
						break;
					case 2:
						break;
					case 3:
						$D_ArticleRank = D('ArticleRank');
						$result_article = $D_ArticleRank->select_tarticle();

						$this->assign('result_article',$result_article);
						break;
					default:
						$D_TarticleSelect = D('TarticleSelect');
						$result_article = $D_TarticleSelect->select_tarticle();

						$this->assign('result_article',$result_article);
						break;
				}
				break;
			default:
				$D_TuserSelect = D('TuserSelect');
				$result_user = $D_TuserSelect->select_tuser();

				$this->assign('result_user',$result_user);
				break;
		}

		$D_UserOwnerRank = D('UserOwnerRank');
		$select_uer_rank = $D_UserOwnerRank->select_owner_rank($get_user_id);

		$this->assign('select_uer_rank',$select_uer_rank);
		$this->assign('type_key',$get_type_key);
		$this->assign('mode_key',$get_mode_key);
		$this->display();
	}

	//发布视图展示
	public function publish(){
		if(!$this->user_id){
			$this->error('请登录');
		}
		$this->display();
	}

	//个人贴视图展示
	//个人中心比较特殊，由于这个页面要展示给别人，所以该页面的用户信息更具点击的用户而变，用户id为前端传过来
	public function personal(){
		$get_user_id = I('param.user_id');
		$get_article_type = I('param.article_type');

		$D_UserInfo = D('UserInfo');
		$D_ArticleList = D('ArticleList');
		$D_UserOwnerRank = D('UserOwnerRank');

		$select_user_info = $D_UserInfo->select_info($get_user_id);//用户信息
		$join_select = $D_ArticleList->join_list_select($get_user_id,$get_article_type);//用户参与的文章
		$select_uer_rank = $D_UserOwnerRank->select_owner_rank($get_user_id);

		$this->assign('select_uer_rank',$select_uer_rank);
		$this->assign('user_info',$select_user_info[0]);
		$this->assign('article_type',$join_select[0]);
		$this->assign('join_select',$join_select[1]);
		$this->assign('obj_page',$join_select[2]);// 赋值分页输出

		$this->display();
	}

	//个人中心资料视图
	public function data(){
		if(!$this->user_id){
			$this->error('请登录');
		}

		$D_UserOwnerRank = D('UserOwnerRank');
		$select_user_rank = $D_UserOwnerRank->select_owner_rank($this->user_id);//个人排名
		$this->assign('select_uer_rank',$select_user_rank);
		$this->display();
	}

	//个人中心草稿视图
	public function draft(){
		$get_draft_author = $this->user_id;
		if(!$get_draft_author){
			$this->error('请登录');
		}
		$get_draft_continue_type = '1';
		$get_draft_new_type = '2';

		$D_DraftSelect = D('DraftSelect');
		$D_UserOwnerRank = D('UserOwnerRank');

		$result_continue_draft = $D_DraftSelect->select_draft($get_draft_author,$get_draft_continue_type);
		$result_new_draft = $D_DraftSelect->select_draft($get_draft_author,$get_draft_new_type);
		$select_user_rank = $D_UserOwnerRank->select_owner_rank($this->user_id);//个人排名

		$this->assign('select_uer_rank',$select_user_rank);
		$this->assign('result_continue_draft',$result_continue_draft[0]);
		$this->assign('continue_draft_page',$result_continue_draft[1]);
		$this->assign('result_new_draft',$result_new_draft[0]);
		$this->assign('new_draft_page',$result_new_draft[1]);
		$this->display();
	}

	//个人中心草稿修改视图
	public function draft_edit(){
		$get_draft_id = I('param.draft_id');
		$get_draft_content = I('param.draft_content');

		$this->assign('draft_id',$get_draft_id);
		$this->assign('draft_content',$get_draft_content);
		$this->display();
	}

	//个人中心收藏视图
	public function collection(){
		$get_user_id = $this->user_id;
		if(!$get_user_id){
			$this->error('请登录');
		}

		$article_classify = I('param.article_classify');
		//1为恐怖悬疑，2为都市言情，3为玄幻，4为古风，5为其他，6为全部
		switch($article_classify){
			case 6:
				break;
			case 1:
				$int_classify = 1;
				break;
			case 2:
				$int_classify = 2;
				break;
			case 3:
				$int_classify = 3;
				break;
			case 4:
				$int_classify = 4;
				break;
			case 5:
				$int_classify = 5;
				break;
			default:
				break;
		}

		$D_CollectionSelect = D('CollectionSelect');
		$Dd_ArticleList = D('ArticleList');
		$D_UserOwnerRank = D('UserOwnerRank');

		$result_id_collection = $D_CollectionSelect->select_collection_id($get_user_id,$int_classify);//查询出收藏文章的id，接下来查询文章详细信息
		$result_where_collection = $D_CollectionSelect->select_collection_where($result_id_collection);//查询条件
		if($result_where_collection){
			$result_collection_list = $Dd_ArticleList->list_select($result_where_collection);//带有详细信息的收藏文章列表（第2项是分页类）
		}
		$select_user_rank = $D_UserOwnerRank->select_owner_rank($this->user_id);//个人排名

		$this->assign('select_uer_rank',$select_user_rank);
		$this->assign('result_collection_list',$result_collection_list[0]);
		$this->assign('result_collection_page',$result_collection_list[1]);
		$this->assign('article_classify',$int_classify);

		$this->display();
	}

	//个人中心成就视图
	public function achievement(){
		if(!$this->user_id){
			$this->error('请登录');
		}

		$D_UserOwnerRank = D('UserOwnerRank');
		$select_user_rank = $D_UserOwnerRank->select_owner_rank($this->user_id);//个人排名
		$this->assign('select_uer_rank',$select_user_rank);

		$this->display();
	}

	//个人中心设置视图
	public function set(){
		if(!$this->user_id){
			$this->error('请登录');
		}

		$D_UserOwnerRank = D('UserOwnerRank');
		$select_user_rank = $D_UserOwnerRank->select_owner_rank($this->user_id);//个人排名
		$this->assign('select_uer_rank',$select_user_rank);

		$this->display();
	}

	//个人中心消息视图
	public function notice(){
		if(!$this->user_id){
			$this->error('请登录');
		}

		$D_UserOwnerRank = D('UserOwnerRank');
		$select_user_rank = $D_UserOwnerRank->select_owner_rank($this->user_id);//个人排名
		$this->assign('select_uer_rank',$select_user_rank);

		$this->display();
	}
	
	//完结视图展示
	public function end(){
		$this->display();
	}

	//游戏视图展示（待定）
	public function game(){
		$this->display();
	}

	//App介绍视图展示
	public function app(){
		$this->display();
	}

	//商城视图展示
	public function shopping(){
		$this->display();
	}
}