<?php

/**
 * Tests for the Registration page.
 */
class registrationCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/registration.php');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function seeNav(AcceptanceTester $I)
    {
        $I->see('Sign Up');
        $I->seeElement('nav');
    }

    public function testLogin(AcceptanceTester $I)
    {
        
    }

    public function checkMyGroups(AcceptanceTester $I)
    {
    
    }

    public function logout(AcceptanceTester $I)
    {

    }

    /**
     * Attempts to register a new user with a randomly generated name.
     */
    public function registerUser(AcceptanceTester $I)
    {
        $username = substr(md5(rand()), 0, 7); //generate random name
        $password = "testing1";
        $email = substr(md5(rand()), 0, 7) . "@gmail.com";
        $I->fillField('#usernameRegistrationForm', $username);
        $I->fillField('#passwordForm', $password);
        $I->fillField('#confirmpasswordForm', $password);
        $I->fillField('#emailRegistrationForm', $email);

        $I->click('Submit');

        $I->wait(2);
        $I->seeInCurrentUrl('createjoin');
        $I->see('Welcome ' .  $username);
    }
}