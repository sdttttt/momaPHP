<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 17:11
 */

namespace app\lib\exception;


class FileNotException extends BaseException
{
    public $message = "上传文件不存在";
    public $err_code = 00001;
    public $code = 404;
}