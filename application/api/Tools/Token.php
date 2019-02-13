<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 22:23
 */

namespace app\api\Tools;


use app\lib\exception\FatherException;
use app\lib\exception\SonException;
use app\lib\exception\TokenException;
use app\lib\Power;
use think\Cache;
use think\cache\driver\Redis;
use think\Request;

class Token
{
    public static function makeToken(){
        $chars = getRandChar(32);
        $code = config('wx.rand_key');
        return sha1($chars.$code);
    }

    public static function getUid(){
        return self::getTokenValue("uid");
    }

    public static function getTokenValue($key){
        $token = Request::instance()->header("token");
        $var = Redis::instance(Config("redisConfig"))->get($token);
        if(!$var){
            throw new TokenException([
                'message' => 'token不存在'
            ]);
        }else{
            if(!is_array($var)) {

               $var = json_decode($var,true);
            }
            if(array_key_exists($key,$var)){
                return $var[$key];
            }
        }
        throw new TokenException(['message'=>'token失效,重新登录中..']);
    }

    public static function verifyToken($token){
        //$exist = Cache::get($token);
        $exist = Redis::instance(Config("redisConfig"))->get($token);
        if(!$exist){
            return false;
        }else{
            return true;
        }
    }

    public static function onlySon(){
        $power = self::getTokenValue("power");
        if(!$power){
            throw new SonException();
        }else{
            if($power == Power::son){
                return true;
            }
            throw new SonException();
        }
    }

    public static function onlyFather(){
        $power = self::getTokenValue("power");
        if(!$power){
            throw new FatherException();
        }else{
            if($power == Power::father){
                return true;
            }
            throw new FatherException();
        }
    }

    public static function onExcludeToken(){
        $power = self::getTokenValue("power");
        if($power){
            throw new TokenException(['message' =>'token失效,重新登录中..']);
        }else{
            if($power >= Power::son){
                return true;
            }
            throw new TokenException(['message' =>'token失效,重新登录中..']);
        }
    }
}