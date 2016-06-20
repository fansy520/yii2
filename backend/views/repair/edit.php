<h4>处理报修</h4>
<?php $form = \yii\bootstrap\ActiveForm::begin()?>
<table class="table">
    <tbody>
    <tr>
        <td width="100">信息</td>
        <td><?=$repair->name?> - <?=$repair->phone?> - <?=$repair->address?></td>
    </tr>
    <tr>
        <td width="100">报修标题</td>
        <td><?=$repair->title?></td>
    </tr>
    <tr>
        <td width="100">报修内容</td>
        <td><?=$repair->intro?></td>
    </tr>
    <tr>
        <td width="100">提交时间</td>
        <td><?=date('Y-m-d H:i:s', $repair->create_time)?></td>
    </tr>
    <tr>
        <td width="100">最后处理时间</td>
        <td><?=date('Y-m-d H:i:s', $repair->update_time)?></td>
    </tr>
    <tr>
        <td width="100">图片</td>
        <td>
            <?php
            $imgs = $repair->images;
            if($imgs) {
//            'http......,http...'
                $imgs = explode(',', $imgs);
                foreach($imgs as $img){
                    if(!$img) continue;
                    echo '<img src="'.$img.'" width="200" height="200" />';
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>当前状态</td>
        <td>
            <?=$form->field($repair, 'status')->dropDownList($status)->label("")?>
        </td>
    </tr>
    <tr>
        <td>备注</td>
        <td>
            <?=$form->field($repair, 'beizhu')->textarea()->label("")?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?=\yii\helpers\Html::submitButton('确认处理!', ['class' => 'btn btn-danger'])?></td>
    </tr>
    </tbody>
</table>
<?php \yii\bootstrap\ActiveForm::end()?>