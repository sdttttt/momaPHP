<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 17:42
 */

namespace app\lib\filter\super;


use app\lib\filter\Filter;

class BannerFilter extends Filter
{
    protected $rule = [
        'banner.id' => 'integer',
        'banner.name' => 'require'
    ];

    protected $message = [
        'banner.id.integer' => 'id必须为整数',
        'banner.name.require' => 'banner名不能为空'
    ];
}