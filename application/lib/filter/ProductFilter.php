<?php
namespace app\lib\filter;

class ProductFilter extends BaseFilter{
    
    protected $rule = [
        'id' => 'require|isIntegerNumber'
    ];

    protected $message = [
        'id.require' => 'id 不能为空',
        'id.isIntegerNumber' => 'id 必须为整数'
    ];
}