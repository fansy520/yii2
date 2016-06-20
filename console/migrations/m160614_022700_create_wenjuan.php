<?php

use yii\db\Migration;

class m160614_022700_create_wenjuan extends Migration
{
    public function up()
    {
        $this->createTable('wenjuan', [
            // 主键
            'id' => $this->primaryKey(),
            // 问卷标题
            'title' => $this->string(),
            'create_time' => $this->integer(),
            'deadline_time' => $this->integer(),
            // 0正在接受调查 1结束
            'status' => $this->smallInteger()->defaultValue(0),
            'intro' => $this->text(),
            'admin_user_id' => $this->integer(),
            'head_img' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('wenjuan');
    }
}
