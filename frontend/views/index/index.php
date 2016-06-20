<div class="container-fluid">
    <div class="indexImg row">
        <img src="<?=\yii\helpers\Url::to('@web/image/index.png')?>" width="100%" />
    </div>
    <div class="serviceList text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <a href="<?=\yii\helpers\Url::to(['article/index', 'category_id' => 1])?>">
                        <div class="indexLabel label-danger">
                            <span class="glyphicon glyphicon-bullhorn"></span><br/>
                            小区通知
                        </div>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?=\yii\helpers\Url::to(['article/index', 'category_id' => 2])?>">
                        <div class="indexLabel label-warning">
                            <span class="glyphicon glyphicon-ok-circle"></span><br/>
                            便民服务
                        </div>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?=\yii\helpers\Url::to(['repair/index'])?>">
                        <div class="indexLabel label-info">
                            <span class="glyphicon glyphicon-heart-empty"></span><br/>
                            在线报修
                        </div>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?=\yii\helpers\Url::to(['article/index', 'category_id' => 3])?>">
                        <div class="indexLabel label-success">
                            <span class="glyphicon glyphicon-briefcase"></span><br/>
                            商家活动
                        </div>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?=\yii\helpers\Url::to(['house/index'])?>">
                        <div class="indexLabel label-primary">
                            <span class="glyphicon glyphicon-usd"></span><br/>
                            小区租售
                        </div>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="notice.html">
                        <div class="indexLabel label-default">
                            <span class="glyphicon glyphicon-apple"></span><br/>
                            小区活动
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>