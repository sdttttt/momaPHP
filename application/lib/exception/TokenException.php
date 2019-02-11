<?php
namespace app\lib\exception;

class TokenException extends BaseException{

    public $message = "Token过期或已经失效";
    public $err_code = 20001;
    public $code = 401;

}