<?php
namespace tests\models;
use app\models\BUser;
use \Codeception\Test\Unit;

class BUserTest extends Unit
{
    public function testFindUserById()
    {
        //$user = BUser::findIdentity(1);
        expect_that($user = BUser::findIdentity(1));
        expect($user->username)->equals('admin');

        expect_not(BUser::findIdentity(0));
    }


    public function testFindByUsername()
    {
        expect_that($user = BUser::findByUsername("admin"));
        expect_not($user = BUser::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    //działa
    public function testValidateUser()
    {
        expect($user = BUser::findByUsername('admin'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));
    }

}
