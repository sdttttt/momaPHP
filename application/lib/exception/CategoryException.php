<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 22:26
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $message = '类型获取错误';
    public $err_code = 00003;
    public $code = 405;
}