<?php session_start()
if ($_SESSION['varid_etsouservice']=="" OR $_SESSION['varid_compte'] =="" OR $_SESSION['varid_civil'] =="") 
{
header('location:index.php');
}
$connexion=mysql_connect("localhost","root","");
mysql_select_db("dia");



$date = date("Y-m-d");
$heure = date("H:i");
$cin = $_POST['cin'];		 
        
        
if(isset($_POST['ENTREE']))
{			
			$vari = mysql_query('SELECT `personnelcivil`.* FROM `personnelcivil` WHERE `personnelcivil`.`cin` ="'.$cin.'"'); 
			$data = mysql_fetch_array($vari);
			$id_civil = $data['id_civil'];
			$id_service = $data['id_etsouservice'];
			$date = date("Y-m-d");
			$heure = date("H:i");
			
			$mag = mysql_query('SELECT * FROM absence WHERE date ="'.$date.'" AND id_civil = "'.$id_civil.'"');
			$magi = mysql_query('SELECT * FROM conge WHERE datedeb <="'.$date.'" AND datefin >="'.$date.'" AND id_civil = "'.$id_civil.'"');
if(mysql_num_rows($vari)==0)
{
echo "<script>alert(\"CIN incorrecte  :D \")</script>";
}	

elseif(mysql_num_rows($mag)>0)
{
echo "<script>alert(\"Cette personne est ABSENTE :D \")</script>";			
}
elseif(mysql_num_rows($magi)>0)
{
echo "<script>alert(\"Cette personne a pris un congé :D \")</script>";			
}


	else
	{		
			$donnees = mysql_query('SELECT * FROM presence WHERE date ="'.$date.'" AND id_civil = "'.$id_civil.'"');
			$data = mysql_fetch_array($donnees,MYSQL_ASSOC);
			$row = $data['id_civil'];
			if($id_civil == $row)
			{
			echo "<script>alert(\"Enregistrement déjà effectué :D \")</script>";			
			}
			else
			$resultat = mysql_query("INSERT INTO presence SET 
						id_presence ='".$_POST['id_presence']."',
						id_civil ='".$id_civil."',
						id_etsouservice ='".$id_service."',
						date ='".$date."',
						heuredentree ='".$heure."'");
	}
}


 elseif(isset($_POST['SORTIE']))
{
 			$vari = mysql_query('SELECT `personnelcivil`.* FROM `personnelcivil` WHERE `personnelcivil`.`cin` ="'.$cin.'"'); 
			$data = mysql_fetch_array($vari);
			$id_civil = $data['id_civil'];
			$id_service = $data['id_etsouservice'];
			$date = date("Y-m-d");
			$heure = date("H:i");
			
			$magi = mysql_query('SELECT * FROM conge WHERE datedeb <="'.$date.'" AND datefin >="'.$date.'" AND id_civil = "'.$id_civil.'"');
				
				if(mysql_num_rows($vari)==0)
				{
				echo "<script>alert(\"CIN incorrecte  :D \")</script>";
				}	
					
				elseif(mysql_num_rows($magi)>0)
				{
				echo "<script>alert(\"Cette personne a pris un congé :D \")</script>";			
				}
					
			else
			{
			$vari = mysql_query('SELECT `personnelcivil`.* FROM `personnelcivil` WHERE `personnelcivil`.`cin` ="'.$cin.'"'); 
			$data = mysql_fetch_array($vari);
			$id_civil = $data['id_civil'];
			$id_service = $data['id_etsouservice'];
			$date = date("Y-m-d");
			
			$donnees = mysql_query('SELECT * FROM presence WHERE date ="'.$date.'" AND id_civil = "'.$id_civil.'"');
					
			if(mysql_num_rows($donnees)==0)			
			{
			echo "<script>alert(\"Erreur : Veuillez cliquer sur le bouton ENTREE :D \")</script>";

			}
			else
			{
				$variable = mysql_query('SELECT * FROM presence WHERE date ="'.$date.'" AND id_civil = "'.$id_civil.'"');
				$daty = mysql_fetch_array($variable);
				$heuredesortie = $daty['heuredesortie'];
			   
				if($heuredesortie!="00:00:00")
					{
					echo "<script>alert(\"Heure de sortie déjà enregistrer  :D \")</script>";
					}
				else
				{	
				$date = date("Y-m-d");
				$heure = date("H:i");
				$resultat = mysql_query("UPDATE presence SET heuredesortie ='".$heure."' WHERE id_civil ='".$id_civil."'");
				}
			}
		}
}
 
else

{
}
/////

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html

  xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
    <title>Untitled Document</title>
    <style type="text/css">
<!--
.Style7 {font-weight: bold}
.bord
{
-webkit-box-shadow: 2pt 2pt 2pt 2pt #cccccc;
box-shadow: 2pt 2pt 2pt 2pt #cccccc;
border-radius:8pt 8pt 8pt 8pt ;
 
}
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



.style17 {
	color: #0000FF;
	font-size: 20px;
	font-weight: bold;
}
.style18 {color: #000000}
    .style23 {font-size: 30px}
.style26 {font-size: 16px; font-weight: bold; }
    .style27 {font-size: 20px}
    </style> 
</head>
<body> 
<center>  
<form action="direction2.php"  id="direction" method="post" name="direction2.php" enctype="multipart/form-data">
  <div id="contenu" style="background: none repeat scroll 0% 0% white; border-radius: 8pt 8pt 8pt 8pt; margin-left: 101px; width: 697px;">
    <table  style="border-radius:10px 10px 10px 10px; border:solid"width="692" border="0" bgcolor="#9BC9EE">
      <tr>
        <td width="273" height="31"><div align="right">Journée du :</div></td>
        <td width="335"><span class="style23" ><strong><?php echo $date.' à '.$heure ;?></strong></span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    </p>
    <table width="700"height="275"border="0"cellspacing="0"cellspadding="5">
      <tr>
        <td width="1139" height="255"valign="top" style="border-radius:10px 10px 10px 10px; border:solid" bgcolor="#9BC9EE"><p ><a href="absencecivil.php"></a> <a href="consultationpresence.php"></a> <a href="consultationpresence.php">Consultation</a><span>
            <label></label>
          </span> <a href="absencecivil.php"><span >Absence</span></a> <a href="pointagemilitaire.php"><span >Pointage militaire</span></a></p>
            </p>
            <table width="692" border="0">
              <tr>
                <td width="148"><div align="right">CIN :</div></td>
                <td width="223"><label>
                  <input type="text" name="cin" id="cin" autofocus="autofocus" required =""  placeholder = "Tapez ici votre CIN..." />
                </label></td>
                <td width="147">&nbsp;</td>
                <td width="156" colspan="3" rowspan="4"><div align="center"><img src="<?php 
	  		$cin = $_POST['cin'];
			$data = mysql_fetch_array(mysql_query('SELECT `personnelcivil`.* FROM `personnelcivil` WHERE `personnelcivil`.`cin` ="'.$cin.'"')); 
			echo $data['photo']?>" width="122" height="116" /></div></td>
              </tr>
              <tr>
                <td colspan="3"><span class="style17 Style8 style18">
                  <?php
	  		$cin = $_POST['cin'];
			$nomprenom = mysql_query('SELECT `personnelcivil`.*, `etsouservice`.*, `personnelcivil`.`cin` FROM `personnelcivil` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` = `personnelcivil`.`id_etsouservice` WHERE `personnelcivil`.`cin` = "'.$cin.'"'); 
			$donnees2 = mysql_fetch_array($nomprenom);


	   echo $donnees2['nomprenom'];
	   ?>
                </span></td>
              </tr>
              <tr>
                <td><label>
                  <input type="submit" name="ENTREE" id="ENTREE" value="ENTREE" />
                </label></td>
                <td>&nbsp;</td>
                <td><div align="center">
                    <input type="submit" name="SORTIE" id="SORTIE" value="SORTIE" />
                </div></td>
              </tr>
              <tr>
                <td height="23" colspan="3"><div align="right" class="style26">
                  <div align="left" class="style27">Effectif du Personnel Civil <span style="color:#FF0033"> ''<?php echo $donnees2['etsouservice']; ?>''</span> en salle :<span class="style15"><strong>
                    <?php
	  	$cin = $_POST['cin'];
		$data = mysql_fetch_array(mysql_query('SELECT `personnelcivil`.*, `etsouservice`.* FROM  `personnelcivil` INNER JOIN `etsouservice` ON `etsouservice`.`id_etsouservice` = `personnelcivil`.`id_etsouservice` WHERE `personnelcivil`.`cin` ="'.$cin.'"')); 
		$id_civil = $data['id_civil'];
		$id_service = $data['id_etsouservice'];
	  $date = date("Y-m-d");
	  $resultat2 = mysql_query('SELECT  `presence`.`id_civil`, `personnelcivil`.`nomprenom`, `presence`.`date`,  `presence`.`heuredentree`, `presence`.`heuredesortie`,  `presence`.`id_etsouservice` FROM  `presence` INNER JOIN  `personnelcivil` ON `presence`.`id_civil` = `personnelcivil`.`id_civil` WHERE `presence`.`id_etsouservice` = "'.$id_service.'" AND `presence`.`date` = "'.$date.'"');
$effectifensalle = mysql_num_rows($resultat2);

	  echo $effectifensalle;
	   ?>
                  </strong></span></div>
                </div></td>
              </tr>
            </table>
          <table  align="left" width="694" height="70" border="1" cellspacing="0"  bgcolor="#FFFFFF" style="margin-bottom: 0"cellspadding="5">
            <tr>
                <td colspan="4" align="center" valign="middle" class="Style7"><span class="Style10">Detail</span></td>
              </tr>
              <tr>
                <td align="center" valign="middle" ><center class="style2">
                  <strong>Nom et Prénoms                  </strong>
                </center>                  </td>
                <td width="89" align="center" valign="middle" ><center class="style2">
                  <strong>                  Date                  </strong>
                </center></td>
                <td width="117" align="center" valign="middle" ><strong>Heure d'arrivée</strong></td>
                <td width="113" align="center" valign="middle" ><strong>Heure de Sortie</strong></td>
                <?php
		$cin = $_POST['cin'];
		$data = mysql_fetch_array(mysql_query('SELECT `personnelcivil`.* FROM `personnelcivil` WHERE `personnelcivil`.`cin` ="'.$cin.'"')); 
		$id_civil = $data['id_civil'];
		$id_service = $data['id_etsouservice'];
$resultat2 = mysql_query('SELECT  `presence`.`id_civil`, `personnelcivil`.`nomprenom`, `presence`.`date`,  `presence`.`heuredentree`, `presence`.`heuredesortie`,  `presence`.`id_etsouservice` FROM  `presence` INNER JOIN  `personnelcivil` ON `presence`.`id_civil` = `personnelcivil`.`id_civil` WHERE `presence`.`id_etsouservice` = "'.$id_service.'" AND `presence`.`date` = "'.$date.'"');
 

 while($route=mysql_fetch_array($resultat2)) { ?>
              </tr>
              <tr>
                <td  height="22" align="center" valign="middle" > <div align="left">&nbsp;&nbsp;<?php echo $route['nomprenom']?>
                    </div>
                <div align="left"></div></td>
                <td align="center" valign="middle" ><center>
                    <?php echo $route['date']?>
                </center></td>
                <td align="center" valign="middle" ><?php echo $route['heuredentree']?></td>
                <td align="center" valign="middle" ><?php echo $route['heuredesortie']?></td>
              </tr>
              <?php }?>
            </table>
          <br />
        </td>
      </tr>
      <tr>
        <td></td>
      </tr>
    </table>
    </br>
  </div>
  <!--- FIN  ---> 
</form >
</center>   
  <div id="qfdf" class="bord" style="width:1480px; ">  
    <div id="sfdsdf" class="bord" style="width:717px; height:300px; overflow:auto">
  <?php include ('personnelconge.php')?> 
	</div>
    <br>
    
 <div style="margin-left: 733px; margin-top: -310px; height: 820px; width: 740px; overflow:auto" class="bord">
    <div align="center"><strong><u> PRESENCE D'AUJOURDH'HUI</u></strong></div>
    <br/>
        <div ><strong><u>    Total Personnel Civil </u></strong></div>


    <div ><strong><u> Présent</u> : <?php 
					$daty = date("Y-m-d");
					$sqlquery='SELECT  `personnelcivil`.*, `presence`.*, `etsouservice`.*, `presence`.`date`, `etsouservice`.`etsouservice` FROM  `presence` INNER JOIN  `personnelcivil` ON `presence`.`id_civil` = `personnelcivil`.`id_civil`  INNER JOIN  `etsouservice` ON `etsouservice`.`id_etsouservice` =  `personnelcivil`.`id_etsouservice` WHERE  `presence`.`date` = "'.$daty.'" ORDER BY `etsouservice`.`etsouservice`';
				$queryresult=mysql_query($sqlquery) or die ('<center><h2>Aucun pointage :D!</h2></center>');
						$totcivil = mysql_num_rows($queryresult);
						echo $totcivil ; ?></strong></div>

    <div ><strong><u> Congé</u> : <?php 
					$daty = date("Y-m-d");
					  $cong = mysql_query('SELECT `conge`.*, `etsouservice`.*, `personnelcivil`.* FROM `conge` INNER JOIN `personnelcivil` ON `personnelcivil`.`id_civil` = `conge`.`id_civil`  INNER JOIN  `etsouservice` ON `etsouservice`.`id_etsouservice` =    `personnelcivil`.`id_etsouservice` WHERE `conge`.`datedeb` <="'.$date.'" AND `conge`.`datefin` >="'.$date.'"') or die ('<center><h2>Aucun pointage :D!</h2></center>');
						$totcong = mysql_num_rows($cong);
						echo $totcong ; ?></strong></div>

    
        <div ><strong><u> Absent </u> : <?php 
					$daty = date("Y-m-d");
$abs = mysql_query('SELECT  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`, `absence`.`date`,  `motifabsent`.`motifabsent`, `absence`.`autresmotif`,  `etsouservice`.`etsouservice` FROM  `absence` INNER JOIN  `personnelcivil` ON `absence`.`id_civil` = `personnelcivil`.`id_civil`  INNER JOIN  `motifabsent` ON `motifabsent`.`id_motifabsent` = `absence`.`id_motifabsent`  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =  `absence`.`id_etsouservice` WHERE  `absence`.`date` = "'.$date.'"');						$totabs = mysql_num_rows($abs);
						echo $totabs ; ?></strong></div>

    <br>
	<?php include ('presenceaujourdhui.php')?> 
    </div>
    <br>
    <div id="qsdfsdf" class="bord" style="width: 717px; height: 506px; margin-top: -524px ; overflow:auto">
    <?php include ('absent.php')?> 
    </div>
    	    
    </div>
  <div align="center"><a href="index.php"><strong>Retour</strong></a>  
    </div>
  </div>
</body>
</html>
