<?php
$connexion=mysql_connect("localhost","root","");
mysql_select_db("dia");


////---------------------------
if(isset($_POST['Valider']))
{		
			$categorie=$_POST['categorie'];
			$ancienmotdepasse=$_POST['ancienmotdepasse'];
			$etsouservice2=$_POST['etsouservice2'];
			
			if ($categorie==1)
				$table='militaire';
			else
				$table='civil';
					
				$sqlquery="SELECT * FROM $table WHERE passe1 ='$ancienmotdepasse' AND id_etsouservice = '$etsouservice2'";
			$queryresult=mysql_query($sqlquery) ;
					if(mysql_num_rows($queryresult)==0)
				{
				echo "<script>alert(\"Ancien mot de passe incorecte :D \")</script>";
				}
				else
				{
			$categorie=$_POST['categorie'];
			$ancienmotdepasse=$_POST['ancienmotdepasse'];
			$etsouservice2=$_POST['etsouservice2'];
			
			if ($categorie==1)
				$table='militaire';
			else
				$table='civil';
			echo $table;
			$sqlquery=mysql_fetch_array(mysql_query("SELECT * FROM $table WHERE passe1 ='$ancienmotdepasse' AND id_etsouservice = '$etsouservice2'"));
			$id_compte = $sqlquery['id_compte'];
			echo $id_compte ;
			$passe1 = $_POST['noouveaumotdepasse'];
			$passe2 = $_POST['confirmmotdepasse'];

			mysql_query("UPDATE $table SET passe1 ='$passe1', passe2 = '$passe2' where id_compte = '$id_compte'");				
			}

}

///-----------------------------
if(isset($_POST['Envoyer']))
{
$option = $_POST['option'];
		if ($option==2)
			{	
$service = $_POST['etsouservice'];
$cin = $_POST['cin'];
$annee = $_POST['annee'];
		
			$sqlquery='SELECT  `civil`.*, `personnelcivil`.*, `personnelcivil`.`annee`,  `personnelcivil`.`cin`, `personnelcivil`.`id_etsouservice` FROM  `civil` INNER JOIN  `personnelcivil` ON `civil`.`id_civil` = `personnelcivil`.`id_civil` WHERE  `personnelcivil`.`annee` = "'.$annee.'"AND `personnelcivil`.`cin` = "'.$cin.'" AND  `personnelcivil`.`id_etsouservice` = "'.$service.'"';
			$queryresult=mysql_query($sqlquery) or die ('<center><h2>Identifiant inexistant...!</h2></center>');
					if(mysql_num_rows($queryresult)==0)
							{
							echo "<script>alert(\"Information incorrecte  :D \")</script>";
							}
				
					else
							{
						
						$sqlquery=mysql_fetch_array(mysql_query('SELECT  `civil`.*, `personnelcivil`.*, `personnelcivil`.`annee`,  `personnelcivil`.`cin`, `personnelcivil`.`id_etsouservice` FROM  `civil` INNER JOIN  `personnelcivil` ON `civil`.`id_civil` = `personnelcivil`.`id_civil` WHERE  `personnelcivil`.`annee` = "'.$annee.'"AND `personnelcivil`.`cin` = "'.$cin.'" AND  `personnelcivil`.`id_etsouservice` = "'.$service.'"'));
  							$pseudo = $sqlquery['pseudo'];
    						$passe1 = $sqlquery['passe1'];
	//echo 'Votre login : '.$pseudo.' et votre mot de passe : '.$passe1.'';						
	echo "<script>alert(\"Votre login : ".$pseudo." >>>> mot de passe : ".$passe1."\")</script>";	
							
							/*echo "<script>alert(\"<h2><center>Votre login : <strong>".$pseudo."</strong>"."et mot de passe".$passe1."\")</script>";
							$sqlquery=mysql_fetch_array(mysql_query('SELECT  `civil`.*, `personnelcivil`.*, `personnelcivil`.`annee`,  `personnelcivil`.`cin`, `personnelcivil`.`id_etsouservice` FROM  `civil` INNER JOIN  `personnelcivil` ON `civil`.`id_civil` = `personnelcivil`.`id_civil` WHERE  `personnelcivil`.`annee` = "'.$annee.'"AND `personnelcivil`.`cin` = "'.$cin.'" AND  `personnelcivil`.`id_etsouservice` = "'.$service.'"'));
							
							*/
							}
					
			}	
elseif ($option==1)
			{	
$service = $_POST['etsouservice'];
$cin = $_POST['cin'];
$annee = $_POST['annee'];
		
			$sqlquery='SELECT  `militaire`.*, `personnelmilitaire`.*, `personnelmilitaire`.`annee`,  `personnelmilitaire`.`cin`, `personnelmilitaire`.`id_etsouservice` FROM  `militaire` INNER JOIN  `personnelmilitaire` ON `militaire`.`id_militaire` = `personnelmilitaire`.`id_militaire` WHERE  `personnelmilitaire`.`annee` = "'.$annee.'"AND `personnelmilitaire`.`cin` = "'.$cin.'" AND  `personnelmilitaire`.`id_etsouservice` = "'.$service.'"';
			$queryresult=mysql_query($sqlquery) or die ('<center><h2>Identifiant inexistant...!</h2></center>');
					if(mysql_num_rows($queryresult)==0)
							{
							echo "<script>alert(\"Information incorrecte  :D \")</script>";
							}
				
					else
							{
						
						$sqlquery=mysql_fetch_array(mysql_query('SELECT  `militaire`.*, `personnelmilitaire`.*, `personnelmilitaire`.`annee`,  `personnelmilitaire`.`cin`, `personnelmilitaire`.`id_etsouservice` FROM  `militaire` INNER JOIN  `personnelmilitaire` ON `militaire`.`id_militaire` = `personnelmilitaire`.`id_militaire` WHERE  `personnelmilitaire`.`annee` = "'.$annee.'"AND `personnelmilitaire`.`cin` = "'.$cin.'" AND  `personnelmilitaire`.`id_etsouservice` = "'.$service.'"'));
  							$pseudo = $sqlquery['pseudo'];
    						$passe1 = $sqlquery['passe1'];
	//echo 'Votre login : '.$pseudo.' et votre mot de passe : '.$passe1.'';						
	echo "<script>alert(\"Votre login : ".$pseudo." >>>> mot de passe : ".$passe1."\")</script>";	
							
							/*echo "<script>alert(\"<h2><center>Votre login : <strong>".$pseudo."</strong>"."et mot de passe".$passe1."\")</script>";
							$sqlquery=mysql_fetch_array(mysql_query('SELECT  `civil`.*, `personnelcivil`.*, `personnelcivil`.`annee`,  `personnelcivil`.`cin`, `personnelcivil`.`id_etsouservice` FROM  `civil` INNER JOIN  `personnelcivil` ON `civil`.`id_civil` = `personnelcivil`.`id_civil` WHERE  `personnelcivil`.`annee` = "'.$annee.'"AND `personnelcivil`.`cin` = "'.$cin.'" AND  `personnelcivil`.`id_etsouservice` = "'.$service.'"'));
							
							*/
							}
					
			}	

else
{
echo "<script>alert(\"Information incorrecte  :D \")</script>";
}

}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
input[type=text] {
    width: 100%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: white;
   
    background-position: 5px 5px; 
    background-repeat: no-repeat;

	text-shadow:#3228DD
}

