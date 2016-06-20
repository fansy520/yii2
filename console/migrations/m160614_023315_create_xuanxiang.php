<?php

use yii\db\Migration;

class m160614_023315_create_xuanxiang extends Migration
{
    public function up()
    {
        $this->createTable('xuanxiang', [
            // 调查问卷问题选项表
            'id' => $this->primaryKey(),
            'wenti_id' => $this->integer(),
            // 选项的内容
            'content' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('xuanxiang');
    }
}
