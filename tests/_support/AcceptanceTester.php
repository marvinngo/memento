<?php


/**
 * All of the reusable methods for acceptance testing go into this file.
 * 
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

   /**
    * Logs in a user named "Tester".
    */
    public function login()
    {
    $I = $this;
    $I->click('Login');
    $I->wait(2);
    $I->fillField('#usernameForm2','Tester');
    $I->fillField('#passwordForm2', 'testing1');
    $I->click('Sign in');
    $I->wait(4);
    }

    /**
     * Logs out the currently logged in user.
     */
    public function logout()
    {
        $I = $this;
        $I->click('Logout');
        $I->wait(2);
    }

    /**
     * Creates a group with a randomly generated name.
     * Assumes the user is logged in.
     */
    function createGroup($groupName)
    {
        $I = $this;
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
}
