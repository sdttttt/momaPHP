<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/13
 * Time: 18:20
 */

namespace app\api\controller;

use think\Controller;

final class TestController extends Controller
{
    public function testOne(){
        //echo ROOT_PATH . "public" . DS . 'image';
        $fuck = 1231524;
        if(is_numeric($fuck))
            echo "这是数字";
        else
            echo "这不是数字";
    }
}