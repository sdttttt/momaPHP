<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 21:12
 */

namespace app\api\controller\v1;

use app\api\service\TokenService;
use app\lib\filter\TokenFilter;

use think\Request;


final class TokenController extends BaseController
{
    public function login($code = ''){
        (new TokenFilter())->goCheck();
        $service = new TokenService($code);
        $token = $service->get();

        return $token;
    }
}