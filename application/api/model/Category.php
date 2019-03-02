<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/2
 * Time: 17:20
 */

namespace app\api\model;


class Category extends BaseModel
{
    public function product(){
        return $this->hasMany('Product','category_id','id');
    }
}