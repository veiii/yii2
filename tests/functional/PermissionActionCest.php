<?php


class PermissionActionCest
{
    public function _before(FunctionalTester $I)
    {
        $user = \app\models\BUser::findByUsername('k');
        $I->amLoggedInAs($user);
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function userCantSeeAdminPage(FunctionalTester $I)
    {
        $I->amOnRoute('admin/index');
        $I->see('You are not allowed to perform this action.');
    }

    public function userCantSeeProfileIndexPage(FunctionalTester $I)
    {
        $I->amOnRoute('profile/index');
        $I->see('You are not allowed to perform this action.');
    }

    public function userCantSeeChoicesIndexPage(FunctionalTester $I)
    {
        $I->amOnRoute('choices/index');
        $I->see('You are not allowed to perform this action.');
    }

    public function userCantSeeScoreIndexPage(FunctionalTester $I)
    {
        $I->amOnRoute('score/index');
        $I->see('You are not allowed to perform this action.');
    }
}
