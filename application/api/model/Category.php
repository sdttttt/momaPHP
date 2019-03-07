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
    protected $autoWriteTimestamp = 'date';

    public function product(){
        return $this->hasMany('Product','category_id','id');
    }

    public function updateCategory($category){
        if(isset($category['id']))
            $model = self::get($category['id']);
        else
            $model = new self();

        $model->name = $category['name'];

        return $model->save();
    }
}