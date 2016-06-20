<?php
namespace common\models;

use yii\db\ActiveRecord;

class Daan extends ActiveRecord
{
    /**
     * 获取回答者
     * @return \yii\db\ActiveQuery
     */
    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * 获取答案对应的选项
     * @return mixed
     */
    public function getXuanxiang(){
        $info = Xuanxiang::findOne(['id' => $this->xuanxiang_id]);
        return $info->content;
    }
}