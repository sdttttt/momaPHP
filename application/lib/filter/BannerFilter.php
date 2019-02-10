<?php
namespace app\lib\filter;

class BannerFilter extends BaseFilter{
    protected $rule = [
        'id' => 'require|isIntegerNumber'
    ];

    protected $message = [
        'id.require' => '参数不能为空',
        'id.isIntegerNumber' => 'id必须是正整数'
    ];
}