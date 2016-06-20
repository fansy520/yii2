<?php
namespace common\models;

use yii\db\ActiveRecord;

class Wenti extends ActiveRecord{
    public function rules(){
        return [
            [['title', 'type'], 'required'],
        ];
    }

    /**
     * 获取所有的选项
     * @return string
     */
    public function getXuanxiangs(){
        $xuanxiangs = Xuanxiang::find()->where(['wenti_id' => $this->id])->all();
        if(!$xuanxiangs){
            return '';
        }
        $xuanxiangLists = [];
        foreach($xuanxiangs as $xx){
            $xuanxiangLists[] = $xx->content;
        }
        return join(',', $xuanxiangLists);
    }

    /**
     * 选项列表
     * @return \yii\db\ActiveQuery
     */
    public function getXuanxianglists(){
        return $this->hasMany(Xuanxiang::className(), ['wenti_id' => 'id']);
    }

    /**
     * 获取当前问题的答案.根据USER_ID
     * @param $user_id
     * @return mixed|string
     */
    public function daans($user_id){
        if($this->type == 0){
            $info = Daan::find()->where(['wenti_id' => $this->id, 'user_id' => $user_id])->one();
            return $info->xuanxiang;
        }elseif($this->type == 1){
            $info = Daan::find()->where(['wenti_id' => $this->id, 'user_id' => $user_id])->all();
            $xuanxiangs = [];
            foreach($info as $in){
                $xuanxiangs[] = $in->xuanxiang;
            }
            return join(',', $xuanxiangs);
        }else{
            $info = Daan::find()->where(['wenti_id' => $this->id, 'user_id' => $user_id])->one();
            return $info->content;
        }
    }
}