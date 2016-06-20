<?php
namespace common\models;

use yii\db\ActiveRecord;

class ArticleCategories extends ActiveRecord
{

    public function getArticlecount(){
        return Articles::find()->where(['category_id' => $this->id])->count();
    }
    public function rules(){
        return [
            ['name', 'required'],

        ];
    }
}