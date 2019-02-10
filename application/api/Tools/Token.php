<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 22:23
 */

namespace app\api\Tools;


use app\lib\exception\TokenException;
use think\Cache;
use think\Request;

class Token
{
    public static function makeToken(){
        $chars = getRandChar(32);
        $code = config('wx.rand_key');
        return sha1($chars.$code);
    }

    public static function getTokenValue($kkey){
        $key = Request::instance()->header("token");
        $var = Cache::get($key);
        if(!$var){
            throw new TokenException([
                'message' => 'token不存在'
            ]);
        }else{
            if(!is_array($var)) {
                json_decode($var,true);
            }
            if(array_key_exists($kkey,$var)){
                return $var[$kkey];
            }
        }
        throw new TokenException(['message'=>'token获取的变量不存在']);
    }
}