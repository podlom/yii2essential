<?php

namespace frontend\controllers;


use Yii;
use common\models\NewsCategory;
use yii\helpers\ArrayHelper;
use common\models\News;


class NewsCategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $newsCategory = NewsCategory::find()->all();
        $newsCatData = ArrayHelper::toArray($newsCategory, [
            'common\models\NewsCategory' => [
                'slug',
                'title',
            ],
        ]);

        return $this->render('index', [
            'categories' => $newsCatData
        ]);
    }

    public function actionView($slug)
    {
        $category = NewsCategory::find()->where(['slug' => $slug])->one();
        $newsData = [];
        $categoryTitle = '';
        if ($category) {
            $news = News::find()
                ->where(['category_id' => $category->getId()])
                ->all();
            $newsData = ArrayHelper::toArray($news, [
                'common\models\News' => [
                    'date',
                    'title',
                    'announce',
                    'source_url',
                ],
            ]);
            $categoryTitle = $category->getTitle();
        }

        return $this->render('view', [
            'categoryTitle' => $categoryTitle,
            'categoryNews' => $newsData,
        ]);
    }

    public function actionAdd()
    {
        $model = new NewsCategory();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                // return;
                $model->save();
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

}
