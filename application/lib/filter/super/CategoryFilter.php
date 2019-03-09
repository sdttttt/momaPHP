<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 22:34
 */

namespace app\lib\filter\super;


use app\lib\filter\Filter;

class CategoryFilter extends Filter
{
    protected $rule = [
        'category' => 'require',
        'category.id' => 'integer',
    ];

    protected $message = [
        'category.require' => '你传过来的是空的，我怎么存？',
        'category.id.integer' => '类型ID必须为整数',
    ];
}