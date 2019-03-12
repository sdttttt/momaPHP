<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/12
 * Time: 17:23
 */

namespace app\lib\exception;


class GizwitsException extends BaseException
{
    public $message = '';
    public $code = 505;
    public $err_code = 99999;
}