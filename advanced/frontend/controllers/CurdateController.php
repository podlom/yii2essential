<?php
/**
 * Created by Sublime Text 3.
 * User: Тарас
 * Date: 29.11.2016
 */

namespace frontend\controllers;


use yii\web\Controller;


class CurdateController extends Controller
{
	public function actionIndex()
    {
    	$curDate = date('d.m.Y H:i');
    	
        return $this->render('index', ['curDate' => $curDate]);
    }
}
