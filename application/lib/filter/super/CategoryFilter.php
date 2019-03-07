<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 22:34
 */

namespace app\lib\filter\super;


use app\lib\filter\BaseFilter;

class CategoryFilter extends BaseFilter
{
    protected $rule = [
        'category.id' => 'integer',
        'category.name' => 'require'
    ];

    protected $message = [
        'category.id.integer' => '类型ID必须为整数',
        'category.name.require' => '类别名不能为空'
    ];
}