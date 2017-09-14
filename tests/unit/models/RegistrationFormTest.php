<?php
namespace models;

use app\models\RegistrationForm;
use \Codeception\Test\Unit;

class RegistrationFormTest extends Unit
{
    private $model;
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
        \Yii::$app->user->logout();
    }

    // tests
    //przyda siępo rozbudowie RegistrationForm
    /**
     * @skip
     */
    public function testRegistrationUser()
    {
        $this->model = new RegistrationForm();
        $this->model->username='random_string';
        $this->model->password='random_password';
        $this->model->firstName='random_name';
        $this->model->lastName='random_name';
        $this->model->mail='random@mail.com';




    }
}