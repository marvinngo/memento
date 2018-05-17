<?php

/**
 * Sample DocBlock.
 */
class homeCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('');
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
        $I->see('Login');
    }

    public function notAlreadyLoggedIn(AcceptanceTester $I)
    {
        $I->dontSee('Welcome');
        $I->dontSee('Logout');
    }

    public function navigateToSignup(AcceptanceTester $I) 
    {
        $I->click('#getStarted1');
        $I->amOnPage('memento/registration.php');
        $I->seeInCurrentUrl('registration');
    }
}
