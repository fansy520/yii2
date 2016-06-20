<?php
namespace backend\controllers;

use common\models\Repairs;
use yii\web\Controller;

class RepairController extends Controller
{
    public function actionIndex(){
        $lists = Repairs::find()->orderBy('create_time desc')->all();
        return $this->render('index', [
            'lists' => $lists,
            'status' => ['未处理', '正在处理', '处理完成']
        ]);
    }

    public function actionEdit(){
        $id = \Yii::$app->request->get('id', 0);
        $repair = Repairs::findOne(['id' =>$id]);
        if(!$repair){
            trigger_error('没找到内容');
            exit;
        }
        if(\Yii::$app->request->isPost){
            if($repair->load(\Yii::$app->request->post()) && $repair->validate()){
                $repair->update_time = time();
                $repair->update();
                return $this->redirect(['index']);
            }
            trigger_error('出错了!');
            exit;
        }
        return $this->render('edit', [
            'repair' => $repair,
            'status' => ['未处理', '正在处理', '处理完成']
        ]);
    }
}