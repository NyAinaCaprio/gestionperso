<?php 
namespace App\Tables;
use App\App;
/**
* 
*/
class Courrier extends Table
{
	protected $table = "courrier";

	public static function find($id)
	{
		return self::query("SELECT courrier.*, classement.classement as classement 
			FROM courrier
			LEFT JOIN classement ON classement.id = courrier.id_classement 
			WHERE courrier.id = ? ", 
			array($id), true);
 		
	}

	public static function getLast()
		{
			return self::query("SELECT courrier.*, classement.classement as classement 
				FROM courrier
				LEFT JOIN classement 
					ON classement.id = courrier.id_classement 
				ORDER BY courrier.id DESC LIMIT 0 , 10" );
		}

	public static function getByClassement($id)
	{
		return self::query('SELECT courrier.*, classement.classement as classement 
			FROM courrier
			LEFT JOIN classement
		 		on courrier.id_classement = classement.id
			WHERE courrier.id_classement = ? ', array($id));
		
	}

	// on initialise une instance de classe enfant
	public function getUrl()
	{
		return 'index.php?p=courrier&id='.$this->id ;
	}

		// on initialise une instance de classe courrier
	
	public function getExtrait()
	{


		$html = '<p>'. substr($this->remarque, 0, 50).'... </p>'  ;
		$html .= '<p><a href='.$this->getUrl().'>Lire la suite</a></p>'  ;
		
		return $html;	
	}



}

 ?>