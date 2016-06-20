<?php
namespace frontend\controllers;

use common\models\Repairs;
use yii\web\Controller;

class RepairController extends Controller
{
    /**
     * 提交在线报修
     */
    public function actionIndex(){
        $model = new Repairs();
        if(\Yii::$app->request->isPost){
            // 绑定并且验证数据
            if($model->load(\Yii::$app->request->post()) && $model->validate()){
                $model->user_id = \Yii::$app->user->id;
                $model->create_time = time();
                $model->update_time = time();
                $model->save();
                if(!$model->hasErrors()) {
                    return $this->redirect(['index/index']);
                }
            }
            trigger_error('保存失败!');
            exit;
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}