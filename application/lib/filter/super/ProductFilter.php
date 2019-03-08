<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 17:54
 */

namespace app\lib\filter\super;


use app\lib\filter\Filter;

class ProductFilter extends Filter
{
    protected $rule = [
        'product.id' => 'integer',
        'product.name' => 'require',
        'product.price' => 'require|number',
        'product.stock' => 'require|integer',
        'product.info' => 'require',
        'product.categoryid' => 'require|integer',
        'product.imgid' => 'require|integer'
    ];

    protected $message = [
        'product.id.integer' => 'ID必须为整数',
        'product.name.require' => '商品名不能为空',
        'product.price.require' => '价格不能为空',
        'product.price.number' => '价格必须是数字',
        'product.stock.require' => '库存不能为空',
        'product.stock.integer' => '库存必须为整数',
        'product.categoryid.require' => '商品类型ID不能为空',
        'product.categoryid.integer' => '商品类型ID必须为整数',
        'product.imgid.require' => '图片ID不能为空',
        'product.imgid.integer' => '图片ID必须为整数',
    ];
}