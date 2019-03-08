<?php
namespace app\api\model;

use think\Model;

abstract class BaseModel extends Model{

    protected function getUpdateModel($ary){
        if(array_key_exists('id',$ary) && $ary['id'] != null)
            return static::get($ary['id']);
        else
            return new static();
    }

    abstract function updateExtend($value);

}