<?php
namespace frontend\controllers;

use common\models\Articles;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex(){
        $cid = intval(\Yii::$app->request->get('category_id', 1));
        if($cid < 1){
            $cid = 1;
        }
        $lists = Articles::find()->where(['category_id' => $cid])->all();
        return $this->render('index', [
            'lists' => $lists,
        ]);
    }

    public function actionDetail(){
        $id = intval(\Yii::$app->request->get('id', 1));
        if($id < 1){
            $id = 1;
        }
        $article = Articles::findOne(['id' => $id]);
        if(!$article){
            trigger_error('没有找到内容');
            exit;
        }
        $article->addClickCount();
        return $this->render('detail', [
            'article' => $article,
        ]);
    }
}