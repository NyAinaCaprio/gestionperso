<?php
    session_start();
    require_once '../inc/function.php';
	connexiondb();

	if ($db->query('SELECT id_civil FROM personnelcivil where cin = "'.$_POST['cin'].'"')->fetch()) {
		  
		$result = 'CIN existant ! ';
		echo json_encode($result);						
	}
?>
