<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 17:04
 */

namespace app\api\controller\admin;


use app\api\controller\v1\BaseController;
use app\api\model\Image;
use app\api\model\Product;
use app\api\service\FileService;
use app\lib\exception\DbIDUSException;
use app\lib\exception\FileNotException;
use app\lib\exception\ProductException;
use app\lib\filter\super\ProductFilter;
use think\Db;
use think\Exception;
use think\exception\DbException;
use think\Request;

class ProductController extends BaseController
{

    protected $beforeActionList = ['onlyFather'];

    /*
     * 传过来的参数应该有
     * @ 商品名
     * @ 商品价格
     * @ 商品图片名
     * @ 商品库存量
     * @ 商品信息
     * @ 商品类型
     *
     * */
    public function updateProductInfo($product){
        (new ProductFilter())->goCheck();

        $result = (new Product())->updateProduct($product);

        if(!$result) throw new DbIDUSException(['message' => '商品更新失败']);

        return json([
            'status' => true
        ]);
    }

    # 文件上传
    # 这个商品图片上传之后会返回 商品图片的主键ID 请配合这个ID来做商品的添加
    public function productImageUpLoad(Request $request){
        $file = new FileService();

        $result = $file->imageUpload($request);

        return json(['imgid' => $request]);

    }

    //获取所有商品信息
    public function getProductAll(){
       try {
            $return = Product::all();
            if(!$return){
                throw new ProductException();
            }
            return json($return);
        } catch (DbException $e) {
            throw new ProductException();
        }
    }

    public function deleteProduct($productID){
       try {
           $result = Product::destroy($productID);
       }catch (\Exception $e){
           throw new DbIDUSException(['message' => '删除出错']);
       }

       return json([
           'deleteNumber' => $result
       ]);
    }
}