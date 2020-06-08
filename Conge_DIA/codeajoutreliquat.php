<?php session_start();
require_once ('function.php');
connexiondb();

$errors = array();

if($_POST['nbrReliquat']=="" || $_POST['id_civil']=="" || $_POST['anneereliquat']==""){
$_SESSION['errors']="Completez les champs obligatoires ! ";
header("location:addreliquat.php");
}else {

    $req = "UPDATE personnelcivil set reliquat = '" . $_POST['nbrReliquat'] . "', anneereliquat = '" . $_POST['anneereliquat'] . "' where id_civil = '" . $_POST['id_civil'] . "'";
    $db->exec($req);

    $_SESSION['errors'] = "Enregistrement Reliquat reussi ! ";
    header("location:addreliquat.php");
}