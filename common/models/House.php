<?php
namespace common\models;

use yii\db\ActiveRecord;

class House extends ActiveRecord
{
    public function rules(){
        return [
            [['title', 'intro', 'phone', 'price', 'type'], 'required', 'message' => '必须填写'],
            ['images', 'file', 'extensions' => 'jpg,png,gif,jpeg', 'maxFiles'=>5],
            ['phone', 'number'],
        ];
    }

    public function getImg(){
        if($this->images){
            $img = explode(',', $this->images);
            return array_shift($img);
        }else{
            return "/image/2.png";
        }
    }
}