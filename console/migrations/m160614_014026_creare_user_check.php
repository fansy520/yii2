<?php

use yii\db\Migration;

class m160614_014026_creare_user_check extends Migration
{
    public function up()
    {
        $this->createTable('user_check', [
            // 主键
            'id' => $this->primaryKey(),
            // 姓名
            'name' => $this->string()->notNull(),
            // 房号
            'room_num' => $this->string()->notNull(),
            // 与业主的关系 0本人 1亲属 2租户
            'type' => $this->smallInteger()->defaultValue(0),
            // 联系电话
            'phone' => $this->string(),
            // 身份证号码
            'idcard' => $this->string(18),
            // 认证状态 0已经提交 1认证通过 2认证失败
            'status' => $this->smallInteger()->defaultValue(0),
            'create_time' => $this->integer(),
            'update_time' => $this->integer(),
        ]);
    }

    public function down()
    {
        echo "m160614_014026_creare_user_check cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
