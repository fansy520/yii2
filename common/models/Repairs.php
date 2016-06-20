<?php
namespace common\models;

use yii\db\ActiveRecord;

class Repairs extends ActiveRecord
{
    public function rules(){
        return [
            [['name', 'phone', 'address', 'title', 'intro'], 'required', 'message' => '请填写完整'],
            ['phone', 'number', 'message' => '电话格式不对'],
            ['status', 'integer'],
            ['beizhu', 'string'],
            ['images', 'string'],
        ];
    }
}