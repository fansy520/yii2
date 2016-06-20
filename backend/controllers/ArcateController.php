<?php
namespace backend\controllers;

use backend\actions\DeleteAction;
use common\models\ArticleCategories;
use yii\web\Controller;

class ArcateController extends Controller
{
    public function actionIndex(){
        $lists = ArticleCategories::find()->all();
        return $this->render('index', [
            'lists' => $lists,
        ]);
    }

    public function actions(){
        return [
            'delete' => [
                'class' => DeleteAction::className(),
                'model' => ArticleCategories::className(),
            ]
        ];
    }

    // 添加文章分类
    public function actionAdd(){
        $model = new ArticleCategories();
        if(\Yii::$app->request->isPost){
            if($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()){
                return $this->redirect(['index']);
            }
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }


    public function actionEdit(){
        $id = \Yii::$app->request->get('id');
        $model = ArticleCategories::find()->where(['id' => $id])->one();
        if(\Yii::$app->request->isPost){
            if($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()){
                return $this->redirect(['index']);
            }
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

//    public function actionDelete(){
//        $id = intval(\Yii::$app->request->get('id', 0));
////        $category = ArticleCategories::find()->where(['id' => $id])->one();
//        $category = ArticleCategories::findOne(['id' => $id]);
//        if(!$category){
//            trigger_error('不能删除这条数据!');
//        }else{
//            $category->delete();
//            return $this->redirect(['index']);
//        }
//    }
}