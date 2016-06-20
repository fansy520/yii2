<div class="container-fluid">
    <div class="blank"></div>
    <h3 class="noticeDetailTitle"><strong><?=$article->title?></strong></h3>
    <div class="noticeDetailInfo">发布者:<?=$article->adminnickname?></div>
    <div class="noticeDetailInfo">发布时间：<?=date('Y-m-d', $article->create_time)?></div>
    <div class="noticeDetailContent">
        <?=$article->content?>
    </div>
</div>