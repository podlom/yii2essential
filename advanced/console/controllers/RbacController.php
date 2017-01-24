<?php

namespace console\controllers;
 
use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;
 
class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
        
        $authManager->removeAll(); //На всякий случай удаляем старые данные из БД...
 
        // Create roles
        $guest          = $authManager->createRole('guest');
        $seo            = $authManager->createRole('SEO');
        $contentManager = $authManager->createRole('CONTENT');
        $admin          = $authManager->createRole('admin');
 
        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $error  = $authManager->createPermission('error');
        $signUp = $authManager->createPermission('sign-up');
        $index  = $authManager->createPermission('index');
        $view   = $authManager->createPermission('view');
        $update = $authManager->createPermission('update');
        $delete = $authManager->createPermission('delete');
        $about  = $authManager->createPermission('about');
 
        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);
        $authManager->add($index);
        $authManager->add($view);
        $authManager->add($update);
        $authManager->add($delete);
        $authManager->add($about);
 
 
        // Add rule, based on UserExt->group === $user->group
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);
 
        // Add rule "UserGroupRule" in roles
        $guest->ruleName          = $userGroupRule->name;
        $seo->ruleName            = $userGroupRule->name;
        $contentManager->ruleName = $userGroupRule->name;
        $admin->ruleName          = $userGroupRule->name;
 
        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($seo);
        $authManager->add($contentManager);
        $authManager->add($admin);
 
        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $error);
        $authManager->addChild($guest, $signUp);
        $authManager->addChild($guest, $index);
        $authManager->addChild($guest, $view);
        $authManager->addChild($guest, $about);
 
        // SEO
        $authManager->addChild($seo, $update);
        $authManager->addChild($seo, $guest);
 
        // CONTENT
        $authManager->addChild($contentManager, $update);
        $authManager->addChild($contentManager, $guest);
 
        // Admin
        $authManager->addChild($admin, $delete);
        $authManager->addChild($admin, $contentManager);
        $authManager->addChild($admin, $seo);
    }
}