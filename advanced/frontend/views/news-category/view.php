<?php
/* @var $this yii\web\View */

echo $this->render('//common/header', [
    'title' => 'News in category: ' . $categoryTitle,
]);

if (!empty($categoryNews)) {
    foreach ($categoryNews as $n) {
        echo '<div>' .
            '<span class="news-title-link"><a href="' . $n['source_url'] . '">' . $n['title'] . '</a></span>' .
            '<span class="news-published"> (published at ' . $n['date'] . ')</span>' .
            '<p>' . $n['announce'] . '</p>' . '</div>';
    }
} else {
    echo '<p>No news added yet to this category.</p>';
}