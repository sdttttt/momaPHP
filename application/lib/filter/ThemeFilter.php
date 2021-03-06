<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 20:44
 */

namespace app\lib\filter;


class ThemeFilter extends Filter
{
    protected $rule = [
        'id' => 'require|isIntegerNumber'
    ];

    protected $message = [
        'id.require' => '参数不能为空',
        'id.isIntegerNumber' => 'id必须是正整数'
    ];
}