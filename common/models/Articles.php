<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Articles extends ActiveRecord
{
    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_time'],
                ]
            ]
        ];
    }
    public function rules(){
        return [
            [['title', 'content', 'category_id'], 'required'],
            ['click_count', 'integer'],
            ['image', 'file', 'extensions' => 'jpg,png,gif,jpeg'],
        ];
    }
    public function getCategoryname(){
        $category =  ArticleCategories::findOne(['id' => $this->category_id]);
        return $category->name;
    }

    public function getCategory(){
        return $this->hasOne(ArticleCategories::className(), ['id' => 'category_id']);
    }

    public function getAdminnickname(){
        $admin = User::findOne(['id' => $this->admin_user_id]);
        return $admin ? $admin->nickname : '未知管理员';
    }

    public function addClickCount(){
        $this->click_count += 1;
        $this->update();
    }
}