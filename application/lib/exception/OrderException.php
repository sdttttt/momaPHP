<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/5
 * Time: 22:58
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $message = "";
    public $code = 555;
    public $err_code = 30001;
}