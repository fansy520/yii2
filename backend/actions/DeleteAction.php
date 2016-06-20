<?php
namespace backend\actions;

use yii\base\Action;

class DeleteAction extends Action
{
    public $model;
    public $re_url = 'index';
    public function run(){
        $id = intval(\Yii::$app->request->get('id', 0));
        $model = $this->model;
        $info = $model::findOne(['id' => $id]);
        if(!$info){
            trigger_error('没有找到相应内容');
            exit;
        }
        $info->delete();
        return \Yii::$app->controller->redirect([$this->re_url]);
    }
}