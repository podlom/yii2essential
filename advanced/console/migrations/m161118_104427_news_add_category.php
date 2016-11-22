<?php

use yii\db\Migration;


class m161118_104427_news_add_category extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'category_id', $this->integer());

        $this->addForeignKey('FK_NewsCategory', 'news', 'category_id', 'news_category', 'id', 'CASCADE', 'CASCADE');

        $newsCategoryData = [
            ['id' => 1, 'category_id' => 2],
            ['id' => 2, 'category_id' => 2],
            ['id' => 3, 'category_id' => 2],
            ['id' => 4, 'category_id' => 2],
            ['id' => 5, 'category_id' => 2],
            ['id' => 6, 'category_id' => 1],
            ['id' => 7, 'category_id' => 2],
        ];
        if (!empty($newsCategoryData)) {
            foreach ($newsCategoryData as $d) {
                $this->execute("UPDATE `news` SET `category_id` = '{$d['category_id']}' WHERE `id` = '{$d['id']}'");
            }
        }
    }

    public function down()
    {
        $this->dropForeignKey('FK_NewsCategory', 'news');

        $this->dropColumn('news', 'category_id');
    }
}
