<?php

namespace app\api\model;

use app\lib\Power;

class User extends AbstractModel
{
    protected $autoWriteTimestamp = 'date';

    public static function findByOpenid($openid){
        return self::where('openid',$openid)->find();
    }

    public static function findWallet($openid){
        $model = self::where('openid',$openid)->find();
        return $model->wallet;
    }

    function updateExtend($value)
    {
        $model = $this->getUpdateModel($value);

        !array_key_exists('openid',$value) ?:
            $model->data['openid'] = $value['openid'];
        !array_key_exists('wallet',$value) ?:
            $model->data['wallet'] = $value['wallet'];
        !array_key_exists('name',$value) ?:
            $model->data['name'] = $value['name'];
        !array_key_exists('address',$value) ?:
            $model->data['address'] = $value['address'];
        if(array_key_exists('power',$value)){
            switch ($value['power']){
                case 'father' :
                    $model->data['power'] = Power::father;
                    break;
                case 'son' :
                    $model->data['power'] = Power::son;
                    break;
            }
        }

        $model->save();

    }
}
