<?php

namespace FastRegister;

class IncomingEmailHandler{
	
	public $email;
	
	public function __construct($fastRegisterEmail) {
		$this->email = $fastRegisterEmail;
		add_action('setup_theme', array($this, 'validateEmail') );
	}
	
	public function validateEmail(){
		//This function performs a series of tests.
		$email = $this->email;
		$isEmailValid = new IncomingEmailValidator($email);
		if ($isEmailValid->returnBool($email)){
			$CreateAndSignonNewUserBasedOnEmail = new CreateAndSignonNewUserBasedOnEmail;
			$CreateAndSignonNewUserBasedOnEmail->createAndSignonUser($email);
		}
	}
	
}