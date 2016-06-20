<h4>问卷回答详情 - <?=$wenjuan->title?></h4>
<p><?=$daan->user->nickname?> 于 <?=date('Y-m-d H:i:s', $daan->create_time)?> 回答 <a href="<?=\yii\helpers\Url::to(['wenjuan/daan', 'id' => $wenjuan->id])?>" class="btn btn-primary">返回</a> </p>
<table class="table">
    <tbody>
    <?php foreach($wenjuan->wentis as $list):?>
        <tr>
            <td>
                <strong><?=$list->title?></strong>
                <p>回答:<?=$list->daans($user_id)?>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
