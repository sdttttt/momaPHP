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
use app\lib\filter\ThemeFilter;

class ThemeController extends AbstractController implements IDUSAbstract
{
    public function getAllImpl(){
        $result = $this->getAll(new Theme(),new ThemeException());
        return json($result);
    }

    public function updateImpl($theme){
        $this->update(new Theme(),new ThemeFilter(),$theme);
        return json(['status' => true ]);
    }

    public function deleteImpl($themeID){
        $result = $this->delete(new Theme(),$themeID);
        return json(['deleteNumber' => $result ]);
    }
}