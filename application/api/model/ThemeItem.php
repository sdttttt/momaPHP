<?php

namespace app\api\model;

class ThemeItem extends BaseModel
{
    public function Image(){
        return $this->belongsTo('image','img_id','id');
    }

    function updateExtend($value)
    {
        // TODO: Implement updateExtend() method.
    }
}
