<?php
/**
 * Created by PhpStorm.
 * User: CLY
 * Date: 2016/8/4
 * Time: 18:03
 */

namespace Home\Model;
use Think\Model;

class TarticleAddModel extends Model
{
    protected $trueTableName = 'tarticle';

    public function add_tarticle($tarticle_article,$tarticle_continue,$tarticle_name){
        $where['tarticle_article'] = $tarticle_article;
        $old_continue = $this->where($where)->getField('tarticle_continue');

        //如果能搜索到说明已经有这个文章了，则将以前的续写数和现在的续写数加起来
        if($old_continue){
            $add['tarticle_continue'] = $tarticle_continue+$old_continue;
        }else{
            $add['tarticle_continue'] = $tarticle_continue;
        }

        $add['tarticle_article'] = $tarticle_article;
        $add['tarticle_name'] = $tarticle_name;
        $add['tarticle_date'] = date('Y-m-d');

        $result = $this->add($add);

        if($result){
            return 1;
        }else{
            return 2;
        }
    }
}