<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/6/24
 * Time: 16:16
 */

/*
 * 作用：链接redis
 * 传入参数：无
 * 传出参数：$obj_redis(连接后的redis对象)
 */
function public_connect_redis(){
    $obj_redis = new \Redis();
    $obj_redis->connect('127.0.0.1',8970);//ip地址和端口号
    $obj_redis->auth('heikequsi690081');//密码
    return $obj_redis;
}

/*
 * 作用：将从redis中得到的数据发送给不同的设备。“存储在redis中的所有数据都是json格式”，所以直接从redis中提取的数据可直接发送给android端，但需要改为数组后才能发送给web端
 * 传入参数：$type（1为从redis得到的数据“是json”，2为从数据库得到的数据“是数组”）、$app_key（用于分辨请求设备，1为android端）、$content（发送内容）
 * 传出参数：android端是直接send，web端是return
 */
function public_send($type,$app_key,$content){
    if($type==1){
        if($app_key == "1"){
//            echo $content;
//            exit();
            return $content;
        }else{
            return json_decode($content,true);
        }
    }else{
        if($app_key == "1"){
//            echo json_encode($content);
//            exit();
            return json_encode($content);
        }else{
            return $content;
        }
    }
}

/*
 * 作用：由于数组不能直接传入redis，所以需要对传入的数据进行一个转换
 * 传入参数：redis对象，键值名，键值
 * 传出参数：存储结果
 */
function public_save_redis($obi_redis,$value_name,$value_content,$time=null){
    if(is_array($value_content)){
        $value_content = json_encode($value_content);
    }

    $result_set_redis = $obi_redis->set($value_name,$value_content,$time);

    return $result_set_redis;
}

/*
 * 作用：将异常写入自定义的log中
 * 传入参数：$content（异常的描述）
 * 传出参数：无
 */
function public_log($content){
    $my_log = fopen("Persistence/my_log","a");
    $txt = date('Y-m-d h:i:s',time()).':'.$content;
    fwrite($my_log,$txt."\r\n");
    fclose($my_log);
}

/*
 * 作用：上传图片
 * 传入参数：$path（上传图片的子目录,格式应填写Public目录下的目录，如：daixu_picture/adv/）
 * 传出参数：$info（上传后的反馈信息）,
 *           $info['图片键值名']，这是一个包含该图信息的数组，$info['图片键值名']['savename']是文件名
 */
function public_upload($path){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =     './Public/'; // 设置附件上传根目录
    $upload->savePath  =     $path; // 设置附件上传（子）目录
    $upload->autoSub   =     false;//不让其自动创建时间文件夹
    $info   =   $upload->upload();// 上传文件
    return $info;
}

/*
 * 作用：传入一个二维数组，自动根据里面的用户id，将用户的详细信息查询出来，并装入相应的数组里。
 * 传入参数：$array（含有用户id的二维目标数组），$value_user_id（在目标数组的第二维中，用户id的字段名）
 * 传出参数：含有：用户名，用户头像，的数组
 */
function public_user_more($array,$value_user_id){
    $table_user = M('user');

    foreach($array as &$value_sum) {
        //查询条件，将user表中的用户id字段与“在目标数组的第二维中的用户id”相对应。
        $where_user_info['user_id'] = $value_sum["$value_user_id"];

        $select_user_info = $table_user->where($where_user_info)->field('user_id,user_name,user_img,user_rank')->select();

        $value_sum['user_id'] = $select_user_info[0]['user_id'];
        $value_sum['user_name'] = $select_user_info[0]['user_name'];
        $value_sum['user_img'] = $select_user_info[0]['user_img'];
        $value_sum['user_rank'] = $select_user_info[0]['user_rank'];
    }

    return $array;
}

/**
 * 作用：返回分页对象
 * 传入参数：$m（数据库模型），$where（查询条件）,$pagesize（每页查询条数）
 * 传出参数：$p（分页类）
 */
function public_getpage(&$m,$where,$pagesize=10){
    $m1=clone $m;//浅复制一个模型
    $count = $m->where($where)->count();//连惯操作后会对join等操作进行重置
    $m=$m1;//为保持在为定的连惯操作，浅复制一个模型
    $p=new Think\Page($count,$pagesize);
    $p->lastSuffix=false;
    $p->setConfig('header','<p class="rows">共<b>%TOTAL_ROW%</b>条记录  第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</p>');
    $p->setConfig('prev','上一页');
    $p->setConfig('next','下一页');
    $p->setConfig('last','末页');
    $p->setConfig('first','首页');
    $p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
    $p->parameter=I('get.');
    $m->limit($p->firstRow,$p->listRows);
    return $p;
}

