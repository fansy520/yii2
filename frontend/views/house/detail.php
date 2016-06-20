<div class="container-fluid">
    <div class="blank"></div>
    <h3 class="noticeDetailTitle"><strong><?=$house->title?></strong></h3>
    <div class="noticeDetailInfo">发布者:<?=$house->admin_user_id?></div>
    <div class="noticeDetailInfo">发布时间：<?=date('Y-m-d', $house->create_time)?></div>
    <div class="noticeDetailInfo">联系电话：<?=$house->phone?></div>
    <h4 class="text-danger">价格:<?=$house->price?><?=$house->type==1 ? '万元' : '元/月'?></h4>
    <div class="noticeDetailContent">
        <p><?=$house->intro?></p>
        <?php
        $img = explode(',', $house->images);
        if($img){
            foreach($img as $i){
                echo '<img src="'.$i.'" />';
            }
        }
        ?>
    </div>
</div>