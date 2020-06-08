<?php

namespace App;

/**
 * 
 */
 class App 
 {
 	public $title = 'DIA : Courrier';
 	private $db_instance;

 	private static $_instance;


 	public static function getInstance()
 	{
 		if (is_null(self::$_instance)) 
 		{
 			self::$_instance = new App();
 		}
 		return self::$_instance; 
 	}

	public static function getTable($name)
	{
  		$classeUtilise = '\\App\\Tables\\'.ucfirst($name).'Table';
  		
  		return new $classeUtilise($this->getDb());

	}
/*
 	public function __construct()
 	{
		// $this->id = uniqid();
		$this->settings =  require dirname(__DIR__)."/config/config.php";

 	}*/

 	public static function getDb()
	{
		$config = Config::getInstance();

		if (is_null($this->db_instance)) {
			$this->db_instance = new Database($config->get('db_name'), $config->get('db_user'),$config->get('db_password'),$config->get('db_host'));
			
		} 
		return $this->db_instance; 
	}



 
 } 
 ?>