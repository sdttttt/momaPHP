<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/12
 * Time: 15:25
 */

namespace app\api\controller\v1;

use app\lib\exception\GizwitsException;
use think\Request;

class GizwitsController extends BaseController
{
    private $appid;
    private $did;
    private $headers;

    function __construct(Request $request = null){
        parent::__construct($request);
        $this->appid = config('gizwits.appid');
        $this->headers = config('gizwits.headers');
        $this->did = config('gizwits.did');
    }

    public function getToken(){
        $header = array(sprintf($this->headers['id'],$this->appid));
        $params = json_encode([
            'phone_id' => '13805781519'
        ]);

        $response = curl_post(config('gizwits.login_url'),$params,$code,$header);
        $result = json_decode($response,true);

        echo "匿名登录成功";
        $this->bindDrive($result['token']);
        $this->updateDriveStatus($result['token']);
    }

    public function bindDrive($token = ''){
        $headers = array(sprintf($this->headers['id'],$this->appid),
            sprintf($this->headers['token'],$token));
        $params = json_encode([
            'devices' => [
                [
                "did" => $this->did,
                "passcode" => "123456",
                "remark" => "",
                "dev_alias" => ""
            ]
            ]
        ]);

        $response = curl_post(config('gizwits.bind_url'),$params,$code,$headers);
        $result = json_decode($response,true);
        dump($result);
        if(!array_key_exists('success',$result)){
            throw new GizwitsException(['message' => '绑定设备失败']);
        }
        echo "成功绑定";
        //return json($result);
    }

    public function updateDriveStatus($token = ''){
        $headers = array(sprintf($this->headers['id'],$this->appid),
            sprintf($this->headers['token'],$token));
        $url = sprintf(config('gizwits.control_url') , $this->did);
        $params = json_encode([
            "attrs" => [
            "TestOne" => true
            ]
        ]);

        $response = curl_post($url,$params,$code,$headers);
        $result = json_decode($response,true);
        dump($result);
        echo "改变成功？";
        return json($result);
    }
}