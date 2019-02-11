<?php
namespace app\api\controller\v1;

use app\api\Tools\Token;
use think\Controller;

abstract class BaseController extends Controller{

    protected function onlySon(){
       Token::onlySon();
    }

    protected function onlyFather(){
        Token::onlyFather();
    }

    protected function onlyUser(){
        Token::onExcludeToken();
    }
}