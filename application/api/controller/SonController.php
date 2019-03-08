<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 17:54
 */

namespace app\api\controller;


final class SonController extends TestController
{
    public function fuck(){
        $this->fucknew();
    }

    protected static function two(){
        echo "fuck you";
    }
}