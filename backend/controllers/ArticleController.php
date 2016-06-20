<?php
namespace backend\controllers;

use backend\actions\DeleteAction;
use common\models\ArticleCategories;
use common\models\Articles;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class ArticleController extends Controller
{
    /**
     * 显示内容列表
     * @return string
     */
    public function actionIndex(){
        $lists = Articles::find()->all();
        return $this->render('index', [
            'lists' => $lists,
        ]);
    }
    public function actions(){
        return [
            'delete' => [
                'class' => DeleteAction::className(),
                'model' => Articles::className(),
            ]
        ];
    }
    /**
     * 发布内容
     * @return string
     */
    public function actionAdd(){
        $model = new Articles();
        if(\Yii::$app->request->isPost){
            // 接收数据
            if($model->load(\Yii::$app->request->post()) && $model->validate()){
                // 处理上传图片
                $model->image = UploadedFile::getInstance($model, 'image');
                if($model->image && $model->image->size > 0) {
                    $fileName = 'uploads/' . $model->image->name;
                    $model->image->saveAs($fileName);
                    $model->image = Url::base(true) . '/' . $fileName;
                }
                $model->admin_user_id = \Yii::$app->user->id;
                $model->save();
                return $this->redirect(['index']);
            }
        }
        $article_categories = ArticleCategories::find()->all();
        $cates = [];
        foreach($article_categories as $category){
            $cates[$category->id] = $category->name;
        }
        return $this->render('add', [
            'model' => $model,
            'cates' => $cates,

        ]);
    }

    public function actionEdit(){
        $id = intval(\Yii::$app->request->get('id', 0));
        $model = Articles::findOne(['id' => $id]);
        $image = $model->image;
        if(!$model){
            trigger_error('没有找到指定内容');
            exit;
        }
        if(\Yii::$app->request->isPost){
//            var_dump($_FILES);
//            exit;
            // 接收数据
            if($model->load(\Yii::$app->request->post()) && $model->validate()){
                // 处理上传图片

                /**
                 * 1. 检查是否选择图片
                 */
                if($_FILES['Articles']['size']['image'] > 0) {
                    // 上传图片
                    $model->image = UploadedFile::getInstance($model, 'image');
                    if ($model->image && $model->image->size > 0) {
                        $fileName = 'uploads/' . $model->image->name;
                        $model->image->saveAs($fileName);
                        // 将图片地址拼接成完整的URL地址
                        $model->image = Url::base(true) . '/' . $fileName;
                    }
                }else{
                    // 如果没有修改图片,就直接使用原来的图片地址
                    unset($model->image);
//                    $model->image = $image;
                }
                $model->update();
                return $this->redirect(['index']);
            }
        }

        $article_categories = ArticleCategories::find()->all();
        $cates = [];
        foreach($article_categories as $category){
            $cates[$category->id] = $category->name;
        }
        return $this->render('edit', [
            'model' => $model,
            'cates' => $cates,
        ]);
    }

//    public function actionDelete(){
//        $id = intval(\Yii::$app->request->get('id', 0));
//        $article = Articles::findOne(['id' => $id]);
//        if(!$article){
//            trigger_error('没有找到相应内容');
//            exit;
//        }
//        $article->delete();
//        return $this->redirect(['index']);
//    }
}