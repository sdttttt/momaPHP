<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/11
 * Time: 14:06
 */

namespace app\lib\exception;


class SonException extends BaseException
{
    public $message = '只有普通用户才能访问这里';
    public $err_code = 20002;
    public $code = 403;
}