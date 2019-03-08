<?php

namespace app\api\model;

class Theme extends BaseModel
{
    public function ThemeItem(){
        return $this->hasMany("ThemeItem",'theme_id','id');
    }

    public static function getHomeAll($id){
        return self::with("ThemeItem.image")->find($id);
    }

    function updateExtend($value)
    {
        // TODO: Implement updateExtend() method.
    }


}
