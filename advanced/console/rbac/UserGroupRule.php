<?php

namespace app\rbac;

 
use Yii;
use yii\rbac\Rule;

 
class UserGroupRule extends Rule
{
    public $name = 'userGroup';
 
    public function execute($user, $item, $params)
    {
        if (!\Yii::$app->user->isGuest) {
            $group = \Yii::$app->user->identity->group;
            if ($item->name === 'admin') {
                return $group == 'admin';
            } elseif ($item->name === 'SEO') {
                return $group == 'admin' || $group == 'SEO';
            } elseif ($item->name === 'CONTENT') {
                return $group == 'admin' || $group == 'CONTENT';
            }
        }
        return true;
    }
}
