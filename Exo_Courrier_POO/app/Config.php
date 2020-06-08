<?php 
// resaka singleton
namespace App;

/**
* 
*/
class Config 
{
	// mitady ny fichier de configuration an le site
	// ndao icree dossier atao hoe config any @ racine du projet
	public  $settings = array();

	private static $_instance;

	public static function getInstance()
		{
			if (is_null(self::$_instance)) {
				self::$_instance = new Config();
			}
			return self::$_instance;
		}	

	public function  __construct()
	{
		// $this->id = uniqid();
		$this->settings =  require dirname(__DIR__).'/config/config.php';
	}

	public static function get($key=null)
	{
		
		if (!isset($this->settings[$key])) {
			 return null;
		}
		return $this->settings[$key]; 		
	}
		
}

 ?>