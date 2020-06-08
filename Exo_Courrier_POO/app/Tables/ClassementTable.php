<?php 
namespace App\Tables;
use App\App;
/**
* 
*/



class Classement extends Table 
{

	protected static $table = "classement";
	
	function __construct()
	{
		# code...
	}
 

		// on initialise une instance de classe enfant
	public function getUrl()
	{
		return 'index.php?p=classement&id='.$this->id ;
	}



}
 ?>