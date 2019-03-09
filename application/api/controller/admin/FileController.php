<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/9
 * Time: 12:07
 */

namespace app\api\controller\admin;

use app\api\service\FileService;
use think\Request;

class FileController extends AbstractController
{
    # 文件上传
    # 这个商品图片上传之后会返回 商品图片的主键ID 请配合这个ID来做商品的添加
    public function uploadImage(Request $request){
        $file = new FileService();
        $result = $file->imageUpload($request);
        return json(['imgid' => $result]);
    }
}