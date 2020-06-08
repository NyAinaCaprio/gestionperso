<?php 

namespace App;
use \PDO;

	/**
	* 
	*/


	class Database 
	{
		private $db_name ;
		private $db_user ;
		private $db_password ;
		private $db_host ;

		private $db ;
		
		function __construct($db_name, $db_user = 'root', $db_password ='', $db_host = 'localhost')
		{
			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_password = $db_password;
			$this->db_host = $db_host;

			
		}

		private function getPdo()
		{
			if ($this->db == null) {
			    $db = new PDO('mysql:host=localhost;dbname=dia_old', 'root', '');
			    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    //$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);
	    		$this->db = $db ;
				
			}

			return $this->db;	  
		}

		public function query($requete, $classeUtilise, $one = false)
		{
				$req = $this->getPdo()->query($requete);
				$req->setFetchMode(PDO::FETCH_CLASS, $classeUtilise);

			if ($one) {
				$data = $req->fetch();
					 
				}else {
				$data = $req->fetchAll();
					
				}
				return $data;
		}

		public function prepare($requete, $param, $classeUtilise, $one = false)
		{
			// ca return un pdo statement
			$req = $this->getPdo()->prepare($requete);
			// ca nous renvoie un boolean
			$req->execute($param);
			$req->setFetchMode(PDO::FETCH_CLASS, $classeUtilise);
			
			if ($one) {
			$data = $req->fetch();
				 
			}else {
			$data = $req->fetchAll(PDO::FETCH_CLASS, $classeUtilise);
				
			}
			return  $data;	
		}


	}


 ?>