<h4>报修管理</h4>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>信息</th>
            <th>标题</th>
            <th>内容</th>
            <th>备注</th>
            <th>处理状态</th>
            <th>发布者</th>
            <th>发布时间</th>
            <th>最后更新时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($lists as $list):?>
        <tr>
            <td><?=$list->id?></td>
            <td><?=$list->name?> - <?=$list->phone?> - <?=$list->address?></td>
            <td><?=$list->title?></td>
            <td><?=$list->intro?></td>
            <td><?=$list->beizhu?></td>
            <td><?=$status[$list->status]?></td>
            <td><?=$list->user_id?></td>
            <td><?=date('Y-m-d H:i:s', $list->create_time)?></td>
            <td><?=date('Y-m-d H:i:s', $list->update_time)?></td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['edit', 'id' => $list->id])?>">处理</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>