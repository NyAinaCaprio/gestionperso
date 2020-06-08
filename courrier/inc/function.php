<?php 
$db;

function connexiondb()
{
    global $db;
    $db = new PDO('mysql:host=localhost;dbname=dia', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
 }


function getCourrier()
{
	global $db;
	$var = $db->query('SELECT * from courrier ORDER BY id DESC LIMIT 0, 10');
	return $var ;
}

function getCourrierById($id)
{
	global $db;
	$var = $db->query('SELECT * from courrier where id = '.$id.'');
	return $var ;	
}

function getTypeCourrier()
{
	global $db;
	$var = $db->query('SELECT * from typecourrier');
	return $var ;		
}

function getTypeCourrierById($id)
{
	global $db;
	$var = $db->query('SELECT * from typecourrier where id_type_courrier = '.$id.'');
	return $var ;		
}

function getClassement()
{
	global $db;
	$var = $db->query('SELECT * from classement');
	return $var ;		
}

function getClassementById($id)
{
	global $db;
	$var = $db->query('SELECT * from classement where id = '.$id.'');
	return $var ;		
}
function getDegre()
{
	global $db;
	$var = $db->query('SELECT * from degre');
	return $var ;		
}

function getDegreById($id)
{
	global $db;
	$var = $db->query('SELECT * from degre where id_degre = '.$id.'');
	return $var ;		
}
function searchCourrier($objet)
{
	global $db;
	$var = $db->query('SELECT * from courrier where objet_courrier LIKE "%'.$objet.'%" OR numrefcourrier LIKE "%'.$objet.'%" OR remarque LIKE "%'.$objet.'%" OR datecourrier LIKE "%'.$objet.'%" ');
	return $var ;	
}

function totalCourrier()
{
	global $db;
	$var = $db->query('SELECT * from courrier')->rowcount();
	return $var ;			
}

function totalParTypeCourrier($var)
{
	global $db;
	$var = $db->query('SELECT id from courrier where id_type_courrier = '.$var.'')->rowcount();
	return $var ;				
}
function statistique()
{
	global $db;
    $donnee = $db->query("SELECT *  FROM typecourrier") ;
    $res = array();
    $total = totalCourrier();
    while ($var = $donnee->fetch()) {

        $nb = totalParTypeCourrier($var->id_type_courrier);
        $pourcent = ceil(($nb/$total)*100);

        $res [] = array(
            'type'=>$var->type,
            'pourc'=>$pourcent,
            'nombre'=>$nb,
            'total' => $total);

    }
    return $res;
}

