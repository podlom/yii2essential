<?php
/**
 * Created by Sublime Text 3.
 * User: Тарас
 * Date: 29.11.2016
 */

echo $this->render('//common/header', [
    'title' => 'Current date and time',
]);

if (!empty($curDate)) {

    ?>
    <hr>
    <div class="row">
        <div class="date"><?=$curDate?></div>
    </div>
    <?php

} else {
    echo '<div class="no-news-msg">Date &amp; time was not set.</div>';
}
