<?php
/**
 * Created by PhpStorm.
 * User: Тарас
 * Date: 11.11.2016
 * Time: 11:14
 */


if (!empty($title)) {
    ?>
    <h1><?=$title?></h1>
    <?php
}

if (!empty($subheader)) {
    ?>
    <div class="subheader"><?=$subheader?></div>
    <?php
}
