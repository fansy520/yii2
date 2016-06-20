<?php
namespace frontend\controllers;

use common\models\House;
use yii\web\Controller;

class HouseController extends Controller
{
    public function actionIndex(){
        $zuFang = House::find()->where(['type' => 0])->orderBy('create_time desc')->all();
        $shouFang = House::find()->where(['type' => 1])->orderBy('create_time desc')->all();

        return $this->render('index', [
            'zuFang' => $zuFang,
            'shouFang' => $shouFang,
        ]);
    }

    public function actionDetail(){
        $id = intval(\Yii::$app->request->get('id', 1));
        $house = House::findOne(['id' => $id]);
        return $this->render('detail', [
            'house' => $house,
        ]);
    }
}