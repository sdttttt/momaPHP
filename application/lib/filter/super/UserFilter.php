<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/9
 * Time: 14:34
 */

namespace app\lib\filter\super;


use app\lib\filter\Filter;

class UserFilter extends Filter
{
    protected $rule = [
        'user' => 'require',
        'user.id' => 'integer',
        'user.wallet' => 'float'
    ];

    protected $message = [
        'user.require' => '你传过来的是空的，我怎么存？',
        'user.id.integer' => 'id必须为整数',
        'user.wallet.float' => '钱必须为浮点数'
    ];
}