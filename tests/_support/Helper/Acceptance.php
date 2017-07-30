<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{
    public function goToGoogle()
    {
        $I = $this;
        //$I->wantTo('ssssssssssssssss');
        //$I->addStep('vvvvvvvvvvvvvvv');
    	$I->amOnUrl('http://google.com');
    }
}
