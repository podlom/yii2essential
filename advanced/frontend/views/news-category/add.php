<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NewsCategory */
/* @var $form ActiveForm */
?>
<div class="news-category-add">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'slug') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'added_at')->textInput(['value' => date('Y-m-d H:i:s')]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- news-category-add -->
