<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/9
 * Time: 13:21
 */

namespace app\lib\filter\super;


use app\lib\filter\Filter;

class ThemeItemFilter extends Filter
{
    protected $rule = [
        'themeitem' => 'require',
        'themeitem.id' => 'integer',
        'themeitem.themeid' => 'integer',
        'themeitem.imgid' => 'integer'

    ];
    protected $message = [
        'themeitem.require' => '你传过来的是空的，我怎么存？',
        'themeitem.id.integer' => 'id必须为整数',
        'themeitem.themeid.integer' => 'themeid必须为整数',
        'themeitem.imgid.integer' => 'imgid必须为整数',
    ];
}