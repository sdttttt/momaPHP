<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/5
 * Time: 21:16
 */

namespace app\lib\filter;


use app\lib\exception\FilterException;
use think\Validate;

class OrderFilter extends BaseFilter
{
    protected $rule = [
        'products' => 'checkProducts'
    ];

    protected $ruleProduct = [
        'id' => 'require|integer',
        'count' => 'require|integer'
    ];

    protected $message = [
        'id.require' => 'id 不能为空',
        'id.integer' => 'id 必须为整数',
        'count.require' => 'count 不能为空',
        'count.integer' => 'count 必须为整数'
    ];

    protected function checkProducts($value){
        if(empty($value)){
            throw new FilterException([
                'message' => '商品不允许为空'
            ]);
        }
        foreach ( $value as $product ){
            $this->checkProduct($product);
        }
        return true;
    }

    private function checkProduct($product){
        $validate = new Validate($this->ruleProduct);
        if( !$validate->check($product) ){
            throw new FilterException([
                'message' => $validate->getError()
            ]);
        }
    }



}