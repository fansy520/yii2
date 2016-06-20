<div class="container-fluid">
    <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>
    <?=$form->field($model, 'name')->textInput()->label('您的姓名(必填)')?>
    <?=$form->field($model, 'phone')->textInput()->label('您的电话(必填)')?>
    <?=$form->field($model, 'address')->textInput()->label('您的地址(必填)')?>
    <?=$form->field($model, 'title')->textInput()->label('报修的标题(必填)')?>
    <?=$form->field($model, 'intro')->textarea()->label('内容(详细描述需要报修的内容)')?>
    <?=$form->field($model, 'images')->hiddenInput(['id' => 'images'])->label('')?>
    <div class="form-group">
        <div class="imgBox"></div>
        <div><a id="button"><span class="glyphicon glyphicon-plus onlineUpImg"></span></a></div>
    <label>图片(最多上传5张,可不上传):</label>
    </div>
    <?=\yii\helpers\Html::submitButton('确认提交', ['class' => 'btn btn-primary onlineBtn'])?>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
</div>
<?php
//$this->registerCssFile('@web/uploadfy/uploadify.css');
$this->registerJsFile('@web/js/jquery.html5upload.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$js = <<<T
 var _input = $(".weui_uploader_input").html5_upload({
            url: "{:U('Topic/uploadImg')}",
            sendBoundary: window.FormData || $.browser.mozilla,
            onStart: function (event, total) {
               var uploadImg =  '<li class="weui_uploader_file weui_uploader_status" style="background-image:url(http://shp.qpic.cn/weixinsrc_pic/pScBR7sbqjOBJomcuvVJ6iacVrbMJaoJZkFUIq4nzQZUIqzTKziam7ibg/)">\
                    <div class="weui_uploader_status_content">50%</div>\
                </li>';
                $(uploadImg).appendTo('.weui_uploader_files');
                return true;
            },
            setProgress: function (val) {
                $(".weui_uploader_status_content").text(Math.ceil(val * 100) + "%");
            },
            onFinishOne: function (event, response, name, number, total) {
                $(".weui_uploader_status_content").remove();
                $(".weui_uploader_file").last().css("background-image","url('/Uploads/"+response+"')");
                $(".weui_uploader_file").last().removeClass('weui_uploader_status');
                $(".weui_uploader_input").removeAttr('disabled');

                $('<input type="hidden" name="images[]" value="'+response+'">').appendTo('.imgs');
            },
            onError: function (event, name, error) {
                alert('error while uploading file ' + name);
            }
        });
T;
$this->registerJs($js);
?>