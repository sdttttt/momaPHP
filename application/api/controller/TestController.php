<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/13
 * Time: 18:20
 */

namespace app\api\controller;

use app\api\model\Banner;

class TestController extends BaseTController
{
    public function testOne(){

        $this->fucknew();

    }

    public function testS(){
        $model = new Banner();
        $model->name = "123";
        dump($model);
        echo $model->save();

    }
}