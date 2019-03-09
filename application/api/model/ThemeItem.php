<?php

namespace app\api\model;

class ThemeItem extends AbstractModel
{
    protected $autoWriteTimestamp = 'date';

    public function Image(){
        return $this->belongsTo('image','img_id','id');
    }

    function updateExtend($value){
        $model = $this->getUpdateModel($value);

        !array_key_exists('name',$value) ?: $model->name = $value['name'];
        !array_key_exists('ename',$value) ?: $model->ename = $value['ename'];
        !array_key_exists('themeid',$value) ?: $model->theme_id = $value['themeid'];
        !array_key_exists('imgid',$value) ?: $model->img_id = $value['imgid'];

        $model->save();
    }
}
