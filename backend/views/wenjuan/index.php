<h4>问卷管理</h4>
<a href="<?=\yii\helpers\Url::to(['wenjuan/add'])?>" class="btn btn-success">添加问卷</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>问卷名字</th>
            <th>题目数量</th>
            <th>回答数量</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($lists as $list):?>
        <tr>
            <td><?=$list->id?></td>
            <td><?=$list->title?></td>
            <td><?=$list->wenticount?></td>
            <td><?=$list->canyurenshu?></td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['wenjuan/edit', 'id' => $list->id])?>">编辑</a>
                <a href="<?=\yii\helpers\Url::to(['wenjuan/wenti', 'id' => $list->id])?>">题目管理</a>
                <a href="<?=\yii\helpers\Url::to(['wenjuan/daan', 'id' => $list->id])?>">查看回答</a>
                <a data-href="<?=\yii\helpers\Url::to(['wenjuan/delete', 'id' => $list->id])?>" data-toggle="modal" data-target="#myModal" class="deleteBtn">删除</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>