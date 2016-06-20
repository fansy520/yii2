<h4>编辑问题 - <?=$wenjuan->title?></h4>
<?php $form = \yii\bootstrap\ActiveForm::begin()?>
<?=$form->field($model, 'title')->textInput()->label('问题标题')?>
<?=$form->field($model, 'type')->dropDownList(['单选', '多选', '用户输入'])->label('问题类型')?>
<div class="form-group">
    <label>所有选项</label>
    <input type="text" class="form-control" name="xuanxiangs" value="<?=$model->xuanxiangs?>" />
</div>
<?=\yii\helpers\Html::submitButton('提交', ['class' => 'btn btn-danger'])?>
<?php \yii\bootstrap\ActiveForm::end()?>
