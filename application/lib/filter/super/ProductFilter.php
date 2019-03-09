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
        'product' => 'require',
        'product.id' => 'integer',
        'product.price' => 'number',
        'product.stock' => 'integer',
        'product.categoryid' => 'integer',
        'product.imgid' => 'integer'
    ];

    protected $message = [
        'product.require' => '你传过来的是空的，我怎么存？',
        'product.id.integer' => 'ID必须为整数',
        'product.price.number' => '价格必须是数字',
        'product.stock.integer' => '库存必须为整数',
        'product.categoryid.integer' => '商品类型ID必须为整数',
        'product.imgid.integer' => '图片ID必须为整数',
    ];
}