input[type=password] {
    width: 100%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: white;
   
    background-position: 5px 5px; 
    background-repeat: no-repeat;

	text-shadow:#3228DD
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#e0e0e0">
<center>
<form action="passlost.php" method="post" name="passlost" enctype="multipart/form-data">
<br>
    
	<div id="titre" style="border-radius:8pt 8pt 8pt 8pt; background:#FFFFFF ">Veuillez compléter les champs ci-dessous pour voir votre login et mot de passe à nouveau</div>
	<br>
    <div id="sdfsdf" style="border-radius:8pt 8pt 8pt 8pt; background:#FFFFFF ">
	<table width="407" border="0">
      <tr>
        <td colspan="3"><input type="radio" name="option" id="option" value="1" />
        Militaire</td>
      </tr>
      <tr>
        <td colspan="3"><input type="radio" name="option" id="option" value="2" />
        Civil</td>
      </tr>
      <tr>
        <td width="147"><div align="right">Nom et Prénoms</div></td>
        <td width="38">&nbsp;</td>
        <td width="208"><label>
          <input type="text" name="nomprenom" id="nomprenom" />
        </label></td>
      </tr>
      <tr>
        <td><div align="right">Service</div></td>
        <td>&nbsp;</td>
        <td><select name="etsouservice" id="etsouservice">
          <?php
		$requete2 = 'SELECT * FROM etsouservice';
		$resultat2 = mysql_query($requete2);
		
		 while($route=mysql_fetch_array($resultat2)) { ?>
          <option value="<?php echo $route['id_etsouservice'];?>"><?php echo $route['etsouservice'];?></option>
          <?php }?>
        </select></td>
      </tr>
      <tr>
        <td><div align="right">Année de naissance</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="annee" id="annee" placeholder = "Année" /></td>
      </tr>
      <tr>
        <td><div align="right">CIN </div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="cin" id="cin" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Envoyer" id="Envoyer" value="Envoyer" /></td>
      </tr>
    </table>
    </div>
    <br>
    <div id="titre3" style="border-radius:8pt 8pt 8pt 8pt; background:#FFFFFF ">Modification de votre mot de passe</div>
    <br>
    <div id="sdfsdf2" style="border-radius:8pt 8pt 8pt 8pt; background:#FFFFFF ">
      <table width="407" border="0">
        <tr>
          <td width="208" >Ancien mot de passe</td>
          <td width="208" ><input type="password" name="ancienmotdepasse" id="ancienmotdepasse" /></td>
        </tr>
        <tr>
          <td >ETS ou Service</td>
          <td ><select name="etsouservice2" id="etsouservice2">
            <?php
		$requete2 = 'SELECT * FROM etsouservice';
		$resultat2 = mysql_query($requete2);
		
		 while($route=mysql_fetch_array($resultat2)) { ?>
            <option value="<?php echo $route['id_etsouservice'];?>"><?php echo $route['etsouservice'];?></option>
            <?php }?>
          </select></td>
        </tr>
        <tr>
          <td >Catégorie</td>
          <td ><select name="categorie" id="categorie">
            <option>-</option>
            <option value="1">militaire</option>
            <option value="2">civil</option>
          </select>
          </td>
        </tr>
        <tr>
          <td >nouveau mot de passe</td>
          <td ><input type="password" name="noouveaumotdepasse" id="noouveaumotdepasse" /></td>
        </tr>
        <tr>
          <td >Confirmation de mot de passe</td>
          <td ><input type="password" name="confirmmotdepasse" id="confirmmotdepasse" /></td>
        </tr>
        <tr>
          <td colspan="2" ><div align="center">
            <input type="submit" name="Valider" id="Valider" value="Valider" />
          </div></td>
        </tr>
      </table>
    </div>
    <br>
    
  <div id="titre2" style="border-radius:8pt 8pt 8pt 8pt; background:#FFFFFF "><a href="index.php">Retour</a></div>    
</form> 
</body>
</html>
