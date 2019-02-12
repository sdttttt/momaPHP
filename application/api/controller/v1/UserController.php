<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/13
 * Time: 0:02
 */

namespace app\api\controller\v1;


use app\api\Tools\Token as TokenTool;

class UserController extends BaseController
{
    public function getWallet(){
        echo TokenTool::getTokenValue("openid");
    }
}