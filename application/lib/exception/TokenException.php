<?php
namespace app\lib\exception;

class TokenException extends BaseException{

    public $message = "Token出错";
    public $err_code = 20001;
    public $code = 403;

}