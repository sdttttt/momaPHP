<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/2
 * Time: 18:12
 */

namespace app\api\model;


class Product extends AbstractModel
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

        !array_key_exists('name',$product) ?: $model->name = $product['name'];
        !array_key_exists('price',$product) ?: $model->price = $product['price'];
        !array_key_exists('stock',$product) ?: $model->stock = $product['stock'];
        !array_key_exists('info',$product) ?: $model->info = $product['info'];
        !array_key_exists('categoryid',$product) ?: $model->category_id = $product['categoryid'];
        !array_key_exists('imgid',$product) ?: $model->img_id = $product['imgid'];

        return $model->save();
    }
}