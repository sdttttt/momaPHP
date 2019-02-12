<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/13
 * Time: 0:33
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $message = "";
    public $err_code = 30001;
    public $code = 404;
}