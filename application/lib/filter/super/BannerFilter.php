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
        'banner' => 'require',
        'banner.id' => 'integer',
        'banner.name' => 'string'
    ];

    protected $message = [
        'banner.require' => '你传过来的是空的，我怎么存？',
        'banner.id.integer' => 'id必须为整数',
        'banner.name.string' => 'name必须是字符串'
    ];
}