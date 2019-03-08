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
        'banneritem.id' => 'integer',
        'banneritem.bannerid' => 'require|integer',
        'banneritem.imgid' => 'require|integer'
    ];

    protected $message = [
        'banneritem.id.integer' => 'id必须为正整数',
        'banneritem.bannerid.require' => 'bannerid不能为空',
        'banneritem.bannerid.integer' => 'bannerid必须为正整数',
        'banneritem.imgid.require' => 'imgid必须为正整数',
        'banneritem.imgid.integer' => 'imgid不能为空'
    ];

}