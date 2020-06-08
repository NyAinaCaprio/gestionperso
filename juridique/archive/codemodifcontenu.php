<?php session_start();
require_once ('function.php');
connexiondb();

$errors=array();

$marequete = "update contenu set 
numero = '".$_POST['numero']."',
date = '".$_POST['date']."',
porte = '".$_POST['porte']."',
observation = '".$_POST['observation']."',
id_projet = '".$_POST['id_projet']."',
lien = '".$_POST['lien']."',
id_type = '".$_POST['id_type']."' where id_contenu  = '".$_SESSION['id_contenu']."'";
$db->exec($marequete);



 //require_once('idmax.php');
 if(isset($_FILES['image']['tmp_name']))
 {
     $num_files = count($_FILES['image']['tmp_name']);
     for($i=0; $i<$num_files; $i++)
     {
         if(!is_uploaded_file($_FILES['image']['tmp_name'][$i]))
         {

         }
         else
         {
             $reqdos = $db->query("select * from projet where id_projet = '".$_POST['id_projet']."'")->fetch();
             $variable = $reqdos['projet'];
             $chemin="dossier/$variable/";

             if (!file_exists($chemin)) {
                 mkdir($chemin);

             }else{

             }

             if(move_uploaded_file($_FILES['image']['tmp_name'][$i],"$chemin".$_FILES['image']['name'][$i]))
             {

                 $requete= $db->query("insert into dossier set 
                    id_contenu='".$_SESSION["id_contenu"]."',
                    nomdossier='".$_FILES['image']['name'][$i]."'");
             }
         }
     }

 }

 if ($_POST['supprimer']=="ok"){
     $del  = 'DELETE from dossier where id = "'.$_POST['id'].'"';
     $db-> exec($del);
     $errors['message']="Modification éfféctuée avec succes ! ";
     $_SESSION['message'] = $errors;
     header('location:viewContenu.php?id_contenu='.$_SESSION['id_contenu'].'');
 }

 $errors['message']="Modification éfféctuée avec succes ! ";
 $_SESSION['message'] = $errors;
 header('location:viewContenu.php?id_contenu='.$_SESSION['id_contenu'].'')
?>