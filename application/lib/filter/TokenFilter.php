<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 21:27
 */

namespace app\lib\filter;


class TokenFilter extends Filter
{
    protected $rule = [
        'code' => 'require'
    ];

    protected $message = [
        'code.require' => '没有code还想登录？做梦！！'
    ];
}