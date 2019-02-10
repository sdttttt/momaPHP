<?php

namespace app\api\model;

use think\Model;

class ThemeItem extends Model
{
    public function Image(){
        return $this->belongsTo('image','img_id','id');
    }
}
