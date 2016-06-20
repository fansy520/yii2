<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * 业主认证
 * Class CheckController
 * @package frontend\controllers
 */
class CheckController extends Controller
{
    public function actionIndex(){
        if(\Yii::$app->user->isGuest){
            // 没有登录不能进行认证
            exit('你必须先登录才能进行认证');
        }
        return $this->render('index');
    }
}