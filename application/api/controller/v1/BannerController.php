<?php
namespace app\api\controller\v1;

use app\lib\exception\BannerException;
use app\api\model\Banner as BannerModel;
use app\lib\filter\BannerFilter;

#@Controller
final class BannerController extends BaseController{

    public function getAllBanner($id){
        (new BannerFilter())->goCheck();
        $id = intval($id);
        $result = BannerModel::getAll($id);
        if(!$result){
            throw new BannerException();
        }

        return json($result);
    }

}