<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 21:10
 */

namespace app\api\controller\v1;

final class MessageController extends BaseController
{
    protected $beforeActionList = [
        'onlyUser' => ['only' => 'getMyMessage']
    ];

    public function getMyMessage(){

    }
}