<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 22:20
 */

namespace app\api\controller\admin;


use app\api\controller\v1\BaseController;
use app\api\model\Category;
use app\lib\exception\CategoryException;
use app\lib\exception\DbIDUSException;
use app\lib\filter\super\CategoryFilter;
use think\exception\DbException;

class CategoryController extends BaseController
{
    protected $beforeActionList = ['onlyFather'];

    public function getCategoryAll(){
        try {
            $result = Category::all();
        } catch (DbException $e) {
            throw new CategoryException();
        }
        if(!$result) throw new CategoryException();

        return json($result);
    }

    public function updateCategory($category){
        (new CategoryFilter())->goCheck();
        $result = (new Category())->updateCategory($category);
        if(!$result) throw new DbIDUSException(['message' => '类型更新失败']);
        return json([
            'status' => true
        ]);
    }

    public function deleteCategory($categoryID){
        try {
            $result = Category::destroy($categoryID);
        }catch (\Exception $e){
            throw new DbIDUSException(['message' => '删除出错']);
        }

        return json([
            'deleteNumber' => $result
        ]);
    }
}