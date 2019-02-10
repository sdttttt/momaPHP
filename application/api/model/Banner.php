<?php
namespace app\api\model;

class Banner extends BaseModel{

    public function BannerItem(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getAll($id){
        return self::with('BannerItem.Image')
        ->find($id);
    }

}