<?php
namespace app\api\controller\v1;

use app\lib\exception\ThemeException;
use app\lib\filter\ThemeFilter;
use app\api\model\Theme as ThemeModel;

final class ThemeController extends BaseController{

    public function getHomeAll($id){
        (new ThemeFilter())->goCheck();
        $result = ThemeModel::getHomeAll($id);
        if(!$result){
            throw new ThemeException();
        }
        return json($result);
    }
}