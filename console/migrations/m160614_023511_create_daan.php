<?php

use yii\db\Migration;

class m160614_023511_create_daan extends Migration
{
    public function up()
    {
        $this->createTable('daan', [
            // 调查问卷的答案表
            'id' => $this->primaryKey(),
            // 问卷ID 与问卷关联
            'wenjuan_id' => $this->integer(),
            // 问题ID
            'wenti_id' => $this->integer(),
            // 选项ID
            'xuanxiang_id' => $this->integer(),
            // 用户输入的答案
            'content' => $this->text(),
            // 回答的用户
            'user_id' => $this->integer(),
            // 回答的时间
            'create_time' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('daan');
    }
}
