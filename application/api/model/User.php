<?php

namespace app\api\model;


class User extends BaseModel
{
    public static function findByOpenid($openid){
        return self::where('openid',$openid)->find();
    }
}
