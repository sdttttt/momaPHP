<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 17:24
 */

namespace app\api\controller\admin;

use app\api\model\Banner;
use app\lib\exception\BannerException;
use app\lib\filter\super\BannerFilter;

class BannerController extends AbstractController
{
    function getBannerAll(){
       $result = $this->getAll(new Banner(),new BannerException());
       return $result;
    }

    function deleteBanner($bannerID){
        $result = $this->delete(new Banner(),$bannerID);
        return json([
            'deleteNumber' => $result
        ]);
    }


    function updateBanner($banner){
        $this->update(new Banner(),new BannerFilter(),$banner);
        return json(array(
            'status' => true
        ));
    }

}