/*
 * 作用：将长的字符串截取成想要的长度
 * 传入参数：$get_string（未修改的字符串）,$start_length（初始长度）,$end_length（结尾长度）
 * 传出参数：截取后的字符串
 * 备注：一般文章的展示框所能容纳的文章一楼长度为350
 */
function public_word_controller($get_string,$start_length,$end_length){

}

/*
 * 作用：将文章数组传经来，将里面的数字替换为文字。
 * 传入参数：未修改的数组
 * 传出参数：修改完的数组
 */
function public_get_classify_word($array_article){
    foreach($array_article as &$value_sum_article) {
        //查询出文章类型，将数字替换成文字
        switch($value_sum_article['article_classify']){
            case 1:
                $value_sum_article['article_classify_num'] = '1';
                $value_sum_article['article_classify'] = '恐怖悬疑';
                break;
            case 2:
                $value_sum_article['article_classify_num'] = '2';
                $value_sum_article['article_classify'] = '都市言情';
                break;
            case 3:
                $value_sum_article['article_classify_num'] = '3';
                $value_sum_article['article_classify'] = '仙侠玄幻';
                break;
            case 4:
                $value_sum_article['article_classify_num'] = '4';
                $value_sum_article['article_classify'] = '武侠古风';
                break;
            case 5:
                $value_sum_article['article_classify_num'] = '5';
                $value_sum_article['article_classify'] = '其他续写';
                break;
        }

        switch($value_sum_article['article_mode']){
            case 1:
                $value_sum_article['article_mode_num'] = '1';
                $value_sum_article['article_mode'] = '个人创作';
                break;
            case 2:
                $value_sum_article['article_mode_num'] = '2';
                $value_sum_article['article_mode'] = '抢接续写';
                break;
            case 3:
                $value_sum_article['article_mode_num'] = '3';
                $value_sum_article['article_mode'] = '自由续写';
                break;
        }
    }

    return array($array_article);
}

/*
 * 作用：将带有html转义字符的字符串转化为正常字符串。
 * 传入参数：字符串
 * 传出参数：转换完的字符串
 */
function public_change_symbol($string_symbol){
    $array_old_replace =array('&lt;','&gt;','&nbsp;','&quot;','&amp;');
    $array_new_replace =array('<','>',' ',"'",'&');

    $result_string = str_replace($array_old_replace,$array_new_replace,$string_symbol);

    return $result_string;
//
//    return $string_symbol;
}

/*
 * 作用：将带有html转义字符的字符串中的所有标签都去掉，只剩下单纯的字符串。
 * 传入参数：字符串
 * 传出参数：转换完的字符串
 */
function public_change_android_symbol($string_old){

    $string_old = preg_replace("/&lt;.*?&gt;/", "", $string_old);

    $array_old_replace =array('&amp;nbsp;');
    $array_new_replace =array('');
    $result_string = str_replace($array_old_replace,$array_new_replace,$string_old);

    return $result_string;

//    return $string_old;
}

/*
 * 作用：传入经验值，返回等级
 * 传入参数：$exp（经验值）
 * 传出参数：array(等级，距离下次升级所需经验值)
 */
function public_get_level($exp){
    if($exp==0){
        return array(0,$exp);
    }
    if($exp<20){
        return array(1,20-$exp);
    }
    if($exp<100){
        return array(2,100-$exp);
    }
    if($exp<150){
        return array(3,150-$exp);
    }
    if($exp<150){
        return array(4,150-$exp);
    }
    if($exp<220){
        return array(5,220-$exp);
    }
    if($exp<480){
        return array(6,480-$exp);
    }
    if($exp<780){
        return array(7,780-$exp);
    }
    if($exp<1130){
        return array(8,1130-$exp);
    }
    if($exp<1500){
        return array(9,1500-$exp);
    }
    if($exp<1900){
        return array(10,1900-$exp);
    }
    if($exp<2900){
        return array(11,2900-$exp);
    }
    if($exp<4400){
        return array(12,4400-$exp);
    }
    if($exp<6400){
        return array(13,1500-$exp);
    }
    if($exp<8900){
        return array(14,8900-$exp);
    }
    if($exp<18900){
        return array(15,18900-$exp);
    }
    if($exp<68900){
        return array(16,68900-$exp);
    }
    if($exp<168900){
        return array(17,168900-$exp);
    }else{
        return array(18,0);
    }
}

