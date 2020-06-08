<?php session_start();
require_once ('function.php');
connexiondb();
$errors = array();

//echo getDateConge($_POST['datededepart'],$_POST['id_civil']);

$datededepart = strftime("%Y",strtotime($_POST['datededepart']));

if(!isset($_POST['chefservice'])) {$chefservice =0;}
else{    $chefservice =1;}
if(!isset($_POST['chefspcm'])) {$chefspcm =0;}
else{$chefspcm =1;}
if(!isset($_POST['chefdiv'])) {$chefdiv =0;}
else{$chefdiv =1;}

if($_POST['type']=="" || $_POST['id_civil']||$_POST['datededepart']==""||$_POST['nbrjour'])
{
    $_SESSION['errors'] = "Completez les champs obligatoires ! ";
    header("location:addconge.php");
}

if( $_POST['type']==1)
{

    if(getDateConge($_POST['datededepart'],$_POST['id_civil'])>=1)
    {
        $_SESSION['errors']="Date déjà existant ! ";
        header('location:addconge.php');
    }
    elseif(getRelik($_POST['id_civil'])=="")  // si reliquat est vide "message d'erreur"
    {
        $_SESSION['errors']="Veuillez saisir Reliquat svp ! ";
        header('location:addconge.php');
    }
    elseif(anneeReliquatEnCours($_POST['id_civil'])>$datededepart) // si l'année en saisi est inférieur à l'année dans la table >" sortir"
    {
        $_SESSION['errors']="Vérifier la date en saisie svp ! ";
        header('location:addconge.php');
    }

    elseif(reliquatEncours($_POST['id_civil']) < $_POST['nbrjour']) // si la demande est supérieur > "Sortir"
    {
        $_SESSION['errors']="Reliquat insuffisant ! ";
        header('location:addconge.php');
    }

    elseif (testanneereliquat($_POST['id_civil'], $datededepart, $_POST['nbrjour'], $_POST['type'])==true)
    {
        $l = "INSERT INTO conge set 
      id_civil = '" . $_POST['id_civil']. "',
      typeconge = '" . $_POST['type'] . "',
      motif = '" . $_POST['motif'] . "',
      datededepart = '" . $_POST['datededepart'] . "',
      nbrjour = '" . $_POST['nbrjour'] . "',
      chefservice = $chefservice,
      chefdiv = $chefdiv,
      chefspcm = $chefspcm,
      adresse = '" . $_POST['adresse'] . "'";
        $db->exec($l);

        $_SESSION['errors'] = "Enregistrement reussi ! ";
        header("location:addconge.php");
    }

}

    if ($_POST['type'] == 2)
    {


        if (countConge($_POST['id_civil'], $datededepart) == 0)
        {

            diffAnnee($_POST['id_civil'], $datededepart);

        }
        $l = "INSERT INTO conge set 
  id_civil = '" . $_POST['id_civil'] . "',
  typeconge = '" . $_POST['type'] . "',
  motif = '" . $_POST['motif'] . "',
  datededepart = '" . $_POST['datededepart'] . "',
  nbrjour = '" . $_POST['nbrjour'] . "',
  chefservice = '" . $chefservice . "',
  chefdiv = '" . $chefdiv . "',
  chefspcm = '" . $chefspcm . "',
  adresse = '" . $_POST['adresse'] . "'";
        $db->exec($l);


        $_SESSION['errors'] = "Enregistrement reussi ! ";

       header("location:addconge.php");

    }

echo $_SESSION['errors'];
