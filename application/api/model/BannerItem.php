<?php
namespace app\api\model;

class BannerItem extends AbstractModel{

    protected $autoWriteTimestamp = 'date';

    public function Banner(){
        return $this->belongsTo('Banner','banner_id','id');
    }

    public function Image(){
        return $this->belongsTo('Image','img_id','id');
    }
    function updateExtend($value){
        $model = $this->getUpdateModel($value);

        !array_key_exists("bannerid",$value) ?: $model->banner_id = $value['bannerid'];
        !array_key_exists("imgid",$value) ?: $model->img_id = $value['imgid'];

        $model->save();
    }

}