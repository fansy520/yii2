<h4>内容管理</h4>
<a href="<?=\yii\helpers\Url::to(['add'])?>" class="btn btn-success">发布内容</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>内容摘要</th>
            <th>所属分类</th>
            <th>点击量</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($lists as $list):?>
        <tr>
            <td><?=$list->id?></td>
            <td><?=$list->title?></td>
            <td><?=mb_substr(strip_tags($list->content), 0, 10, 'utf-8')?></td>
            <td><?=$list->Categoryname?></td>
            <td><?=$list->click_count?></td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['article/edit', 'id' => $list->id])?>">编辑</a>
                <a data-href="<?=\yii\helpers\Url::to(['article/delete', 'id' => $list->id])?>" data-toggle="modal" data-target="#myModal" class="deleteBtn">删除</a>
            </td>
        </tr>
    <?php endforeach; ?>
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
//$str = <<<T
//$('.deleteBtn').click(function(){
//    var _href = $(this).attr('data-href');
//    $('.submitDeleteBtn').attr('href', _href);
//});
//T;
//$this->registerJs($str);
//$this->registerCss('.deleteBtn{color: red;}');
// 加载文件
//$this->registerCssFile('@web/css/my.css');
$this->registerJsFile('@web/js/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>