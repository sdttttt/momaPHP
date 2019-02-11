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
    public $message = '只有登录才能访问，请重新进入小程序';
    public $err_code = 20002;
    public $code = 403;
}