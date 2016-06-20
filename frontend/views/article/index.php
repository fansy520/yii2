<div class="container-fluid">
    <?php foreach($lists as $list):?>
    <div class="row noticeList">
        <a href="<?=\yii\helpers\Url::to(['article/detail', 'id' => $list->id])?>">
            <div class="col-xs-2">
                <img class="noticeImg" src="<?=$list->image?$list->image:'/image/5.png'?>" />
            </div>
            <div class="col-xs-10">
                <p class="title"><?=$list->title?></p>
                <p class="intro"><?=mb_substr(strip_tags($list->content), 0, 10, 'utf-8')?></p>
                <p class="info">浏览: <?=$list->click_count?> <span class="pull-right"><?=date('Y-m-d', $list->create_time)?></span> </p>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>