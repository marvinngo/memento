<?php

/**
 * Tests for the Home page.
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

    public function notAlreadyLoggedIn(AcceptanceTester $I)
    {
        $I->dontSee('Welcome');
        $I->dontSee('Logout');
        $I->see('Login');
    }

    public function navigateToSignup(AcceptanceTester $I) 
    {
        $I->click('#getStarted1');
        $I->amOnPage('memento/registration.php');
        $I->seeInCurrentUrl('registration');
    }

    /**
     * Logs in using a premade Tester account.
     */
    public function loginFromHome(AcceptanceTester $I)
    {
        $I->click('Login');
        $I->wait(2);
        $I->fillField('#usernameForm2','Tester');
        $I->fillField('#passwordForm2', 'testing1');
        $I->click('Sign in');
        $I->wait(2);
        $I->seeInCurrentUrl('createjoin');
        $I->see('Create a Memento');
    }
}
