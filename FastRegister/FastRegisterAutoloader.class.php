<?php

namespace FastRegister;

class FastRegisterAutoloader{
	
	public function __construct(){
		spl_autoload_register(function ($className){
			echo (substr($className, 0, 13)) . "<br />"; 
			$includePath = substr($className, 13);
			
			$includePath = dirname(__DIR__) . "/FastRegister/" . $includePath . ".class.php";
			//var_dump($includePath);die();
			include $includePath;
		});
	}
	
}
