<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 19:28
 */

namespace app\lib\exception;

class FilterException extends BaseException
{
    public $message = '';
    public $err_code = 10002;
    public $code = 403;
}