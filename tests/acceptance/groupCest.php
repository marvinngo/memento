<?php

class groupCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->seeInCurrentUrl('createjoin');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function first(AcceptanceTester $I)
    {
        $I->see('Create a Memento');
    }

    public function createGroup(AcceptanceTester $I)
    {
    
    }

    public function joinGroup(AcceptanceTester $I)
    {
    
    }

    public function getEvent(AcceptanceTester $I)
    {
    
    }

    
}