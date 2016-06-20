<?php
namespace backend\controllers;

use backend\actions\DeleteAction;
use common\models\Daan;
use common\models\Wenjuan;
use common\models\Wenti;
use common\models\Xuanxiang;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class WenjuanController extends Controller
{

    /**
     * 调用公用方法
     * delete: 删除问卷
     * deletewenti: 删除问题
     * @return array
     */
    public function actions(){
        return [
            'delete' => [
                'class' => DeleteAction::className(),
                'model' => Wenjuan::className(),
            ],
            'deletewenti' => [
                'class' => DeleteAction::className(),
                'model' => Wenti::className(),
            ],
        ];
    }

    /**
     * @return string
     * 需求:
     * 完成调查问卷
     * 1.建表
     * ........
     * 2. 程序
     * .......
     */

    /**
     * 问卷列表
     * @return string
     */
    public function actionIndex(){
        // 获取所有的问卷列表,通过创建时间排序
        $lists = Wenjuan::find()->orderBy('create_time desc')->all();
        return $this->render('index', [
            'lists' => $lists,
        ]);
    }

    /**
     * 添加问卷
     * @return string|\yii\web\Response
     */
    public function actionAdd(){
        // 实例化得到问卷模型
        $model = new Wenjuan();
        // 如果是POST请求表示提交新增问卷
        if(\Yii::$app->request->isPost){
            // 自动加载数据和验证数据
            if($model->load(\Yii::$app->request->post()) && $model->validate()){
                // 将问卷的截止时间转换成时间戳
                $model->deadline_time = ''.strtotime(str_replace('T', ' ', $model->deadline_time));

                // 加载上传文件, 如果有则要进行上传
                $img = UploadedFile::getInstance($model, 'head_img');
                if($img){
                    // 生成随机的文件名
                    $name = \Yii::$app->security->generateRandomString(rand(6, 32));
                    $img->saveAs('uploads/'.$name.'.'.$img->extension);
                    // 将http....也绑定到图片地址上,以便访问
                    $model->head_img = Url::base('true') . '/uploads/'.$name.'.'.$img->extension;
                }
                // 创建时间
                $model->create_time = time();
                // 创建用户的ID
                $model->admin_user_id = \Yii::$app->user->id;
                // 执行保存
                $model->save();
                // 保存成功跳转到首页
                return $this->redirect(['index']);
            }
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

    /**
     * 调查问卷的问题列表,必须依赖问卷的ID
     * @return string
     */
    public function actionWenti(){
        // 获取传递过来的问卷ID
        $wenjuanId = \Yii::$app->request->get('id');
        // 通过问卷ID获取到问卷实例
        $wenjuan = Wenjuan::findOne(['id' => $wenjuanId]);
        // 查询出当前问卷的所有问题
        $wentiLists = Wenti::find()->where(['wenjuan_id' => $wenjuanId])->all();
        return $this->render('wenti', [
            'wentiLists' => $wentiLists,
            'wenjuan' => $wenjuan,
            // 将问题类型作为数组传递给视图
            'wentiTypes' => ['单选', '多选', '用户输入'],
        ]);
    }

    /**
     * 添加问题. 需要获取到问卷ID
     * @return string|\yii\web\Response
     */
    public function actionAddwenti(){
        // 问卷ID
        $wenjuanId = \Yii::$app->request->get('wenjuan_id');
        // 通过问卷ID获取到问卷实例
        $wenjuan = Wenjuan::findOne(['id' => $wenjuanId]);
        // 实例化问题模型
        $model = new Wenti();
        // 如果是POST请求,则表示请求数据(新增)
        if(\Yii::$app->request->isPost){
            // 加载数据 验证数据
            if($model->load(\Yii::$app->request->post()) && $model->validate()){
                // 获取到传递过来的所有选项,格式 1,2,3,4
                $xuanxiangs = \Yii::$app->request->post('xuanxiangs');
                // 如果传递过来的问题类型不是用户输入,则必须要传递选项,不然不能通过
                if($model->type != 2){
                    if(!$xuanxiangs){
                        trigger_error('请填写选项');
                        exit;
                    }
                }
                //绑定问卷ID
                $model->wenjuan_id = $wenjuanId;
                $model->save();

                // 问题保存成功之后,需要将问题的选项也存在数据库中
                $xuanxiangs = explode(',', $xuanxiangs);
                foreach($xuanxiangs as $xx){
                    // 循环插入数据
                    $xuanxiangModel = new Xuanxiang();
                    $xuanxiangModel->wenti_id = $model->id;
                    $xuanxiangModel->content = $xx;
                    $xuanxiangModel->save();
                }
                // 保存成功跳转到问题列表,需要传入问卷ID
                return $this->redirect(['wenti', 'id' => $wenjuanId]);
            }
        }
        return $this->render('addwenti', [
            'model' => $model,
            'wenjuan' => $wenjuan,
        ]);
    }

    /**
     * 编辑问卷
     * @return string|\yii\web\Response
     */
    public function actionEdit(){
        // id 是问卷ID
        $id = \Yii::$app->request->get('id');
        // 获取到问卷实例
        $model = Wenjuan::findOne(['id' => $id]);

        // 如果是POST请求,表示执行编辑
        if(\Yii::$app->request->isPost){
            // 加载和验证数据
            if($model->load(\Yii::$app->request->post()) && $model->validate()){
                // 将时间转换成时间戳
                $model->deadline_time = ''.strtotime(str_replace('T', ' ', $model->deadline_time));
                // 获取上传文件的实例
                $img = UploadedFile::getInstance($model, 'head_img');
                if($img){
                    // 如果有上传文件则保存文件
                    $name = \Yii::$app->security->generateRandomString(rand(6, 32));
                    $img->saveAs('uploads/'.$name.'.'.$img->extension);
                    $model->head_img = Url::base(true) . '/uploads/'.$name.'.'.$img->extension;
                }else{
                    // 没有上传文件 - 直接删除原来的值
                    unset($model->head_img);
                }
                // 执行更新
                $model->update();
                return $this->redirect(['index']);
            }
        }

        // 显示的时候,要将时间戳转换成日期格式显示
        $model->deadline_time = date('Y-m-d H:i', $model->deadline_time);
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * 修改问题
     * @return string|\yii\web\Response
     */
    public function actionEditwenti(){
        // id 是问题ID
        $id = \Yii::$app->request->get('id');
        // 获取问题实例
        $model = Wenti::findOne(['id' => $id]);
        // 根据问题对应的问卷ID获取问卷实例
        $wenjuan = Wenjuan::findOne(['id' => $model->wenjuan_id]);

        // 如果是POST 则表示提交
        if(\Yii::$app->request->isPost){
            // 加载和验证
            if($model->load(\Yii::$app->request->post()) && $model->validate()){
                // 获取选项
                $xuanxiangs = \Yii::$app->request->post('xuanxiangs');
                if($model->type != 2){
                    if(!$xuanxiangs){
                        trigger_error('请填写选项');
                        exit;
                    }
                }
                // 执行更新
                $model->update();
                $xuanxiangs = explode(',', $xuanxiangs);
                // 先删除所有的选项,再新增进去
                Xuanxiang::deleteAll(['wenti_id' => $model->id]);
                foreach($xuanxiangs as $xx){
                    $xuanxiangModel = new Xuanxiang();
                    $xuanxiangModel->wenti_id = $model->id;
                    $xuanxiangModel->content = $xx;
                    $xuanxiangModel->save();
                }
                return $this->redirect(['wenti', 'id' => $wenjuan->id]);
            }
        }


        return $this->render('editwenti', [
            'model' => $model,
            'wenjuan' => $wenjuan,
        ]);
    }


    /**
     * 查看当前问卷的答案列表
     * @return string
     */
    public function actionDaan(){
        // id 是问卷ID
        $id = \Yii::$app->request->get('id');
        $wenjuan = Wenjuan::findOne(['id' => $id]);
        // 根据问卷ID获取到所有的问卷答案列表,以用户ID分组
        $lists = Daan::find()->where(['wenjuan_id' => $id])->groupBy('user_id')->all();
        return $this->render('daan', [
            'lists' => $lists,
            'wenjuan' => $wenjuan,
        ]);
    }

    /**
     * 答案详情
     * @return string
     */
    public function actionDaandetail(){
        // 问卷ID
        $wenjuan_id = \Yii::$app->request->get('wenjuan_id');
        // 用户ID
        $user_id = \Yii::$app->request->get('user_id');
        // 获取到当前答案的一个实例(用于获取时间)
        $daan = Daan::find()->where(['wenjuan_id' => $wenjuan_id, 'user_id'=>$user_id])->groupBy('user_id')->one();
        // 获取当前问卷实例
        $wenjuan = Wenjuan::findOne(['id' => $wenjuan_id]);
        return $this->render('daandetail', [
            'wenjuan' => $wenjuan,
            'user_id' => $user_id,
            'daan' => $daan,
        ]);
    }
}