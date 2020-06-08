<?php session_start();
require_once('connexion.php');

$errors=array();

    $delContenu = 'DELETE from contenu where id_contenu  = "'.$_GET['id_contenu'].'"';
    $db-> exec($delContenu);

    $delDossier = "delete from dossier where id_contenu = '".$_GET['id_contenu']."'";
    $db->exec($delDossier);

    $errors['message']="Suppression Términée ! ";
    $_SESSION['message'] = $errors;
    header('location:ajoutnouveauprojet.php');
?>