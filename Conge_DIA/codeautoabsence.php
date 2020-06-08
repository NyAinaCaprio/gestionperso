<?php session_start();
require_once ('function.php');
connexiondb();
$errors = array();
$date = date('Y-m-d H:i');


if($_POST['id_civil']=="" || $_POST['motif']==""||$_POST['heuredepart']=="")
{
    $_SESSION['errors'] = "Completez tous les champs obligatoires ! ";
    header("location:autoabsence.php");
}
else

    {
    $var = "INSERT INTO autoabsence set 
    id_civil = '".$_POST['id_civil']."',
    motif = '".$_POST['motif']."', 
     heuredepart = '".$_POST['heuredepart']."',
     date = '".$date."'";
    $db->exec($var);

    $_SESSION['errors']=" Enregistrement reussi";
    header("location:autoabsence.php");


    }