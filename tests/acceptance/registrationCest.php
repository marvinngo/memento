<?php

class registrationCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/memento/registration.php');
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

    public function registerUser(AcceptanceTester $I)
    {
    
    }
}