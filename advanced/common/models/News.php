<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $date
 * @property string $title
 * @property string $announce
 * @property string $news_text
 * @property string $source_url
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['title', 'source_url', 'created_at', 'updated_at'], 'required'],
            [['announce', 'news_text'], 'string'],
            [['user_id'], 'integer'],
            [['title', 'source_url'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'title' => 'Title',
            'announce' => 'Announce',
            'news_text' => 'News Text',
            'source_url' => 'Source Url',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
