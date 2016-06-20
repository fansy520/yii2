<?php
namespace backend\controllers;

use backend\actions\DeleteAction;
use common\models\House;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\View;

class HouseController extends Controller
{
    public function actions(){
        return [
            'delete' => [
                'class' => DeleteAction::className(),
                'model' => House::className(),
            ]
        ];
    }
    public function actionIndex(){
        $lists = House::find()->orderBy('create_time desc')->all();
        return $this->render('index', [
            'lists' => $lists,
            'types' => ['租', '售'],
        ]);
    }


    public function actionAdd(){
        $model = new House();
        if(\Yii::$app->request->isPost){
            // 接收数据
            if($model->load(\Yii::$app->request->post()) && $model->validate()){
                // 上传图片
                if($model->images = UploadedFile::getInstances($model, 'images')){
                    // 将所有图片的地址都放在这个数组中
                    $images = [];
                    foreach($model->images as $img){
                        $name = \Yii::$app->security->generateRandomString(rand(6, 32));
                        $name .= '.'.$img->extension;
                        $img->saveAs('uploads/'.$name);
                        $images[] = Url::base(true) . '/uploads/'.$name;
                    }
                    // 拼接成字符串
                    $model->images = join(',', $images);
                }else{
                    $model->images = '';
                }
                $model->create_time = time();
                $model->admin_user_id = \Yii::$app->user->id;
                $model->save();
                // 保存成功
                return $this->redirect(['index']);
            }
            trigger_error('保存失败!');
            exit;
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionEdit(){
        $id = intval(\Yii::$app->request->get('id', 1));
        $model = House::findOne(['id' => $id]);
        if(!$model){
            trigger_error('没有找到数据');
            exit;
        }
        if(\Yii::$app->request->isPost){
            // 接收数据
            if($model->load(\Yii::$app->request->post()) && $model->validate()) {
                // 判断图片上传之后赋值是否成功(是否重新上传图片)
                if ($model->images = UploadedFile::getInstances($model, 'images')) {
                    // 将所有图片的地址都放在这个数组中
                    $images = [];
                    foreach ($model->images as $img) {
                        $name = \Yii::$app->security->generateRandomString(rand(6, 32));
                        $name .= '.' . $img->extension;
                        $img->saveAs('uploads/' . $name);
                        $images[] = Url::base(true) . '/uploads/' . $name;
                    }
                    // 拼接成字符串
                    $model->images = join(',', $images);
                }else{
                    // 如果没有上传图片,直接删除
                    unset($model->images);
                }
                $model->update();
                // 保存成功
                return $this->redirect(['index']);
            }
            trigger_error('保存失败!');
            exit;
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }
}