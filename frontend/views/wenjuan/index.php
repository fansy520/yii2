<div class="container-fluid">
    <?php foreach($lists as $list):?>
    <div class="row noticeList">
        <a href="<?=\yii\helpers\Url::to(['wenjuan/detail', 'id' => $list->id])?>">
            <div class="col-xs-2">
                <img class="noticeImg" src="<?=$list->head_img?>" />
            </div>
            <div class="col-xs-10">
                <p class="title"><?=$list->title?></p>
                <p class="intro"><?=mb_substr($list->intro, 0, 18, 'utf-8')?></p>
                <p class="info">参与人数: <?=$list->canyurenshu?> <span class="pull-right">截止时间:<?=date('Y-m-d')?></span> </p>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>