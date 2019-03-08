<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/8
 * Time: 18:10
 */

namespace app\api\controller\admin;

use app\api\model\BannerItem;
use app\api\service\FileService;
use app\lib\exception\BannerException;
use app\lib\filter\super\BannerItemFilter;
use think\File;
use think\Request;

class BannerItemController extends AbstractController
{
    public function getBannerItemAll(){
        $result = $this->getAll(new BannerItem(),
            new BannerException(['message' => '获取Banner条目失败']));
        return $result;
    }

    public function updateBannerItem($banneritem){
        $this->update(new BannerItem(),new BannerItemFilter(),$banneritem);
        return json([
            'status' => true
        ]);
    }

    public function deleteBannerItem($banneritemID){
        $result = $this->delete(new BannerItem(),$banneritemID);
        return json([
            'deleteNumber' => $result
        ]);
    }

    public function bannerItemImageUpload(Request $request){
        $file = new FileService();
        $result = $file->imageUpload($request);

        return json([
            'imgid' => $result
        ]);
    }
}