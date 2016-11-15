<?php
/**
 * Created by PhpStorm.
 * User: Тарас
 * Date: 15.11.2016
 * Time: 11:25
 */

namespace frontend\models;


use common\models\News as CommonNews;


class News extends CommonNews
{
    /**
     * Получение идентификатора новости
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}