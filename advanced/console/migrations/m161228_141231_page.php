<?php

use yii\db\Schema;
use yii\db\Migration;

class m161228_141231_page extends Migration
{
    public function up()
    {
        $this->execute("DROP TABLE IF EXISTS `page`");

        $this->createTable('page', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'added_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ], 'engine = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci');
    }

    public function down()
    {
        $this->dropTable('page');
    }
}
