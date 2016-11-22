<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $added_at
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title'], 'required'],
            [['added_at'], 'safe'],
            [['slug', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'added_at' => 'Added At',
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
