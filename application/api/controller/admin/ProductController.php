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

class ProductController extends AbstractController
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
    public function updateProduct($product){
        $this->update(new Product(),new ProductFilter(),$product);
        return json([
            'status' => true
        ]);
    }

    # 文件上传
    # 这个商品图片上传之后会返回 商品图片的主键ID 请配合这个ID来做商品的添加
    public function productImageUpLoad(Request $request){
        $file = new FileService();
        $result = $file->imageUpload($request);
        return json(['imgid' => $result]);

    }

    //获取所有商品信息
    public function getProductAll(){
        $result = $this->getAll(new Product(),new ProductException());
        return json($result);
    }

    public function deleteProduct($productID){
       $result = $this->delete(new Product(),$productID);
       return json([
           'deleteNumber' => $result
       ]);
    }
}