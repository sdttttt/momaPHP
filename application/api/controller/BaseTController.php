<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 17:52
 */

namespace app\api\controller;


class BaseTController
{
    protected function fucknew(){
        self::one();
        static::two();
    }

    protected static function one(){
        echo "Base";
    }

    protected static function two(){
        echo "Base2";
    }
}