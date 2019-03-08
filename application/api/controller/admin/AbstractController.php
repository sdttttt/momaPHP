<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 18:14
 */

namespace app\api\controller\admin;

use app\api\controller\v1\BaseController;
use app\api\model\BaseModel;
use app\lib\exception\BaseException;
use app\lib\exception\DbIDUSException;
use app\lib\filter\Filter;
use think\exception\DbException;

/*
 * 写了三个控制器发现
 * 代码的重复性简直大的令人发指
 * 采用了依赖注入来摆脱代码的重复问题
 * 解决了代码的坏味道
 * */
abstract class AbstractController extends BaseController
{


    /**
     * @param BaseModel $model
     * @param BaseException $exception
     * @return BaseModel[]|false|\think\response\Json
     * @throws BaseException
     */
    function getAll(BaseModel $model, BaseException $exception){
        try {
            $return = $model::all();
            if(!$return){
                throw $exception;
            }
            return $return;
        } catch (DbException $e) {
            throw new $exception;
        }
    }

    /**
     * @param BaseModel $model
     * @param $id
     * @return int
     * @throws DbIDUSException
     */
    function delete(BaseModel $model, $id){
        try {
            $result = $model::destroy($id);
        }catch (\Exception $e){
            throw new DbIDUSException(['message' => '删除出错']);
        }
        return $result;
    }

    /**
     * @param BaseModel $model
     * @param Filter $filter
     * @param $info
     * @throws DbIDUSException
     * @throws \app\lib\exception\FilterException
     */
    function update(BaseModel $model, Filter $filter, $info){
        $filter->goCheck();
        $result = $model->updateExtend($info);
        if(!$result) throw new DbIDUSException(['message' => '类型更新失败']);
    }

}