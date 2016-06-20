<h4>编辑问卷</h4>
<?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
<?=$form->field($model, 'title')->textInput()->label('问卷标题')?>
<?=$form->field($model, 'intro')->textInput()->label('问卷简介')?>
<?=$form->field($model, 'deadline_time')->textInput(['type' => 'datetime-local'])->label('到期时间')?>
<?=$form->field($model, 'head_img')->fileInput()?>
<?php if($model->head_img):?>
    <div class="form-group">
    <img src="<?=$model->head_img?>" width="200" height="200" />
    </div>
<?php endif; ?>
<?=\yii\helpers\Html::submitButton('提交', ['class' => 'btn btn-danger'])?>
<?php \yii\bootstrap\ActiveForm::end();?>
