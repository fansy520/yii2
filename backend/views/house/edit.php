<style>
    .radio{display: inline-block;}
</style>
<h4>编辑租售信息</h4>
<?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?=$form->field($model, 'title')->textInput()->label('标题')?>
<?=$form->field($model, 'intro')->textInput()->label('简介')?>
<?=$form->field($model, 'phone')->textInput()->label('联系方式')?>
<?=$form->field($model, 'type')->radioList(['租', '售'])->label('租售类型')?>
<?=$form->field($model, 'price')->textInput()->label('价格(租房单位是: 元/月 出售单位: 万元)')?>
<?=$form->field($model, 'images[]')->fileInput(['multiple'=>true])->label('图片')?>
<div style="margin-bottom: 20px;">
    <?php
    $img = explode(',', $model->images);
    if($img){
        foreach($img as $i){
            echo '<img src="'.$i.'" width="100" height="100" />';
        }
    }
    ?>
</div>
<?=\yii\bootstrap\Html::submitButton('确认发布', ['class' => 'btn btn-primary'])?>

<?php \yii\bootstrap\ActiveForm::end(); ?>
