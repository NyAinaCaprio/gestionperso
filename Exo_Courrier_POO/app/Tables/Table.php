<?php 
namespace App\Tables;
use App\App;

/**
* 
*/
class Table
{

	protected $db;
	protected $table;
	// protected static $table ;

	/**
	* Recuperation du nom de la table
	* si le nom de la table n'est pas  defini on prend la table en cours 
	* StateBinding n'est pas du tout idel , ca marche s il y a de variable dans la table courrier ou classement
	*/
	/*public static function getTable()
	{
		if (static::$table === null) {
			$classUtilise = explode('\\', get_called_class());
			
			static::$table = strtolower(end($classUtilise));
			 
		}
			return static::$table ;
		
	}
*/

	public function __construct(\App\Database $db)
	{
		$this->db =$db;

		if (is_null($this->table)) {
			$part = explode('\\', get_class($this));
			$classeUtilise = end($part);
			$this->table = strtolower(str_replace('Tables', '', $classeUtilise));
			
		}
		return $this->table;
		
	}


	public function query($requete ){

 		
	}


/*	public static function find($id)
	{
		return static::query('SELECT *  
			FROM '.static::$table.' 
			WHERE id = ? ', 
			array($id), true);
		
	}

	public function __get($cle)
	{
		// var_dump("methode magiqe get appelé en une seule fois ");
		$method = 'get'.ucfirst($cle);
		if (method_exists($this, $method)) {
		   $this->$cle =  $this->$method();
		}

		return $this->$cle;
		
	}


	public static function all()
	{
		return App::getDb()->query("
			SELECT *  
			FROM ".static::$table."", 
		get_called_class());

	}
 

	// requete sql et on lui passe des attributs
	public static function query($requete, $param = null, $one = false)
	{
		if ($param) {
			// au cas ou il y as un parametre on fait une requete preparé 
		return App::getDb()->prepare($requete, $param, get_called_class(), $one);
		}else {
			// sinon non fait une requete query avec la classe utilisé
			return App::getDb()->query($requete,  get_called_class(), $one);

		}
			
			
	}*/

}
 ?>