<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/5
 * Time: 20:50
 */

namespace app\api\model;


class Order extends BaseModel
{
    public function user(){
        return $this->belongsToMany('User','uid','id');
    }
}