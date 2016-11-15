<?php
/**
 * Created by PhpStorm.
 * User: Тарас
 * Date: 11.11.2016
 * Time: 10:58
 */

namespace frontend\controllers;


use yii\web\Controller;
use common\models\News;


class NewsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['items-list'],
                'duration' => 600,
                'variations' => [
                    $_SERVER['HTTP_HOST'],
                    \Yii::$app->language
                ],
                /*
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(id) FROM news',
                ],
                */
            ],
        ];
    }

    /**
     * Test index action.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return 'Test from ' . __METHOD__;
    }

    public function actionItemsList()
    {
        $newsList = News::find()->all();

        return $this->render('itemsList', ['newsList' => $newsList]);
    }

    public function actionItemsListOld()
    {
        $newsList = [
            ['date' => 'AUG 29, 2016', 'title' => 'Auth Client extension version 2.1.1 released', 'source_url' => 'http://www.yiiframework.com/news/106/auth-client-extension-version-2-1-1-released/', 'announce' => 'We are very pleased to announce the release of the Auth Client extension version 2.1.1. This release fixes a critical bug: \yii\authclient\BaseClient::createRequest() ignored defaultRequestOptions and requestOptions, which, in particular, was a reason for the error during GitHub authentication process.'],
            ['date' => 'AUG 29, 2016', 'title' => 'MongoDB extension version 2.1.1 released', 'source_url' => 'http://www.yiiframework.com/news/107/mongodb-extension-version-2-1-1-released/', 'announce' => 'We are very pleased to announce the release of MongoDB extension version 2.1.1 which brings 6 enhancements and bug fixes.'],
            ['date' => 'AUG 4, 2016', 'title' => 'HTTP client extension version 2.0.1 released', 'source_url' => 'http://www.yiiframework.com/news/104/http-client-extension-version-2-0-1-released/', 'announce' => 'We are very pleased to announce the release of HTTP client extension version 2.0.1 which brings 10 enhancements and bug fixes. See CHANGELOG for details. The most signiifcant change is introduction of beforeSend and afterSend events for the HTTP request:'],
            ['date' => 'AUG 4, 2016', 'title' => 'Auth Client extension version 2.1.0 released', 'source_url' => 'http://www.yiiframework.com/news/105/auth-client-extension-version-2-1-0-released/', 'announce' => 'We are very pleased to announce the release of the Auth Client extension version 2.1.0. The main change is that it&quot;s now uses the HTTP Client extension providing more sophisticated base for REST API requests.'],
            ['date' => 'JUL 22, 2016', 'title' => 'JQuery UI extension version 2.0.6 released', 'source_url' => 'http://www.yiiframework.com/news/103/jquery-ui-extension-version-2-0-6-released/', 'announce' => 'We are very pleased to announce the release of JQuery UI extension version 2.0.6 which brings important bugfixes for yii\jui\Draggable, yii\jui\Droppable and yii\jui\Resizable. See CHANGELOG for details.'],
            ['date' => 'JUL 11, 2016', 'title' => 'Yii 2.0.9 is released', 'source_url' => 'http://www.yiiframework.com/news/102/yii-2-0-9-is-released/', 'announce' => 'We are very pleased to announce the release of Yii Framework version 2.0.9. Please refer to the instructions at http://www.yiiframework.com/download/ to install or upgrade to this version.'],
            ['date' => 'JUL 8, 2016', 'title' => 'AuthClient extension version 2.0.6 released', 'source_url' => 'http://www.yiiframework.com/news/101/authclient-extension-version-2-0-6-released/', 'announce' => 'We are very pleased to announce the release of AuthClient extension version 2.0.6 which brings 4 enhancements and bug fixes. See CHANGELOG for details.'],
        ];

        return $this->render('itemsList', ['newsList' => $newsList]);
    }
}