<?php
namespace app\lib\exception;

use think\exception\Handle;

class ExceptionHandler extends Handle{

    private $message = '';
    private $err_code = 0;
    private $code = 0;

    public function render(\Exception $e)
    {
        if($e instanceof BaseException){
            
            $this->message = $e->message;
            $this->err_code = $e->err_code;
            $this->code = $e->code;
        }else{
            if(config('app_debug')){
                //这里记得加return 不然要报错
               return parent::render($e);
            }else{
                $this->message = "对不起，我们错了_(:з」∠)_";
                $this->err_code = 10000;
                $this->code = 500;
            }
        }
        return json([
            'message' => $this->message,
            'err_code' => $this->err_code,
            'code' => $this->code
        ]);
    }

}