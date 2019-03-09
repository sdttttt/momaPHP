<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/9
 * Time: 12:30
 */

namespace app\api\controller\admin;

/*
 * 如果你想要扩展我的数据表操作接口
 * 请实现这个 InterFace
 * 这是一个约定
 * */

interface IDUSAbstract
{
    function getAllImpl();

    function deleteImpl($objectID);

    function updateImpl();
}