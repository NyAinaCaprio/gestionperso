<?php session_start();
require_once('connexion.php');

$errors=array();

$marequete = "insert into contenu set 
numero = '".$_POST['numero']."',
date = '".$_POST['date']."',
porte = '".$_POST['porte']."',
observation = '".$_POST['observation']."',
id_projet = '".$_POST['id_projet']."',
lien = '".$_POST['lien']."',
id_type = '".$_POST['id_type']."'";
$db->exec($marequete);


 require_once('idmax.php');
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
                    id_contenu='".$_SESSION["idmax"]."',
                    nomdossier='".$_FILES['image']['name'][$i]."'");
                }
        }
    }
 
} 
 $errors['message']="Enregistrement réussi ! ";
 $_SESSION['message'] = $errors;
 header('location:ajoutnouveauprojet.php')
?>