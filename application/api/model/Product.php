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
    protected $autoWriteTimestamp = "date";

    public function image(){
        return $this->belongsTo("Image",'img_id','id');
    }

    public function category(){
        return $this->belongsTo("Category",'category_id','id');
    }

    public static function getOneProduct($id){
        return self::with('image')->select($id);
    }

    public function updateExtend($product){
        $model = $this->getUpdateModel($product);

        $model->name = $product['name'];
        $model->price = $product['price'];
        $model->stock = $product['stock'];
        $model->info = $product['info'];
        $model->category_id = $product['categoryid'];
        $model->img_id = $product['imgid'];

        return $model->save();
    }
}