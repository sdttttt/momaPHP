<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/2
 * Time: 18:10
 */

namespace app\api\controller\v1;


use app\api\model\Category;
use app\lib\exception\ProductException;
use think\response\Json;

class CategoryController extends BaseController
{
    public function getProductAll(){
        $result = Category::all(null,['product.image']);
        if(!$result){
            throw new ProductException();
        }

        $response = new Json($result);
        $response->send();
    }
}