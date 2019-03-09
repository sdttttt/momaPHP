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

        !array_key_exists('name',$product) ?:
            $model->data['name'] = $product['name'];
        !array_key_exists('price',$product) ?:
            $model->data['price'] = $product['price'];
        !array_key_exists('stock',$product) ?:
            $model->data['stock'] = $product['stock'];
        !array_key_exists('info',$product) ?:
            $model->data['info'] = $product['info'];
        !array_key_exists('categoryid',$product) ?:
            $model->data['category_id'] = $product['categoryid'];
        !array_key_exists('imgid',$product) ?:
            $model->data['img_id'] = $product['imgid'];

        return $model->save();
    }
}