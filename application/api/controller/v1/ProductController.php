<?php
namespace app\api\controller\v1;

use app\lib\filter\ProductFilter;
use app\api\model\Product;
use think\response\Json;
use app\lib\exception\ProductException;

class ProductController extends BaseController{
    
    public function getOneProduct($id){
        (new ProductFilter())->goCheck();

        $result = Product::getOneProduct($id);
        
        if(!$result){
            throw new ProductException([
                'message' => '找不到该商品',
                'err_code' => 10005
            ]);
        }

        $response = new Json($result[0]);
        $response->send();
    }
}
 
