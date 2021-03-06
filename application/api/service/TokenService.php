<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 21:50
 */

namespace app\api\service;

use app\api\Tools\Token as TokenTool;
use app\lib\exception\TokenException;
use app\api\model\User as UserModel;
use app\lib\Power;
use think\cache\driver\Redis;

final class TokenService
{
    private $code;
    private $appID;
    private $wxSecret;
    private $wx_login;
    private $uid;
    private $power;

    /**
     * TokenService constructor.
     * @param $code
     */
    public function __construct($code){
        $this->code = $code;
        $this->appID = config('wx.app_id');
        $this->wxSecret = config('wx.app_secret');
        $this->wx_login = sprintf(config('wx.wx_login'),
            $this->appID,$this->wxSecret,$this->code);
    }

    public function get(){
       $response = $this->send($this->wx_login);
       $this->save($response['openid']);
       $token = $this->cacheToken($response);
       return $token;
    }

    /*
     * 发送
     * */
    private function send($url){
        $response = curl_get($url);
        $WXresponse = json_decode($response,true);
        if(!$WXresponse){
            throw new TokenException(['message'=>'微信内部异常，无法获取openid',
                'err_code'=>00000,
                'code' => 500
            ]);
        }else{
            if(array_key_exists('errcode',$WXresponse)){
                $this->pushLoginError($WXresponse['errcode']);
            }else{
                return $WXresponse;
            }
        }
    }

    private function save($openid){
       $user = UserModel::findByOpenid($openid);
        if(!$user){
            $model = UserModel::create(['openid' => $openid , 'power' => Power::son]);
            $this->uid = $model->uid;
            $this->power = $model->power;
        }else{
            $this->uid = $user->id;
            $this->power = $user->power;
        }
    }

    private function cacheToken($response){
        $token = TokenTool::makeToken();
        $cached = [
            'uid' => $this->uid,
            'openid' => $response['openid'],
            'power' => $this->power
        ];
        $time = config('wx.token_live_time');
        $cached = json_encode($cached);

        //如果没有配置redis请使用这个
        $result = cache($token,$cached,$time);

        /*$result = Redis::newInstance(config("redisConfig"))
            ->set($token,$cached,$time);*/
        if(!$result){
            $this->pushLoginError();
        }
        return $token;
    }

    private function pushLoginError(){
        throw new TokenException([
            'message' => '登录出现异常，请重新进入小程序',
            'error' => 20003,
            'code' => 500
        ]);
    }
}