<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 21:12
 */

namespace app\api\controller\v1;

use app\api\service\TokenService;
use app\api\Tools\Token as TokenTool;
use app\lib\exception\TokenException;
use app\lib\filter\TokenFilter;

final class TokenController extends BaseController
{
    public function login($code = ''){
        (new TokenFilter())->goCheck();
        $service = new TokenService($code);
        $token = $service->get();

        return json([
            'token' => $token
        ]);
    }

    public function verify($token){
        if(!$token){
            throw new TokenException();
        }
        $result = TokenTool::verifyToken($token);
        return json([
            'isVerify' => $result
        ]);
    }
}