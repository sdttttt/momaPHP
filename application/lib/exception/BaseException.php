<?php
namespace app\lib\exception;

use think\Exception;


abstract class BaseException extends Exception{

    public $message;
    public $err_code;
    public $code;

    public function __construct($param = []){
        if(array_key_exists('message',$param) && $param['message'] != null){
            $this->message = $param['message'];
        }
        if(array_key_exists('err_code',$param) && $param['err_code'] != null){
            $this->err_code = $param['err_code'];
        }
        if(array_key_exists('code',$param) && $param['code'] != null){
            $this->code = $param['code'];
        }
    }
}