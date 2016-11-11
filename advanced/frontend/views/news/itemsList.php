<?php
/**
 * Created by PhpStorm.
 * User: Тарас
 * Date: 11.11.2016
 * Time: 11:09
 */

if (!empty($newsList)) {
    $cNews = count($newsList);
    echo $this->render('//common/header', [
        'title' => 'Yii2 news',
        'subheader' => '<div class="news-count">Displaying ' . $cNews . ' news items.</div>'
    ]);

    foreach ($newsList as $nItem) {
        ?>
        <hr>
        <div class="news-item">
            <div class="date"><?=$nItem['date']?></div>
            <div class="title"><a href="<?=$nItem['source_url']?>"><?=$nItem['title']?></a></div>
            <div class="teaser"><?=$nItem['announce']?></div>
        </div>
        <?php
    }
} else {
    echo '<div class="no-news-msg">No news has been added yet.</div>';
}