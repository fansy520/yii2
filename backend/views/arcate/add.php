<h4>添加文章分类</h4>
<?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['class' => 'form-inline']]); ?>
<?=$form->field($model, 'name')->textInput()->label('分类名称')?>
<div>
<?=\yii\helpers\Html::submitButton('确认提交', ['class' => 'btn btn-danger'])?>
</div>
<?php \yii\bootstrap\ActiveForm::end(); ?>
