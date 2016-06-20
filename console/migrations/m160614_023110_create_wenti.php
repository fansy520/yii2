<?php

use yii\db\Migration;

class m160614_023110_create_wenti extends Migration
{
    public function up()
    {
        $this->createTable('wenti', [
            // 调查问卷的问题表,
            'id' => $this->primaryKey(),
            'wenjuan_id' => $this->integer(),
            'title' => $this->string(),
            // 0单选 1多选 2用户输入
            'type' => $this->smallInteger()->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('wenti');
    }
}
