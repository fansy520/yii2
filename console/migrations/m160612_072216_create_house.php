<?php

use yii\db\Migration;

class m160612_072216_create_house extends Migration
{
    public function up()
    {
        $this->createTable('house', [
            // 主键
            'id' => $this->primaryKey(),
            // 图片列表
            'images' => $this->string(),
            // 标题
            'title' => $this->string(),
            // 简介
            'intro' => $this->string(),
            // 价格(租房的时候应该 x元/月 总价:x万元)
            'price' => $this->decimal(),
            // 联系方式
            'phone' => $this->string(12),
            // 发布时间
            'create_time' => $this->integer(),
            // 发布者
            'admin_user_id' => $this->integer(),
            // 租售类型(0租房 1出售)
            'type' => $this->smallInteger()->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('house');
    }
}
