<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/11
 * Time: 15:12
 */

namespace app\lib\exception;


class FatherException extends BaseException
{
    public $message = "没有权限访问这里哦";
    public $err_code = 88888;
    public $code = 403;
}