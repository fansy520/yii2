<h4>发布内容</h4>
<?php $form = \yii\bootstrap\ActiveForm::begin(['options' => [
    'enctype' => 'multipart/form-data',
]]);?>
<?=$form->field($model, 'title')->textInput()?>
<?=$form->field($model, 'category_id')->dropDownList($cates)?>
<?=$form->field($model, 'click_count')->textInput()?>
<?=$form->field($model, 'image')->fileInput()?>
<?=$form->field($model, 'content')->widget(\backend\components\Ueditor::className(), [
    'options'=>[
        'focus'=>true,
        'toolbars'=> [
            ['fullscreen', 'source', 'undo', 'redo', 'bold', 'italic', 'subscript', 'superscript', 'forecolor', 'backcolor', 'fontsize', 'fontfamily', 'underline', 'strikethrough', 'horizontal', 'insertcode']
        ],
    ],
    'attributes'=>[
        'style'=>'height:300px'
    ]
])?>
<?=\yii\helpers\Html::submitButton('确认发布', ['class' => 'btn btn-info'])?>
<?php \yii\bootstrap\ActiveForm::end();?>
