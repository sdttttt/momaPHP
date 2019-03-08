<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 20:05
 */

namespace app\api\controller\admin;


use app\api\model\Theme;
use app\lib\exception\ThemeException;

class ThemeController extends AbstractController
{
    public function getThemeAll(){
        $result = $this->getAll(new Theme(),new ThemeException());
        return json($result);
    }

    public function updateTheme($theme){
        
    }
}