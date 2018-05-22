<?php

/**
 * Tests for the Groups page.
 */
class groupCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/createjoin.php');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function first(AcceptanceTester $I)
    {
        $I->see('Create a Memento');
    }

    /**
     * Attempts to create a group with a randomly generated name.
     */
    public function createGroup(AcceptanceTester $I)
    {
        $groupName = substr(md5(rand()), 0, 7); //generate random name
        $I->click('Create Group');
        $I->wait(2);
        $I->fillField('#groupNameForm', $groupName);
        $I->fillField('#groupPasswordForm', 'testing1');
        $I->fillField('#confirmGroupPasswordForm', 'testing1');
        $I->fillField('#descriptionForm','Test description');
        $I->selectOption('#totalPeople', '5');
        $I->click('Submit');
        $I->wait(2);
    }

    /**
     * Attempts to join a group in the database.
     */
    public function joinGroup(AcceptanceTester $I)
    {
        $I->click('Join Group');
        $I->wait(2);
        $I->fillField('#usernameForm', 'grouptest');
        $I->fillField('#passwordForm', 'password');
        $I->click('#joinSubmitButton');
        $I->wait(2);
        $I->dontSee('Error');
    }

    public function getEvent(AcceptanceTester $I)
    {
    
    }

    
}