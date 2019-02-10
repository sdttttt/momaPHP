<?php
namespace app\lib\exception;

class BannerException extends BaseException{

    public $message = "banner找不到了";
    public $err_code = 10001;
    public $code = 404;

}