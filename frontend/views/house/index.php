<?php
use yii\bootstrap\ActiveForm;
?>
<div class="container-fluid">
    <div class="blank"></div>
    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
        <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">租</a></li>
            <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">售</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <p class="text-danger">免费提供小区内的租房信息</p>
                <div class="row">
                    <?php foreach($zuFang as $zu):?>
                    <div class="col-xs-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?=$zu->img?>" alt="...">
                            <div class="caption">
                                <h4><?=mb_substr($zu->title, 0, 6, 'utf-8')?></h4>
                                <p class="zushouInfo"><?=$zu->intro?></p>
                                <p class="text-danger"><?=$zu->price?>元/月</p>
                                <p><a href="<?=\yii\helpers\Url::to(['house/detail', 'id' => $zu->id])?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                <div class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <p class="text-danger">免费提供小区内的二手房信息</p>
                    <div class="row">
                        <?php foreach($shouFang as $shou):?>
                            <div class="col-xs-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="<?=$shou->img?>" alt="...">
                                    <div class="caption">
                                        <h4><?=mb_substr($shou->title, 0, 6, 'utf-8')?></h4>
                                        <p class="zushouInfo"><?=$shou->intro?></p>
                                        <p class="text-danger"><?=$shou->price?>万元</p>
                                        <p><a href="<?=\yii\helpers\Url::to(['house/detail', 'id' => $shou->id])?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>