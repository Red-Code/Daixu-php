<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/5/28
 * Time: 19:00
 */
namespace Home\Controller;
use Org\Util\String;
use Think\Controller;
use Think\Exception;

class RankingController extends Controller {
    private $key_app;
    private $obj_redis;

    /*
     * 作用：获取android端传过来的键值，连接redis
     */
    public function __construct(){
        parent::__construct();

        $this->key_app = I('param.key_app');

        $this->obj_redis = public_connect_redis();
    }

    /*
     * 作用：每天0点执行，将0点前的今日排名的所有信息以字符串的形式（里面是数组）存入本周用户排名表。清除0点前的今日用户排名信息。
     * 传出参数：无
     */
    public function people_today_updata(){
        $table_tuser = M('tuser');
        $table_uweek = M('uweek');

        //用getField的方式查询，每一个用户信息数组的键名就是该用户的id
        $select_tuser = $table_tuser->getField('tuser_user,tuser_publish,tuser_date');

        $add_uweek['uweek_date'] = date('Y-m-d');
        $add_uweek['uweek_info'] = json_encode($select_tuser);

        $result = $table_uweek->add($add_uweek);

        if(!$result){
            public_log('Ranking->people_today_updata->今日排名没有写入本周用户排名表');
        }

        $sql = 'delete from `tuser`';
        $table_tuser->execute($sql);
    }

    /*
     * 作用：每天0点执行，将0点前的今日排名存入本周文章排名表。清除0点前的今日文章排名信息。
     * 传出参数：无
     */
    public function article_today_updata(){
        $table_tarticle = M('tarticle');
        $table_aweek = M('aweek');

        $select_tarticle = $table_tarticle->getField('tarticle_article,tarticle_continue,tarticle_name,tarticle_date');

        $add_aweek['aweek_date'] = date('Y-m-d');
        $add_aweek['aweek_info'] = json_encode($select_tarticle);

        $result = $table_aweek->add($add_aweek);

        if(!$result){
            public_log('Ranking->article_today_updata->今日排名没有写入本周文章排名表');
        }

        $sql = 'delete from `tarticle`';
        $table_tarticle->execute($sql);
    }

    /*
     * 作用：每周星期一的0点执行，将上周的排名情况计算后存入缓存，再存一份到backups中。之后清除本周用户排行。
     * 传出参数：无
     * redis定义：cache_people_week（本周用户前十名排行信息）
     */
    public function people_week_updata(){
        $table_uweek = M('uweek');

        $select_array_uweek = $table_uweek->select();

        //应为发布的信息是json格式，所以需要转化一下
        foreach($select_array_uweek as &$array){
            $array["uweek_info"] = json_decode($array["uweek_info"],true);
        }


        //查询出来的大数组里包含7天的信息，循环6次
        //$select_array_uweek是一个四维数组，第一维是天数，第二维是周排名表的结构（我们只需要["uweek_info"]），第三维是用户id，第四维是用户的具体信息
        for($i=0;$i<6;$i++){
            //将1天的信息迭代,由于我的储存格式的关系，这个$k就是用户id，他所对应的数组的["uweek_info"]就是这个用户的发布信息
            foreach($select_array_uweek[$i]["uweek_info"] as $k=>$arrar_former){
                //前一天的键值名（用户id）如果在后一天的键值名中也存在，则将这两天该用户的发布数相加，并将相加所得保存到后一天"该用户"的发布数上
                if(isset($select_array_uweek[$i+1]["uweek_info"][$k])){
                    $sum_publish = $select_array_uweek[$i]["uweek_info"][$k]['tuser_publish']+$select_array_uweek[$i+1]["uweek_info"][$k]['tuser_publish'];
                    $select_array_uweek[$i+1]["uweek_info"][$k]['tuser_publish'] = $sum_publish;
                }
            }

            //把第一天有而第二天没有的用户信息，发送给第二天，这样现在第二天数组就拥有了两天内所有的用户信息，并且两天都发布过消息的用户的发布数也合并了
            $select_array_uweek[$i+1]["uweek_info"] = $select_array_uweek[$i+1]["uweek_info"]+$select_array_uweek[$i]["uweek_info"];//要保证是第二天加第一天，这样同样的用户信息，第二天会覆盖第一天。
        }
        $array_rnak_result = array();//用来放置排序后的数组结果

        //$select_array_uweek[6]['uweek_info']是全部的信息，foreach后，每次会迭代一个用户的信息
        foreach($select_array_uweek[6]['uweek_info'] as $value_select_array_uweek){

            //$value_array_rnak_result是排序后的各个人物信息组合而成的数组，foreach后，$value_array_rnak_result是具体某人的信息
            for($m=0;$m<10;$m++){
                if($array_rnak_result[$m]['tuser_publish'] <= $value_select_array_uweek['tuser_publish']){
                    $temporary = $array_rnak_result[$m];
                    $array_rnak_result[$m] = $value_select_array_uweek;

                    //将$array_rnak_result数组全部后移一位
                    for($n=$m+1;$n<10;$n++){
                        $temporary2 = $array_rnak_result[$n];
                        $array_rnak_result[$n] = $temporary;
                        $temporary = $temporary2;
                    }
                    break;
                }
            }
        }

        //存储一份上周排名到backups中
        $rank_week_backups = fopen("Persistence/rank_week_backups","a");
        $txt = date('Y-m-d H:i:s',time()).'用户本周排行:'.serialize($select_array_uweek);
        fwrite($rank_week_backups,$txt."\r\n");
        fclose($rank_week_backups);

        //将排名情况存储到缓存中
        public_save_redis($this->obj_redis,'cache_people_week',$array_rnak_result);

        $sql = 'delete from `uweek`';
        $table_uweek->execute($sql);

    }

