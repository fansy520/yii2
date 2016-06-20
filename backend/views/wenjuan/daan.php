<h4>问卷回答 - <?=$wenjuan->title?></h4>
<table class="table">
    <thead>
        <tr>
            <th>问卷名字</th>
            <th>回答人</th>
            <th>回答时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($lists as $list):?>
        <tr>
            <td><?=$wenjuan->title?></td>
            <td><?=$list->user->nickname?></td>
            <td><?=date('Y-m-d H:i:s', $list->create_time)?></td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['wenjuan/daandetail', 'user_id' => $list->user_id, 'wenjuan_id' => $wenjuan->id])?>">答案详情</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
