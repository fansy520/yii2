<?php

use yii\db\Migration;

class m160611_014906_create_article_categories extends Migration
{
    public function up()
    {
        $this->createTable('article_categories', [
            // 主键ID
            'id' => $this->primaryKey(),
            // 分类名字
            'name' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('article_categories');
    }
}
