<?php
namespace app\api\model;

class Banner extends BaseModel{

    protected $autoWriteTimestamp = 'date';

    public function BannerItem(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getAll($id){
        return self::with('BannerItem.Image')
        ->find($id);
    }

    public function updateExtend($banner){
        $model = $this->getUpdateModel($banner);

        $model->name = $banner['name'];

        return $model->save();
    }

}