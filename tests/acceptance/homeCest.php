<?php

/**
 * Sample DocBlock.
 */
class homeCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/memento');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function startOnHome(AcceptanceTester $I)
    {
        $I->see('Home');
        $I->seeInCurrentUrl('memento');
    }

    public function loginLink(AcceptanceTester $I)
    {
        $I->amOnPage('/memento');
        $I->see('Login');
    }

    public function notAlreadyLoggedIn(AcceptanceTester $I)
    {
        $I->amOnPage('/memento');
        $I->dontSee('Welcome');
        $I->dontSee('Logout');
    }
}
