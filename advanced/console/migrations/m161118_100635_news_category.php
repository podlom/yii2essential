<?php

use yii\db\Migration;


class m161118_100635_news_category extends Migration
{
    public function up()
    {
        // drop table if exists
        $this->execute("DROP TABLE IF EXISTS `news_category`");

        $this->createTable('news_category', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'added_at' => $this->timestamp(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        // import news category data to DB
        $newsCategory = [
            ['id' => 1, 'slug' => 'yii2-framework', 'title' => 'New Yii2 framework core version has released'],
            ['id' => 2, 'slug' => 'yii2-extension', 'title' => 'New Yii2 extension version has released'],
        ];

        if (!empty($newsCategory)) {
            foreach ($newsCategory as $nc) {
                $sql = "INSERT INTO `news_category` SET `id` = '{$nc['id']}', `slug` = '{$nc['slug']}', `title` = '{$nc['title']}', `added_at` = CURRENT_TIMESTAMP";
                $this->execute($sql);
            }
        }
    }

    public function down()
    {
        $this->dropTable('news_category');
    }
}
