<?php
namespace tests\models;
use app\models\BUser;
use \Codeception\Test\Unit;

class BUserTest extends Unit
{
    public function testFindUserById()
    {
        expect_that($user = BUser::findUserById(1));
        expect($user->username)->equals('admin');
        expect_not(BUser::findUserById(0));
    }


    public function testFindByUsername()
    {
        expect_that($user = BUser::findByUsername("admin"));
        expect($user->id='1');
        expect_not($user->id='0');
    }


    public function testValidateUser()
    {
        expect($user = BUser::findByUsername('admin'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));
    }

}
