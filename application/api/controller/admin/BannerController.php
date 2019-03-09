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

class BannerController extends AbstractController implements IDUSAbstract
{
    public function getAllImpl(){
       $result = $this->getAll(new Banner(),new BannerException());
       return $result;
    }

    public function deleteImpl($bannerID){
        $result = $this->delete(new Banner(),$bannerID);
        return json([
            'deleteNumber' => $result
        ]);
    }

    public function updateImpl($banner){
        $this->update(new Banner(),new BannerFilter(),$banner);
        return json(array(
            'status' => true
        ));
    }

}