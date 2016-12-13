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
		$IncomingEmailValidator = new IncomingEmailValidator($email);
		if (!(email_exists( $email ))){
			if ($IncomingEmailValidator->isAValidEmail($email)){
				session_start();
				global $wp;
				$current_url = home_url(add_query_arg(array(),$wp->request));
				$_SESSION['crg_login_redirect_url'] = $current_url;
				$CreateAndSignonNewUserBasedOnEmail = new CreateAndSignonNewUserBasedOnEmail;
				$CreateAndSignonNewUserBasedOnEmail->createAndSignonUser($email);
			}
		}
	}	
}