<?php
namespace app\api\controller\v1;

use app\api\Tools\Token;
use think\Controller;

abstract class BaseController extends Controller {

    //只有普通用户可以使用
    /**
     * @throws \app\lib\exception\SonException
     */
    protected function onlySon(){
       Token::onlySon();
    }

    //只有root权限才能使用

    /**
     * @throws \app\lib\exception\FatherException
     */
    protected function onlyFather(){
        Token::onlyFather();
    }

    //只有登录才能使用

    /**
     * @throws \app\lib\exception\TokenException
     */
    protected function onlyUser(){
        Token::onExcludeToken();
    }
}