<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 18:10
 */

namespace app\api\controller\admin;

use app\api\model\BannerItem;
use app\lib\exception\BannerException;
use app\lib\filter\super\BannerItemFilter;

class BannerItemController extends AbstractController implements IDUSAbstract
{
    public function getAllImpl(){
        $result = $this->getAll(new BannerItem(),
            new BannerException(['message' => '获取Banner条目失败']));
        return json($result);
    }

    public function updateImpl(){
        $name = 'banneritem';
        $this->update(new BannerItem(),new BannerItemFilter(),$name);
        return json([
            'status' => true
        ]);
    }

    public function deleteimpl($banneritemID){
        $result = $this->delete(new BannerItem(),$banneritemID);
        return json([
            'deleteNumber' => $result
        ]);
    }
}