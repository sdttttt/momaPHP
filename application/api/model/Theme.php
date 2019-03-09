<?php

namespace app\api\model;

class Theme extends AbstractModel
{
    protected $autoWriteTimestamp = 'date';

    public function ThemeItem(){
        return $this->hasMany("ThemeItem",'theme_id','id');
    }

    public static function getHomeAll($id){
        return self::with("ThemeItem.image")->find($id);
    }

    function updateExtend($value){
        $model = $this->getUpdateModel($value);

        !array_key_exists('name',$value) ?: $model->name = $value['name'];

        $model->save();
    }


}
