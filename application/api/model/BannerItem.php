<?php
namespace app\api\model;

class BannerItem extends BaseModel{
    
    public function Banner(){
        return $this->belongsTo('Banner','banner_id','id');
    }

    public function Image(){
        return $this->belongsTo('Image','img_id','id');
    }
    function updateExtend($value)
    {
        // TODO: Implement updateExtend() method.
    }

}