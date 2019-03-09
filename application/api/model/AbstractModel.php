<?php
namespace app\api\model;

use think\Model;

/*
 * 2019-3-9
 * 扩展数据表模型对象
 * 如果你想用我封装过的方法和抽象控制器
 * 请一定要继承这个类
 * 当然
 * 不继承它也可以
 * 你也可以自己写自己的封装方法
 * */
abstract class AbstractModel extends Model{

    protected function getUpdateModel($ary){
        if(array_key_exists('id',$ary) && $ary['id'] != null)
            return static::get($ary['id']);
        else
            return new static();
    }

    abstract function updateExtend($value);

}