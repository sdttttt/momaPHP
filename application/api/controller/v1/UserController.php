<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/13
 * Time: 0:02
 */

namespace app\api\controller\v1;


use app\api\model\User as UserModel;
use app\api\Tools\Token as TokenTool;
use app\lib\exception\UserException;

class UserController extends BaseController
{
    public function getWallet(){
        $openid = TokenTool::getTokenValue("openid");
        $result = UserModel::findWallet($openid);
        if(!$result){
            throw new UserException(['message' => '找不到！']);
        }

        return json([
            'wallet' => $result
        ]);
    }
}