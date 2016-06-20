<?php
namespace frontend\controllers;

use common\models\Daan;
use common\models\Wenjuan;
use common\models\Wenti;
use yii\web\Controller;

class WenjuanController extends Controller
{
    /**
     * 问卷首页 问卷列表
     * @return string
     */
    public function actionIndex(){
        $lists = Wenjuan::find()->all();
        return $this->render('index', [
            'lists' => $lists,
        ]);
    }

    /**
     * 问卷详情
     * @return string|\yii\web\Response
     */
    public function actionDetail(){
        // id 问卷ID
        $id = \Yii::$app->request->get('id');
        // 获取当前问卷实例
        $wenjuan = Wenjuan::findOne(['id' => $id]);
        // 看当前用户是否已经回答过这个问卷
        if(Daan::findOne(['wenjuan_id' => $id, 'user_id' => \Yii::$app->user->id])){
            return $this->render('detail-non');
        }
        // 如果是POST 表示提交问卷
        if(\Yii::$app->request->isPost){
            // 获取提交的数据
            $postInfo = \Yii::$app->request->post('answer');
            // 分析提交的数据
            foreach($postInfo as $wenti_id => $info){
                $wenti = Wenti::findOne(['id' => $wenti_id]);
                if($wenti->type == 0) {
                    $daan = new Daan();
                    $daan->wenjuan_id = $id;
                    $daan->user_id = \Yii::$app->user->id;
                    $daan->create_time = time();
                    $daan->wenti_id = $wenti_id;
                    $daan->xuanxiang_id = $info;
                    $daan->save();
                }elseif($wenti->type == 1 && is_array($info)){
                    foreach($info as $childInfo){
                        $daan = new Daan();
                        $daan->wenjuan_id = $id;
                        $daan->user_id = \Yii::$app->user->id;
                        $daan->create_time = time();
                        $daan->wenti_id = $wenti_id;
                        $daan->xuanxiang_id = $childInfo;
                        $daan->save();
                    }
                }else{
                    $daan = new Daan();
                    $daan->wenjuan_id = $id;
                    $daan->user_id = \Yii::$app->user->id;
                    $daan->create_time = time();
                    $daan->wenti_id = $wenti_id;
                    $daan->content = $info;
                    $daan->save();
                }

            }
            return $this->redirect(['index/service']);
        }
        return $this->render('detail', [
            'wenjuan' => $wenjuan,
        ]);
    }
}