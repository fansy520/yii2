<?php
namespace frontend\controllers;

use common\models\User;
use yii\web\Controller;

class LoginController extends Controller
{
    public function actionIndex(){
        /**
         * 流程:
         * 通过获得的OPENID 去查找是否存在这个用户,如果存在则登录,不存在要先注册用户再登录
         */
        $openid = '123456789';
        $nickname = '张三';
        /**
         * 昵称
         * 头像
         * 地理位置
         */
        $user = User::findOne(['username' => $openid]);
        if(!$user){
            // 注册
            $user = new User();
            $user->username = $openid;
            $user->auth_key = $openid;
            $user->password_hash = \Yii::$app->security->generatePasswordHash($openid);
            $user->email = $openid . '@qq.com';
            $user->type = 0;
            $user->nickname = $nickname;
            $user->save();
        }
        // 登录!
        \Yii::$app->user->login($user);
    }
}