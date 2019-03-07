<?php
namespace app\api\controller\v1;

use app\api\Tools\Token;
use think\Controller;

abstract class BaseController extends Controller {

    //只有普通用户可以使用
    protected function onlySon(){
       Token::onlySon();
    }

    //只有root权限才能使用
    protected function onlyFather(){
        Token::onlyFather();
    }

    //只有登录才能使用
    protected function onlyUser(){
        Token::onExcludeToken();
    }
}