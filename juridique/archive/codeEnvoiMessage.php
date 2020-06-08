<?php session_start();
require_once ('connexion.php');



        $marequete = "insert into message set 
            objet = '".$_POST['objet']."',
            message = '".$_POST['message']."',
            date = '".date('Y-m-d h:i')."'";
        $db->exec($marequete);


        $errors['message']="Message Envoyé ! ";
        $_SESSION['message'] = $errors;
        header('location:contact.php');

