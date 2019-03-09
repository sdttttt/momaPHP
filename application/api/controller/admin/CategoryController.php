<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 22:20
 */

namespace app\api\controller\admin;

use app\api\model\Category;
use app\api\model\Product;
use app\lib\exception\CategoryException;
use app\lib\filter\super\ProductFilter;

class CategoryController extends AbstractController implements IDUSAbstract
{
    /**
     * @return \think\response\Json
     * @throws CategoryException
     * @throws \app\lib\exception\BaseException
     */
    public function getAllImpl(){
        $result = $this->getAll(new Category(),new CategoryException());

        return json($result);
    }

    public function updateImpl($category){
        $this->update(new Category(),new ProductFilter(),$category);

        return json([
            'status' => true
        ]);
    }


    public function deleteImpl($categoryID){
        $result = $this->delete(new Product(),$categoryID);

        return json([
            'deleteNumber' => $result
        ]);
    }
}