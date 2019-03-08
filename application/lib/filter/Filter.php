<?php
namespace app\lib\filter;

use app\lib\exception\FilterException;
use think\Request;
use think\Validate;

abstract class Filter extends Validate{

    public function goCheck(){
        $request = Request::instance();
        $params = $request->param();
        if(!$this->check($params)){
            $exception = new FilterException([
                "message" => is_array($this->error)?
                    implode(',',$this->error):$this->error
            ]);
            throw $exception;
        }
        return true;
    }

    protected function isIntegerNumber($value,$rule = ''){
        echo "开始验证整数";
        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
            return true;
        }
        return false;
    }

}