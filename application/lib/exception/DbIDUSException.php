<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 22:08
 */

namespace app\lib\exception;


class DbIDUSException extends BaseException
{
    public $message = '';
    public $err_code = 00002;
    public $code = 503;
}