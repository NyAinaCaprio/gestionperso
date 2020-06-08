<?php session_start();
require '../inc/function.php';
connexiondb();
$message = array();

/*
var_dump($_POST);
die();*/
//echo getDateConge($_POST['datededepart'],$_POST['id_civil']);

$datededepart = strftime("%Y",strtotime($_POST['datededepart']));

 
$message = congeIsValid($_POST);

if(!empty($message))
{
    $_SESSION['message'] = $message;
    header("location:../index.php?p=addconge");
}


if( $_POST['type']==1)
{
    /*si le congé demandé est déjà enregistré*/
    if(getDateConge($_POST['datededepart'],$_POST['id_civil']))
    {
        $message['danger']="Congé déjà enregistré ! ";
        $_SESSION['message'] = $message;

        header('location:../index.php?p=addconge');
        exit();
    }
    /*si l'anneeReliquat de la pers est null*/
    elseif( is_null( anneeReliquatEnCours($_POST['id_civil'])) )  // si reliquat est vide "message d'erreur"
    {
        $message['danger']="Veuillez saisir Reliquat svp ! ";
        $_SESSION['message'] = $message;
        header('location:../index.php?p=addconge');
        exit();
    }
    elseif(anneeReliquatEnCours($_POST['id_civil']) > $datededepart) // si l'année en saisi est inférieur à l'année dans la table >" sortir"
    {
      var_dump(anneeReliquatEnCours($_POST['id_civil']));
      die();
        $message['danger']="Vérifier la date en saisie svp ! ";
        $_SESSION['message'] = $message;
        header('location:../index.php?p=addconge');
        exit();
    }

    elseif(reliquatEncours($_POST['id_civil']) < $_POST['nbrjour']) // si la demande est supérieur > "Sortir"
    {
      /*
      *si nouvel an on donne 30 jours pour tout le monde
      */
      if (date("Y") > anneeReliquatEnCours($_POST['id_civil']) ) {

        $var = reliquatEncours($_POST['id_civil']);
        $var = $var + 30;
        addreliquatPers($_POST['id_civil'], $datededepart, $var);

        if (testanneereliquat($_POST['id_civil'], $datededepart, $_POST['nbrjour'], $_POST['type'])) {
        addCongeNormal($_POST);

        $message['success'] = "Enregistrement reussi ! ";
        $_SESSION['message'] = $message;
        header("location:../index.php?p=addconge"); 
        exit(); 
        }

      }else{

        $message['danger']="Reliquat insuffisant ! ";
        $_SESSION['message'] = $message;
        header('location:../index.php?p=addconge');
        exit();
      }


    }

    elseif (testanneereliquat($_POST['id_civil'], $datededepart, $_POST['nbrjour'], $_POST['type']))
    {
      /*Si ce test est true on ajoute le congé*/
        addCongeNormal($_POST);

        $message['danger'] = "Enregistrement reussi ! ";
        $_SESSION['message'] = $message;
        header("location:../index.php?p=addconge");
        exit();
    }

}

    if ($_POST['type'] == 2)
    {
        if (countConge($_POST['id_civil'], $datededepart) == 0)
        {
            diffAnnee($_POST['id_civil'], $datededepart);
        }

        addCongeExceptionnel($_POST);


        $message['danger'] = "Enregistrement reussi ! ";
        $_SESSION['message'] = $message;
        header("location:../index.php?p=addconge");
        exit();
    }



