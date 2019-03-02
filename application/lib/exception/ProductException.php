<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/2
 * Time: 18:20
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
    public $message = "找不到product";
    public $err_code = 10003;
    public $code = 404;
}