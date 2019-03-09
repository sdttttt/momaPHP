<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/9
 * Time: 12:16
 */

namespace app\lib\filter\super;


use app\lib\filter\Filter;

class ThemeFilter extends Filter
{
    protected $rule = [
        'theme' => 'require',
        'theme.id' => 'integer',
    ];

    protected $message = [
        'theme.require' => '你传过来的是空的，我怎么存？',
        'theme.id.integer' => 'ID必须为整数',
    ];
}