<?php session_start();
require_once ("../inc/function.php");
connexiondb();

if (!empty($_POST)) {  

  $filename = "";
  $message = array();
      if ($_FILES['image']['name']!="") {
	      if ($_SERVER['DOCUMENT_ROOT']=="D:/Wamp64/www") {
	        if (move_uploaded_file($_FILES['image']['tmp_name'], '../public/courrierImage/'.$_FILES['image']['name'])) {
	            $filename = $_FILES['image']['name'];
	        }else{
	          $message['danger'] = "Erreur lors du télechargement du fichier WINDOWS";
	          $filename = "";
	        }
	        
	      }else{
	      	if (move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/COURRIER/public/courrierImage/'.$_FILES['image']['name'])) {
	            $filename = $_FILES['image']['name'];
	        }else{
	          $message['danger'] = "Erreur lors du télechargement du fichier ";
	          $filename = "";
	        }
	      }   
      	 
      }
      	
 
   $var = $db->prepare('INSERT INTO courrier (autorite_origine, numrefcourrier, objet_courrier, remarque, datecourrier, id_degre, id_classement ,filename , id_type_courrier, created_at) 
    VALUES (:autorite_origine, :numrefcourrier, :objet_courrier, :remarque, :datecourrier, :id_degre, :id_classement ,:filename , :id_type_courrier, :created_at) ');
  $var->execute(array(
        ':autorite_origine' => $_POST['autorite_origine'],
        ':numrefcourrier'=> $_POST['numrefcourrier'],
        ':objet_courrier'=> $_POST['objet_courrier'],
        ':remarque'=> $_POST['remarque'],
        ':datecourrier'=> $_POST['datecourrier'],
        ':id_degre' => $_POST['id_degre'],
        ':id_classement' => $_POST['id_classement'],
        ':id_type_courrier' => $_POST['id_type_courrier'],
        ':filename' => $filename,
        ':created_at' => date("Y-m-d")
    )); 

    $message['success'] = "Enregistrement reussi";
    $_SESSION['message'] = $message;
    header("location:../index.php?p=liste");
  }

 ?>