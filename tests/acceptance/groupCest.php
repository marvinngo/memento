<?php

/**
 * Tests for the Groups page.
 */
class groupCest
{

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->login();
        $I->canSeeInCurrentUrl('createjoin');
    }

    public function _after(AcceptanceTester $I)
    {
        $I->logout();
        $I->canSeeInCurrentUrl('index');
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
        $I->createGroup($groupName);
        $I->see($groupName);
    }

    /**
     * Checks if the app remembers whether a user made a group.
     */
    public function persistence(AcceptanceTester $I) 
    {
        $groupName = substr(md5(rand()), 0, 7); //generate random name
        $I->createGroup($groupName);
        $I->logout();
        $I->login();
        $I->see($groupName);
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
        $I->cantSee('Error');
        $I->click('#joinModal .close');
        $I->wait(2);
    }
}