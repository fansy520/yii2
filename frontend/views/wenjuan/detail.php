<?php $form=\yii\bootstrap\ActiveForm::begin()?>
<div class="container-fluid">
    <div class="blank"></div>
    <h3 class="noticeDetailTitle"><strong><?=$wenjuan->title?></strong></h3>
    <div class="noticeDetailInfo">发布者:XXX小区物管</div>
    <div class="noticeDetailInfo">发布时间：<?=date('Y-m-d', $wenjuan->create_time)?></div>
    <div class="noticeDetailInfo">截止时间：<?=date('Y-m-d', $wenjuan->deadline_time)?></div>
    <div class="noticeDetailContent">
        <form>
            <p><?=$wenjuan->intro?></p>
            <?php foreach($wenjuan->wentis as $key=>$wenti):?>
            <div class="panel panel-default">
                <div class="panel-heading"><?=$key+1?>.<?=$wenti->title?></div>
                <div class="panel-body">
                    <?php if($wenti->type == 0):?>
                        <?php foreach($wenti->xuanxianglists as $xx):?>
                            <div class="form-group">
                                <label>
                                    <input type="radio" value="<?=$xx->id?>" name="answer[<?=$wenti->id?>]" />
                                    <?=$xx->content?>
                                </label>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                    <?php if($wenti->type == 1):?>
                        <?php foreach($wenti->xuanxianglists as $xx):?>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="<?=$xx->id?>" name="answer[<?=$wenti->id?>][]" />
                                    <?=$xx->content?>
                                </label>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                    <?php if($wenti->type == 2):?>
                    <div class="form-group">
                        <textarea name="answer[<?=$wenti->id?>]" class="form-control"></textarea>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="form-group">
                <button type="submit" class="btn btn-danger onlineBtn">确认提交</button>
            </div>
        </form>
    </div>
</div>
<?php \yii\bootstrap\ActiveForm::end()?>