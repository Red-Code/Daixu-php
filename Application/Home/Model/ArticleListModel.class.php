<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 2:32
 */

namespace Home\Model;
use Think\Model;

class ArticleListModel extends Model{
    protected $trueTableName = 'article';
    protected $app_key;
    protected $app_start_num;//android端，从第几行开始查询数据
    protected $app_all_num = 10;//android端，一共查询多少条

    /*
     * 作用：获取android端的键值
     * 传入参数：$app_key（android端键值）,$app_start_num（从第几行开始查询数据）
     * 传出参数：当前对象
     */
    public function get_app_param($app_key,$app_start_num){
        $this->app_key = $app_key;
        $this->app_start_num = $app_start_num;

        return $this;
    }

    //查询出当前所有文章的列表
    public function all_list_select(){
        $where_article_select=null;
        $order_article_select='article_update desc';

        $result_all_list = $this->list_select($where_article_select,$order_article_select);

        return $result_all_list;
    }

    //根据具体情况分类的查出所有文章列表
    public function classify_list_select($get_article_classify,$get_article_mode,$get_article_order){
        switch($get_article_classify){
            case 1:$where_article_select['article_classify']='1';
                break;
            case 2:$where_article_select['article_classify']='2';
                break;
            case 3:$where_article_select['article_classify']='3';
                break;
            case 4:$where_article_select['article_classify']='4';
                break;
            case 5:$where_article_select['article_classify']='5';
                break;
            default:
                break;
        }
        switch($get_article_mode){
            case 1:$where_article_select['article_mode']='1';
                break;
            case 2:$where_article_select['article_mode']='2';
                break;
            case 3:$where_article_select['article_mode']='3';
                break;
            case 4:$where_article_select['article_fine']='2';
                break;
            default:
                break;
        }
        switch($get_article_order){
            case 1:$order_article_select='article_update desc';
                break;
            case 2:$order_article_select='article_total desc';
                break;
            default:$order_article_select='article_update desc';
                break;
        }

        $list_result = $this->list_select($where_article_select,$order_article_select);

        return $list_result;
    }

    /*
     * 作用：获取用户参与的文章
     * 传入参数：user_id（用户id），article_type（默认为所有参与的，1为发出的文章，2为完结，3为回复的，4为原创帖）
     * 传出参数：array(article_type,文章数组)
     */
    public function join_list_select($get_user_id,$get_article_type){
        switch($get_article_type){
            case 1:
                $where_publish_select['article_author'] = $get_user_id;
                $order_publish_select = 'article_publish desc';

                $result_publish = $this->list_select($where_publish_select,$order_publish_select);

                return public_send(2,$this->key_app,array($get_article_type,$result_publish[0],$result_publish[1]));
                break;
            case 2:
                $where_publish_select['article_author'] = $get_user_id;
                $where_publish_select['article_end'] = '2';
                $order_publish_select = 'article_publish desc';

                $result_publish = $this->list_select($where_publish_select,$order_publish_select);

                return public_send(2,$this->key_app,array($get_article_type,$result_publish[0],$result_publish[1]));
                break;
            case 3:
                $table_continue = M('continue');
                $where_publish_select['continue_author'] =$get_user_id;

                //查询出用户参与的文章id
                $result_join_article = $table_continue->where($where_publish_select)->distinct(true)->field('continue_head')->select();
                $where_string = '';//用来装文章详情查询的条件语句
                $order_publish_select = 'article_update desc';//文章详情查询的排序语句
                foreach($result_join_article as $one_article_id){
                    $where_string = $where_string.$one_article_id["continue_head"];
                    if(next($result_join_article)){//如果后面还有文章id，就加一个or的条件语句
                        $where_string.' or ';
                    }
                }
                $result_publish = $this->list_select($where_string,$order_publish_select);

                return public_send(2,$this->key_app,array($get_article_type,$result_publish[0],$result_publish[1]));
                break;
            case 4:
                $where_publish_select['article_author'] = $get_user_id;
                $where_publish_select['article_mode'] = '1';
                $order_publish_select = 'article_update desc';

                $result_publish = $this->list_select($where_publish_select,$order_publish_select);

                return public_send(2,$this->key_app,array($get_article_type,$result_publish[0],$result_publish[1]));
                break;
            default:
                $where_publish_select['article_author'] = $get_user_id;
                $order_publish_select = 'article_publish desc';

                $result_publish = $this->list_select($where_publish_select,$order_publish_select);

                return public_send(2,$this->key_app,array($get_article_type,$result_publish[0],$result_publish[1]));
                break;
        }
    }

    /*
     * 作用：查询出文章展示列表的信息
     * 传入参数：$where_article_select（查询条件），$order_article_select（排序规则，默认按更新时间排）
     * 传出参数：$select_article_list（总信息），$obj_show（对应的分页类）
     */
    public function list_select($where_article_select,$order_article_select=''){
        //判断请求时从哪发出的
        if($this->app_key=="1"){
            $select_article_list = $this->where($where_article_select)->order($order_article_select)->limit($this->app_start_num . ',' . $this->app_all_num)->select();
            $select_article_list = public_user_more($select_article_list, 'article_author');
            $obj_show = $this->app_start_num;
        }else{
            $obj_page = public_getpage($this, $where_article_select, 9);

            $obj_show = $obj_page->show();// 分页显示输出

            $select_article_list = $this->where($where_article_select)->order($order_article_select)->limit($obj_page->firstRow . ',' . $obj_page->listRows)->select();
            $select_article_list = public_user_more($select_article_list, 'article_author');
        }

        foreach ($select_article_list as &$value_sum_article) {
            //查询出文章类型，将数字替换成文字
            switch ($value_sum_article['article_classify']) {
                case 1:
                    $value_sum_article['article_classify'] = '恐怖悬疑';
                    break;
                case 2:
                    $value_sum_article['article_classify'] = '都市言情';
                    break;
                case 3:
                    $value_sum_article['article_classify'] = '仙侠玄幻';
                    break;
                case 4:
                    $value_sum_article['article_classify'] = '武侠古风';
                    break;
                case 5:
                    $value_sum_article['article_classify'] = '其他续写';
                    break;
            }

            //如果文章一楼内容大于360个字符串，则只显示360个字符串
            if (strlen($value_sum_article['article_content']) > 350) {
                $value_sum_article['article_content'] = mb_strcut($value_sum_article['article_content'], 0, 350, "utf-8") . "...";
            }
        }

        if($this->app_key=="1"){
            $json_result = public_change_android_symbol(json_encode($select_article_list));
        }else{
            $json_result = public_change_symbol(json_encode($select_article_list));
        }

        $result_article_list = json_decode($json_result, true);

        return public_send(2,$this->app_key,array($result_article_list, $obj_show));
    }
}