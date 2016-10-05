<?php

namespace FastRegister;

class FastRegisterAutoloader{
	
	public function __construct(){
		spl_autoload_register(function ($className){
			$includePath = substr($className, 13);
			$includePath = dirname(__DIR__) . "/FastRegister/" . $includePath . ".class.php";
			//var_dump($includePath);die();
			include $includePath;
		});
	}
	
}