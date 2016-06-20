<?php
namespace frontend\controllers;

use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class UploadController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex(){
        // 用来处理上传图片

        // 允许上传的文件后缀
        $extensions = ['jpg', 'png', 'gif', 'jpeg'];
        // 将上传文件绑定到 $image上,$image是一个uploadedFile的实例化对象
        $image = UploadedFile::getInstanceByName('Filedata');
        // 生成随机名字
        $name = \Yii::$app->security->generateRandomString(16) . '_' .time();
        // 验证文件后缀是否被允许
        if(!in_array($image->extension, $extensions)){
            echo 'Invalid file type.';
            exit;
        }
        // 是否有文件上传
        if($image->size > 0){
            // 拼接完整的文件名
            $name .= '.'.$image->extension;
            // 将文件上传到服务器上
            $image->saveAs('uploads/'.$name);
        }
        // 返回JSON数据
        return Json::encode([
            'url' => Url::base(true) . '/uploads/'.$name,
            'msg' => '上传成功!',
            'status' => 1
        ]);
    }
}