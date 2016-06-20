<?php
namespace frontend\controllers;

use yii\web\Controller;

class MyController extends Controller
{
    public function actionIndex(){
        var_dump(\Yii::$app->session->get('userInfo'));
    }
}