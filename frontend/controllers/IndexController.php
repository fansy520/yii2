<?php
namespace frontend\controllers;

use common\models\Articles;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionService(){
        return $this->render('service');
    }
}