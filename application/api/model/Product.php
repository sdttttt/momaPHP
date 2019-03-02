<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/2
 * Time: 18:12
 */

namespace app\api\model;


class Product extends BaseModel
{
    public function image(){
        return $this->belongsTo("Image",'img_id','id');
    }

    public function category(){
        return $this->belongsTo("Category",'category_id','id');
    }
}