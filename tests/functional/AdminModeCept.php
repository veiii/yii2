<?php 
$I = new FunctionalTester($scenario);
/*
$I->wantTo('login and fill form');
$I->amOnPage('site/login');
$I->fillField('input[name="LoginForm[username]"]', 'ka');
$I->fillField('input[name="LoginForm[password]"]', 'ka');
$I->click('Login');
$I->see('Logout (ka)');
*/
$I->wantTo('login and see admin mode');
$admin = \app\models\BUser::findByUsername('admin');
$I->amLoggedInAs($admin);
$I->amOnPage('admin/index');
$I->see('Admin Mode');
