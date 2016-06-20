<?php

use yii\db\Migration;

class m160611_014207_create_articles_table extends Migration
{
    public function up()
    {
        $this->createTable('articles', [
            // 主键
            'id' => $this->primaryKey(),
            // 标题
            'title' => $this->string(),
            // 内容
            'content' => $this->text(),
            // 文章分类ID 应该和 文章分类表(article_categories)
            'category_id' => $this->integer(),
            // 点击量(每查看一次文章 +1)
            'click_count' => $this->integer(),
            // 文章的发布时间
            'create_time' => $this->integer(),
            // 文章的发布者(和后台用户的ID对应)
            'admin_user_id' => $this->integer(),
            // 文章图片
            'image' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('articles_table');
    }
}
