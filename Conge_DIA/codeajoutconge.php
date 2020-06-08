<?php
require_once ('function.php');
connexiondb();


$val = $db->query("SELECT
  `personnelcivil`.`reliquat`
FROM
  `personnelcivil`
WHERE
  `personnelcivil`.`id_civil` =  '".$_POST['id_civil']."'")->fetch();


if($_POST['typeconge']=='1')
{

    if($val["reliquat"] < $_POST['nbrjour'])
    {
        $result="Le nombre restant de congé de cette personne est INSUFFISANTE";
    }else
    {

        $res = $val - $_POST['nbrjour'];
        $update = "update personnelcivil set reliquat = '".$res."' WHERE id_civil = '".$_POST['id_civil']."'";
        $db->exec($update);
    }

}

$req = "INSERT INTO conge set 
    id_civil = '".$_POST['id_civil']."',
    typeconge = '".$_POST['typeconge']."',
    motif = '".$_POST['motif']."',
    datedepart = '".$_POST['datededepart']."',
    nbrjrsdemande = '".$_POST['nbrjour']."',
    chefsceouets = '".$_POST['chefservice']."',
    spcmoudir = '".$_POST['chefspcm']."',
    chefdiv = '".$_POST['chefdiv']."',
    adresse = '".$_POST['adresse']."'";

$db->exec($req);

$result="Enredistrement reussi ! ";
echo json_encode($result) ;
