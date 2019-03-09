<?php
namespace app\api\model;

use think\exception\DbException;
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

    protected $createTimeName = 'create_time';

    protected $updateTimeName = 'update_time';

    protected $enableAutoTime = true;

    /*
     * 获取模型对象
     *
     * 自动判断是更新还是添加
     * TP的自动时间戳不好用
     * 折腾了很长时间都没弄好
     *
     * 直接干脆自己写一个自动写入时间戳功能
     * */
    protected function getUpdateModel($ary)
    {
        if (array_key_exists('id', $ary) && $ary['id'] != null) {
            try {
                $model = static::get($ary['id']);

                !$this->enableAutoTime ?:
                    $model->data[$this->updateTimeName] = date('Y-m-d H:i:s');

            } catch (DbException $e) {throw $e;}
        } else {
            $model =  new static;

            !$this->enableAutoTime ?:
                $model->data[$this->createTimeName] = date('Y-m-d H:i:s');
        }

        return $model;
    }

    abstract function updateExtend($value);

}