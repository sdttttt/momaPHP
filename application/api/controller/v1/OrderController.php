<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/5
 * Time: 20:52
 */

namespace app\api\controller\v1;


use app\api\service\OrderService;
use app\lib\exception\TokenException;
use app\lib\filter\OrderFilter;
use app\api\Tools\Token as TokenTool;

class OrderController extends BaseController
{
    protected $beforeActionList = [
        'onlySon' => ['only' => 'make']
    ];

    /**
     * @param $order
     * @return \think\response\Json
     */
    public function make($products){
        ( new OrderFilter() )->goCheck();

        $uid = TokenTool::getTokenValue("uid");
        if(!$uid)
            throw new TokenException();
        $service = new OrderService($products,$uid);
        $result = $service->place();
        return json([
            'status' => $result
        ]);
    }
}