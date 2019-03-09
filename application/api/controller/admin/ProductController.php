<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 17:04
 */

namespace app\api\controller\admin;

use app\api\controller\v1\BaseController;
use app\api\model\Product;
use app\api\service\FileService;
use app\lib\exception\DbIDUSException;
use app\lib\exception\FileNotException;
use app\lib\exception\ProductException;
use app\lib\filter\super\ProductFilter;
use think\exception\DbException;
use think\Request;

class ProductController extends AbstractController implements IDUSAbstract
{
    /*
     * 传过来的参数应该有
     * @ 商品名
     * @ 商品价格
     * @ 商品图片名
     * @ 商品库存量
     * @ 商品信息
     * @ 商品类型
     * */
    public function updateImpl($product){
        $this->update(new Product(),new ProductFilter(),$product);
        return json([
            'status' => true
        ]);
    }

    //获取所有商品信息
    public function getAllImpl(){
        $result = $this->getAll(new Product(),new ProductException());
        return json($result);
    }

    public function deleteImpl($productID){
       $result = $this->delete(new Product(),$productID);
       return json([
           'deleteNumber' => $result
       ]);
    }
}