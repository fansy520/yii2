<?php

use yii\db\Migration;

class m160612_031617_create_baoxiu extends Migration
{
    public function up()
    {
        $this->createTable('repairs', [
            'id' => $this->primaryKey(),
            // 用户姓名
            'name' => $this->string()->notNull(),
            // 用户电话
            'phone' => $this->string(12)->notNull(),
            // 用户地址
            'address' => $this->string()->notNull(),
            // 报修标题
            'title' => $this->string()->notNull(),
            // 报修详细内容
            'intro' => $this->text()->notNull(),
            // 附加的图片s
            'images' => $this->text(),
            // 哪个用户提交的
            'user_id' => $this->integer(),
            // 0未处理 1正在处理 2处理完成
            'status' => $this->smallInteger()->defaultValue(0),
            // 备注
            'beizhu' => $this->text(),
            // 用户提交的时间
            'create_time' => $this->integer(),
            // 处理更新的时间
            'update_time' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('baoxiu');
    }
}
