<?php
namespace app\api\model;

class Banner extends AbstractModel
{
    protected $autoWriteTimestamp = true;
    protected $createTime = 'create_time';


    public function BannerItem(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getAll($id){
        return self::with('BannerItem.Image')
        ->find($id);
    }

    public function updateExtend($banner){
        $model = $this->getUpdateModel($banner);
        !array_key_exists('name',$banner) ?:
            $model->data['name'] = $banner['name'];
        return $model->save();
    }
}