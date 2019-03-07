<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/7
 * Time: 17:38
 */

namespace app\api\service;

use app\api\model\Image;
use app\lib\exception\FileNotException;
use think\Request;

class FileService
{
    public function imageUpload(Request $request){
        $file = $request->file();

        if(empty($file)) throw new FileNotException();

        $status = $file->move(ROOT_PATH . "public" . DS . 'image');
        if($status) {
            $model = Image::create(['url' => $status->getFilename(), 'create_time' => time()]);
            if(isset($model->url))
                return $model->id;
        }else{
            return false;
        }
    }
}