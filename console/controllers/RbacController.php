<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
use common\components\rbac\UserRoleRule;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удаляем старые данные
        //Включаем наш обработчик
        $rule = new UserRoleRule();
        $auth->add($rule);
        //Добавляем роли

        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $admin->ruleName = $rule->name;
        $auth->add($admin);

        $developer = $auth->createRole('developer');
        $developer->description = 'Developer';
        $developer->ruleName = $rule->name;
        $auth->add($developer);
        $auth->addChild($developer, $admin);
    }
}