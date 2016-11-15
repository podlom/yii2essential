<?php

use yii\db\Schema;
use yii\db\Migration;


class m161115_091159_news extends Migration
{
    public function up()
    {
        $this->execute("DROP TABLE IF EXISTS `news`");

        $this->createTable('news', [
            'id' => Schema::TYPE_PK,
            'date' => Schema::TYPE_DATE,
            'title' => Schema::TYPE_CHAR . '(255) NOT NULL',
            'announce' => Schema::TYPE_TEXT,
            'news_text' => Schema::TYPE_TEXT,
            'source_url' => Schema::TYPE_CHAR . '(255) NOT NULL',
            'user_id' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL',
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addForeignKey('fk_user', 'news', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');

        // import news data to DB
        $newsList = [
            ['date' => 'AUG 29, 2016', 'title' => 'Auth Client extension version 2.1.1 released', 'url' => 'http://www.yiiframework.com/news/106/auth-client-extension-version-2-1-1-released/', 'annonce' => 'We are very pleased to announce the release of the Auth Client extension version 2.1.1. This release fixes a critical bug: \yii\authclient\BaseClient::createRequest() ignored defaultRequestOptions and requestOptions, which, in particular, was a reason for the error during GitHub authentication process.'],
            ['date' => 'AUG 29, 2016', 'title' => 'MongoDB extension version 2.1.1 released', 'url' => 'http://www.yiiframework.com/news/107/mongodb-extension-version-2-1-1-released/', 'annonce' => 'We are very pleased to announce the release of MongoDB extension version 2.1.1 which brings 6 enhancements and bug fixes.'],
            ['date' => 'AUG 4, 2016', 'title' => 'HTTP client extension version 2.0.1 released', 'url' => 'http://www.yiiframework.com/news/104/http-client-extension-version-2-0-1-released/', 'annonce' => 'We are very pleased to announce the release of HTTP client extension version 2.0.1 which brings 10 enhancements and bug fixes. See CHANGELOG for details. The most signiifcant change is introduction of beforeSend and afterSend events for the HTTP request:'],
            ['date' => 'AUG 4, 2016', 'title' => 'Auth Client extension version 2.1.0 released', 'url' => 'http://www.yiiframework.com/news/105/auth-client-extension-version-2-1-0-released/', 'annonce' => 'We are very pleased to announce the release of the Auth Client extension version 2.1.0. The main change is that it&quot;s now uses the HTTP Client extension providing more sophisticated base for REST API requests.'],
            ['date' => 'JUL 22, 2016', 'title' => 'JQuery UI extension version 2.0.6 released', 'url' => 'http://www.yiiframework.com/news/103/jquery-ui-extension-version-2-0-6-released/', 'annonce' => 'We are very pleased to announce the release of JQuery UI extension version 2.0.6 which brings important bugfixes for yii\jui\Draggable, yii\jui\Droppable and yii\jui\Resizable. See CHANGELOG for details.'],
            ['date' => 'JUL 11, 2016', 'title' => 'Yii 2.0.9 is released', 'url' => 'http://www.yiiframework.com/news/102/yii-2-0-9-is-released/', 'annonce' => 'We are very pleased to announce the release of Yii Framework version 2.0.9. Please refer to the instructions at http://www.yiiframework.com/download/ to install or upgrade to this version.'],
            ['date' => 'JUL 8, 2016', 'title' => 'AuthClient extension version 2.0.6 released', 'url' => 'http://www.yiiframework.com/news/101/authclient-extension-version-2-0-6-released/', 'annonce' => 'We are very pleased to announce the release of AuthClient extension version 2.0.6 which brings 4 enhancements and bug fixes. See CHANGELOG for details.'],
        ];

        if (!empty($newsList)) {
            foreach ($newsList as $news) {
                $date = DateTime::createFromFormat('M j, Y', $news['date']);
                $dbDate = $date->format('Y-m-d');
                $title = $news['title'];
                $announce = $news['annonce'];
                $url = $news['url'];
                $userId = 1;

                $sql = "INSERT INTO `news` SET `date` = '{$dbDate}', `title` = '{$title}', `announce` = '{$announce}', `source_url` = '{$url}', `user_id` = '{$userId}', `created_at` = NOW(), `updated_at` = NOW()";

                $this->execute($sql);
            }
        }
    }

    public function down()
    {
        $this->dropTable('news');
    }
}
