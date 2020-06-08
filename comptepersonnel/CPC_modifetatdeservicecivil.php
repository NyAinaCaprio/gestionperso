<?php session_start();

require_once ("function.php");
connexiondb();
	$requete='SELECT `etatdeservicecivil`.* FROM `etatdeservicecivil` WHERE `etatdeservicecivil`.`id_civil`= "'.$_POST['id_civil'].'"';	
	$resultat=$db->query($requete);
	$variable=$resultat->fetch();	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css"   href="bootstrap/css/gabari.css" />
</head>

<body>
<br>
<form name="modifetatdeservicecivil">
<table width="604" >
  <tr>
    <td colspan="3"><div align="center"><strong>Modification <span class="Style8">Etat des services</span> de <?php echo $_SESSION['varnomprenom']; ?>; 

"<?php echo $_SESSION["varservicelib"]; ?>"</strong></div></td>
    </tr>
  <tr>
    <td width="268" bgcolor="#FFFFFF">
      <div align="right">
        <input type="hidden" name="id_civil" class="id_civil" id="id_civil"  autofocus="autofocus" required = "" value="<?php echo $variable['id_civil'];?>"/>
        <input  class="numetatdeservice form-control"  name="numetatdeservice" type="hidden" id="numetatdeservice" value="<?php echo $variable['numetatdeservice'];?>" />
        Affectation actuelle</div>
      <div align="right"></div></td>
    <td width="31" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="234" bgcolor="#FFFFFF"><input type="text" disabled="disabled" class="affectionactuelle form-control" name="affectionactuelle"id="form-control" value="<?php echo $variable['affectionactuelle'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">Direction</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text" class="direction form-control" disabled="disabled" name="direction" id="form-control"  value="<?php echo $variable['direction'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">Lieu détachement</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text" class="lieudedetachement form-control" disabled="disabled" name="lieudedetachement" id="form-control"value="<?php echo $variable['lieudedetachement'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">Matricule</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text" class="matricule form-control" disabled="disabled" name="matricule"id="form-control"placeholder="Année/Moi/Jour"  value="<?php echo $variable['matricule'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">Fonction</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text" class="fonction form-control"disabled="disabled" name="fonction"id="form-control"   value="<?php echo $variable['fonction'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">Date de recrutement</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text" class="datederecrutement form-control" disabled="disabled" name="datederecrutement" id="form-control"value="<?php echo $variable['datederecrutement'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">Détachement</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><select name="id_dettache" class="id_dettache form-control" disabled="disabled" id="select-form">
      <?php 
		
		$requete1="SELECT * FROM etatdeservicecivil WHERE id_civil ='".$_POST['id_civil']."'";
		$resultat1=$db->query($requete1);
		$perso1=$resultat1->fetch();
		
		$requete2="SELECT * FROM `dettache`";
		$resultat2=$db->query($requete2);
				
		while($route2=$resultat2->fetch()) { ?>
      <option <?php  if($route2['id_dettache']==$perso1['id_dettache']) echo "selected='selected'"; ?> value="<?php echo $route2['id_dettache'];?>"><?php echo $route2['dettache'];?></option>
      <?php }?>
    </select></td>
  </tr>

  <tr>
    <td align="right"valign="middle" bgcolor="">Indice</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text"name="indice" disabled="disabled" class="indice form-control" id="form-control" value="<?php echo $variable['indice'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">Interruption du</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text" class="interruptiondu form-control" disabled="disabled" name="interruptiondu" id="form-control"value="<?php echo $variable['interruptiondu'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">au</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text" class="au form-control" name="au" disabled="disabled" id="form-control"  value="<?php echo $variable['au'];?>"/></td>
    </tr>
  <tr>
    <td align="right"valign="middle" bgcolor="">Sortant d'école</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="text" class="sortantecole form-control" disabled="disabled" name="sortantecole" id="form-control" value="<?php echo $variable['sortantecole'];?>"/></td>
    </tr>
  <tr>
    <td colspan="3"></td>
    </tr>
</table>

</form >

</body>

</html>
