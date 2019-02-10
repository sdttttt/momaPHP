<?php
namespace app\lib\exception;

class ThemeException extends BaseException{

    public $message = "Theme找不到了";
    public $err_code = 10002;
    public $code = 404;

}