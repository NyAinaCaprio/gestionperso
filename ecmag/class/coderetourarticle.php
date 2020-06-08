<?php session_start(); 
include('connexion.php');
$id_sortie= $_POST['id_sortie'];
$date = date("Y-m-d");


$requete = $db->query("select * from detail_sortie where id_sortie = '".$id_sortie."'")->fetch();

if ($requete["typesortie"]=="Dotation"){
$result="Attention ! on a pas le droit de supprimer un article de type Dotation !";
}else{
$reqajou = "INSERT INTO articlesenretour set 
id_sortie = '".$requete["id_sortie"]."',
code_article = '".$requete["code_article"]."',
date_retour = '".$date."',
quantite_retourner = '".$requete["quantite_sortie"]."',
etsouserviceoucorps = '".$requete["etsouserviceoucorps"]."',
observation = '".$requete["observation"]."'";
$db->exec($reqajou);

 
$reqsuppr = "delete from detail_sortie where id_sortie ='".$id_sortie."'";
$db->exec($reqsuppr);

$result="Mise &agrave; jour &eacute;ff&eacute;tu&eacute; avec succes !";


}

echo json_encode($result);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
</body>
</html>
