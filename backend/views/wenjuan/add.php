<h4>添加问卷</h4>
<?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
<?=$form->field($model, 'title')->textInput()->label('问卷标题')?>
<?=$form->field($model, 'intro')->textInput()->label('问卷简介')?>
<?=$form->field($model, 'deadline_time')->textInput(['type' => 'datetime-local'])->label('到期时间')?>
<?=$form->field($model, 'head_img')->fileInput()?>
<?=\yii\helpers\Html::submitButton('提交', ['class' => 'btn btn-danger'])?>
<?php \yii\bootstrap\ActiveForm::end();?>
