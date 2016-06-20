<?php
namespace common\models;

use yii\db\ActiveRecord;

class Wenjuan extends ActiveRecord
{
    public function rules(){
        return [
            [['title', 'intro'], 'required'],
            ['deadline_time', 'string'],
            ['head_img', 'file', 'extensions' => 'jpg,png,gif,jpeg'],
        ];
    }

    /**
     * 获取当前问卷下有多少问题
     * @return int|string
     */
    public function getWenticount(){
        return Wenti::find()->where(['wenjuan_id' => $this->id])->count();
    }

    /**
     * 获取当前问卷有多少个人回答
     * @return int|string
     */
    public function getCanyurenshu(){
        return Daan::find()->where(['wenjuan_id' => $this->id])->groupBy('user_id')->count();
    }

    /**
     * 获取所有问题的列表
     * @return \yii\db\ActiveQuery
     */
    public function getWentis(){
        return $this->hasMany(Wenti::className(), ['wenjuan_id' => 'id']);
    }
}