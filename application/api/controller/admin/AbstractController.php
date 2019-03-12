<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 18:14
 */

namespace app\api\controller\admin;

use app\api\controller\v1\BaseController;
use app\api\model\AbstractModel;
use app\lib\exception\BaseException;
use app\lib\exception\DbIDUSException;
use app\lib\filter\Filter;
use think\exception\DbException;
use think\Request;

/*
 * 2019-3-7
 * 这个抽象控制器是专门为超级权限准备的
 * 所有的方法必然是只有超级权限才能访问
 *
 * 2019-3-8
 * 写了三个控制器发现
 * 代码的重复性简直大的令人发指
 * 采用了依赖注入来摆脱代码的重复问题
 *
 * 2019-3-9
 * 如果你想要对数据库进行简单的增删改查
 * 那么你一定会需要这个类
 * 只要注入几个对象就能很简单的实现
 * 很好用的哦~
 * */
abstract class AbstractController extends BaseController
{
    # 为了测试 我先关闭权限检测
    # protected $beforeActionList = ['onlyFather'];

    /**
     * 抽象的获取数据表所有对象
     * 需要注入 模型对象 异常对象
     *
     * @param AbstractModel $model
     * @param BaseException $exception
     * @return AbstractModel[]|false|\think\response\Json
     * @throws BaseException
     */
    protected function getAll(AbstractModel $model, BaseException $exception){
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
     * 抽象的删除数据表对象
     * 需要注入 模型对象 Primary
     *
     * @param AbstractModel $model
     * @param $id
     * @return int
     * @throws DbIDUSException
     */
    protected function delete(AbstractModel $model, $id){
        try {
            $result = $model::destroy($id);
        }catch (\Exception $e){
            throw new DbIDUSException(['message' => '删除出错']);
        }
        return $result;
    }

    /**
     * 抽象的更新数据表对象
     * 需要注入 模型对象 过滤器对象 更新信息
     *
     * @param AbstractModel $model
     * @param Filter $filter
     * @param $info
     * @throws DbIDUSException
     * @throws \app\lib\exception\FilterException
     */
     protected function update(AbstractModel $model, Filter $filter, $name) {
         empty($filter) ?: $filter->goCheck();
         $params = Request::instance()->param();
        $result = $model->updateExtend($params[$name]);
        if(!$result) throw new DbIDUSException(['message' => '类型更新失败']);
    }

}