<?php

use yii\helpers\Url;


/* @var $this yii\web\View */

echo $this->render('//common/header', [
    'title' => 'Yii2 news categories',
]);

if (!empty($categories)) {
    echo '<ul class="news-categories">';
    foreach ($categories as $c) {
        echo '<li><a href="' . Url::to(Yii::getAlias('@web') . '/news-category/view/' . $c['slug']) . '">' . $c['title'] . '</a></li>';
    }
    echo '</ul>';
} else {
    echo '<p>No news categories added yet.<p>';
}
