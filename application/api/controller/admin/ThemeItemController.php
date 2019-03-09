<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/9
 * Time: 12:26
 */

namespace app\api\controller\admin;


use app\api\model\ThemeItem;
use app\lib\exception\ThemeException;
use app\lib\filter\super\ThemeItemFilter;

class ThemeItemController extends AbstractController implements IDUSAbstract
{
    function getAllImpl(){
       $result = $this->getAll(new ThemeItem(),new ThemeException());
       return json($result);
    }

    function deleteImpl($themeitemID){
        $result = $this->delete(new ThemeItem(),$themeitemID);
        return json([ 'deleteNumber' => $result ]);
    }

    function updateImpl(){
        $name = 'themeitem';
        $this->update(new ThemeItem(),new ThemeItemFilter(),$name);
        return json(['status' => true]);
    }
}