<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/5
 * Time: 22:06
 */

namespace app\api\service;

use app\api\model\Product as ProductModel;
use app\api\model\Order as OrderModel;
use app\lib\exception\OrderException;
use think\Exception;

class OrderService
{
    //用户传来的订单 { 不可信 }
    private $product_user;

    //数据库查询订单 { 安全 }
    private $product_only;

    private $uid;

    /**
     * OrderService constructor.
     * @param $products
     * @param $uid
     */
    public function __construct($products, $uid){
        $this->product_user = $products;
        $this->uid = $uid;
    }

    public function place(){
        $this->product_only = $this->getProductOnly();
        $this->checkOrderStatus();
        $products = $this->orderBuilder();
        $status = $this->makeOrderSnap($products);
        $result = $this->saveOrderSnap($status);
        return $result;
    }

    /**
     * 获取真实订单
     * @return mixed
     * @throws \think\exception\DbException
     */
    private function getProductOnly(){
        $productsID = [];
        foreach ( $this->product_user as $item ){
            array_push($productsID , $item['id']);
        }
        $product_only = ProductModel::all($productsID,['image'])
            //这个位置返回为数组，请不要直接调用方法，它不是对象
            ->visible(['id','name','price','stock','image.url'])
            ->toArray();

        return $product_only;
    }

    /**
     * 检查订单状态
     * @return bool
     * @throws OrderException
     */
    private function checkOrderStatus(){
        foreach ($this->product_only as $item){
            $this->checkOneProduct($item);
        }
    }

    /**
     * 检查单个商品库存量
     * @param $product
     * @throws OrderException
     */
    private function checkOneProduct($product){
        $index = -1;
        foreach ( $this->product_user as $item ){
            if($item['id'] == $product['id']){
                $index = 1;
                if($item['count'] > $product['stock'])
                    throw new OrderException(['message' => '库存量不足']);
            }
        }
        if($index == -1)
            throw new OrderException(['message' => '商品id不存在']);
    }

    private function orderBuilder(){
        $products = [
            'product' => [],
            'price' => 0,
            'count' => 0
        ];
        foreach ($this->product_only as $item) {
            foreach ($this->product_user as $value){
                if($item['id'] == $value['id']){
                    $product = [
                        'id' => $item['id'],
                        'name' => $item['name'],
                        'price' => $item['price'],
                        'count' => $value['count']
                    ];
                    array_push($products['product'],$product);
                    $products['price'] += $item['price'] * $value['count'];
                    $products['count'] += $value['count'];
                }
            }
        }
        return $products;
    }

    private function makeOrderSnap($products){
        $status = [
            'order_NO' => $this->makeOrderNo(),
            'title' => $products['product'][0]['name'],
            'uid' => $this->uid,
            'price' => $products['price'],
            'count' => $products['count'],
            'product' => json_encode($products['product'])
        ];
        return $status;
    }

    private function saveOrderSnap($status){
        try {
            $model = new OrderModel();
            $model->oid = $status['order_NO'];
            $model->title = $status['title'];
            $model->snap = json_encode($status);
            $model->price = $status['price'];
            $model->uid = $status['uid'];
            $model->create_time = time();

            $model->save();
        }catch (Exception $ex){
            throw $ex;
        }
        return true;
    }

    public static function makeOrderNo(){
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn =
            $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        return $orderSn;
    }
}