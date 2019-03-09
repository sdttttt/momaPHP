<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/2
 * Time: 17:20
 */

namespace app\api\model;


class Category extends AbstractModel
{
    protected $autoWriteTimestamp = 'date';

    public function product(){
        return $this->hasMany('Product','category_id','id');
    }

    public function updateExtend($category){
        $model = $this->getUpdateModel($category);

        !array_key_exists('name',$category) ?: $model->name = $category['name'];

        return $model->save();
    }
}