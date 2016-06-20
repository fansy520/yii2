<h4>问题列表 - <?=$wenjuan->title?></h4>
<a href="<?=\yii\helpers\Url::to(['wenjuan/addwenti', 'wenjuan_id' => $wenjuan->id])?>" class="btn btn-success">添加问题</a>
<table class="table">
    <thead>
        <tr>
            <th>问题标题</th>
            <th>问题类型</th>
            <th>问题选项</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($wentiLists as $wt):?>
        <tr>
            <td><?=$wt->title?></td>
            <td><?=$wentiTypes[$wt->type]?></td>
            <td><?=$wt->xuanxiangs?></td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['wenjuan/editwenti', 'id' => $wt->id])?>">编辑</a>
                <a data-href="<?=\yii\helpers\Url::to(['wenjuan/deletewenti', 'id' => $wt->id])?>" data-toggle="modal" data-target="#myModal" class="deleteBtn">删除</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">确定?</h4>
            </div>
            <div class="modal-body">
                你确定要删除吗?删除之后不能恢复!!!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <a class="btn btn-danger submitDeleteBtn">确定删除</a>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJsFile('@web/js/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>