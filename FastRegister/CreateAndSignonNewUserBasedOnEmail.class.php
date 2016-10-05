<?php

namespace FastRegister;

class CreateAndSignonNewUserBasedOnEmail{
	
	public function createAndSignonUser($email){
		global $wpdb;
		$password = wp_generate_password();
		$user_id = wp_create_user( $email, $password, $email );
		$user = new \WP_User( $user_id );
		wp_set_auth_cookie( $user->ID, TRUE );
		//either 'administrator', 'subscriber', 'editor', 'author', 'contributor':
		$user->set_role( 'subscriber' );
		$first_name = "Bill";
		$last_name = "McGee";
		$user_id = wp_update_user( array( 'ID' => $user_id, 'first_name' => $first_name, 'last_name' => $last_name ) );
		$creds = array();
		$creds['user_login'] = $email;
		$creds['user_password'] = $password;
		$creds['remember'] = true;
		$user = wp_signon( $creds, true );
		$user = get_user_by( 'email', $email );
		$UserID = $user->ID;
		$trimmedEmail = $this->trimDomainFromEmail($email);
		update_user_meta( $UserID, 'nickname', $trimmedEmail);
		$wpdb->query("UPDATE $wpdb->users SET display_name = '$trimmedEmail' WHERE ID = $UserID");
		if (isset($_SESSION['crg_login_redirect_url'])){
			$crg_login_redirect_url = $_SESSION['crg_login_redirect_url'];
			wp_redirect($crg_login_redirect_url);
			die();
		}
		//gets the current url:
		$url =  getUrl($_SERVER);
		//$url = "http://localhost";
		wp_redirect($url);
	}
	
	
	
	//This function returns the first part of an email. i.e. "jiminac@gmail.com" is trimmed to "jiminac" :
	public function trimDomainFromEmail($email){
		$trimmed = '';
		$arr1 = str_split($email);
		foreach ($arr1 as $l){
			if ($l == "@"){break;}
			$trimmed = $trimmed . $l;
		}
		return $trimmed;
	}
	
	
}
