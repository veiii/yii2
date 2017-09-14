<?php


class RegistrationCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/registration');
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function openRegistrationPage(\FunctionalTester $I)
    {
        $I->see('Registration', 'h1');
    }

    public function submitEmptyForm(\FunctionalTester $I)
    {
        $I->submitForm('#registration-form', []);
        $I->expectTo('see validations errors');
        $I->see('Registration', 'h1');
        $I->see('First Name cannot be blank');
        $I->see('Last Name cannot be blank');
        $I->see('Username cannot be blank');
        $I->see('Password cannot be blank');
        //$I->see('Mail is not a valid email address.');
    }

    public function submitFormWithIncorrectEmail(\FunctionalTester $I)
    {
        $I->submitForm('#registration-form', [
            'ContactForm[FirstName]' => 'tester',
            'ContactForm[LastName]' => 'tester',
            'ContactForm[username]' => 'test_name',
            'ContactForm[password]' => 'test_password',
            'ContactForm[mail]' => 'test_wrong_mail',
        ]);
        $I->expectTo('see that email address is wrong');
        $I->see('Mail is not a valid email address.');
    }

    public function submitFormSuccessfully(\FunctionalTester $I)
    {
        $I->submitForm('#registration-form', [
            'ContactForm[FirstName]' => 'tester',
            'ContactForm[LastName]' => 'tester',
            'ContactForm[username]' => 'test_name',
            'ContactForm[password]' => 'test_password',
            'ContactForm[mail]' => 'tester@example.com',
        ]);
        $I->amOnPage('profile/main');
        $I->see('My Profile');
    }
}