    /*
     * 作用：每周星期一的0点执行，将上周的排名情况计算后存入缓存，再存一份到backups中。之后清除本周文章排行。
     * 传出参数：无
     * redis定义：cache_article_week（本周文章前十名排行信息）
     */
    public function article_week_updata(){
        $table_aweek = M('aweek');

        $select_array_aweek = $table_aweek->select();

        foreach($select_array_aweek as &$array){
            $array["aweek_info"] = json_decode($array["aweek_info"],true);
        }

        for($i=0;$i<6;$i++){
            foreach($select_array_aweek[$i]["aweek_info"] as $k=>$arrar_former){
                if(isset($select_array_aweek[$i+1]["aweek_info"][$k])){
                    $sum_publish = $select_array_aweek[$i]["aweek_info"][$k]['tarticle_continue']+$select_array_aweek[$i+1]["aweek_info"][$k]['tarticle_continue'];
                    $select_array_aweek[$i+1]["aweek_info"][$k]['tarticle_continue'] = $sum_publish;
                }
            }

            $select_array_aweek[$i+1]["aweek_info"] = $select_array_aweek[$i+1]["aweek_info"]+$select_array_aweek[$i]["aweek_info"];
        }
        $array_rnak_result = array();

        foreach($select_array_aweek[6]['aweek_info'] as $value_select_array_aweek){

            //$value_array_rnak_result是排序后的各个人物信息组合而成的数组，foreach后，$value_array_rnak_result是具体某人的信息
            for($m=0;$m<10;$m++){
                if($array_rnak_result[$m]['tarticle_continue'] <= $value_select_array_aweek['tarticle_continue']){
                    $temporary = $array_rnak_result[$m];
                    $array_rnak_result[$m] = $value_select_array_aweek;

                    //将$array_rnak_result数组全部后移一位
                    for($n=$m+1;$n<10;$n++){
                        $temporary2 = $array_rnak_result[$n];
                        $array_rnak_result[$n] = $temporary;
                        $temporary = $temporary2;
                    }
                    break;
                }
            }
        }

        //存储一份上周排名到backups中
        $rank_week_backups = fopen("Persistence/rank_week_backups","a");
        $txt = date('Y-m-d H:i:s',time()).'文章本周排行:'.serialize($select_array_aweek);
        fwrite($rank_week_backups,$txt."\r\n");
        fclose($rank_week_backups);

        //将排名情况存储到缓存中
        public_save_redis($this->obj_redis,'cache_article_week',$array_rnak_result);

        $sql = 'delete from `aweek`';
        $table_aweek->execute($sql);
    }

    /*
     * 作用：从redis中查询出本周用户排名情况，如果redis中没有，则查询当前用户排名顶替并将异常写入log。
     * 传出参数：本周用户排名情况。
     */
    public function people_week_select(){
        try{
            @$cache_people_week = $this->obj_redis->get('cache_people_week');
        }catch (\Exception $e){
            public_log('Ranking->people_week_select->无法连接redis');

            $people_all_rank = $this->people_all_updata();

            return public_send(2,$this->key_app,$people_all_rank);
        }

        return public_send(1,$this->key_app,$cache_people_week);
    }

    /*
     * 作用：从redis中查询出本周用户排名情况，如果redis中没有，则查询当前用户排名顶替并将异常写入log。
     * 传出参数：本周文章排名情况。
     */
    public function article_week_select(){
        try{
            @$cache_article_week = $this->obj_redis->get('cache_article_week');
        }catch (\Exception $e){
            public_log('Ranking->article_week_select->无法连接redis');

            $article_all_rank = $this->article_all_updata();

            return public_send(2,$this->key_app,$article_all_rank);
        }

        return public_send(1,$this->key_app,$cache_article_week);
    }
}
