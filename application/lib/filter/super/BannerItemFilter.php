<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 19:48
 */

namespace app\lib\filter\super;


use app\lib\filter\Filter;

class BannerItemFilter extends Filter
{
    protected $rule = [
        'banneritem' => 'require',
        'banneritem.id' => 'integer',
        'banneritem.bannerid' => 'integer',
        'banneritem.imgid' => 'integer'
    ];

    protected $message = [
        'banneritem.require' => '你传过来的是空的，我怎么存？',
        'banneritem.id.integer' => 'id必须为正整数',
        'banneritem.bannerid.integer' => 'bannerid必须为正整数',
        'banneritem.imgid.integer' => 'imgid不能为空'
    ];

}