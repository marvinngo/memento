<?php

function login(AcceptanceTester $I) {
    $I->click('Login');
    $I->wait(2);
    $I->fillField('#usernameForm2','Tester');
    $I->fillField('#passwordForm2', 'testing1');
    $I->click('Sign in');
    $I->wait(3);
}

function logout(AcceptanceTester $I) {
    $I->click('Logout');
    $I->wait(3);
}

function createGroup(AccepTanceTester $I, $groupName) {
    $I->click('Create Group');
    $I->wait(2);
    $I->fillField('#groupNameForm', $groupName);
    $I->fillField('#groupPasswordForm', 'testing1');
    $I->fillField('#confirmGroupPasswordForm', 'testing1');
    $I->fillField('#descriptionForm','Test description');
    $I->selectOption('#totalPeople', '5');
    $I->click('Submit');
    $I->wait(2);
    $I->click('#createModal .close');
    $I->wait(1);
}

/**
 * Tests for the Groups page.
 */
class groupCest
{

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('');
        login($I);
        $I->canSeeInCurrentUrl('createjoin');
    }

    public function _after(AcceptanceTester $I)
    {
        logout($I);
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
        createGroup($I, $groupName);
        $I->see($groupName);
    }

    /**
     * Checks if the app remembers whether a user made a group.
     */
    public function persistence(AcceptenceTester $I) 
    {
        $groupName = substr(md5(rand()), 0, 7); //generate random name
        createGroup($I, $groupName);
        logout($I);
        login($I);
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
        $I->dontSee('Error');
    }

    public function getEvent(AcceptanceTester $I)
    {
        
    }

    
}