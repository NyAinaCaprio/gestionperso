<?php session_start(); 
include('connexion.php')
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="exportexcel.php" class="monform" name="form2">
<h2>Sortie d'article</h2>
<div class="panel panel-success">
<div class="panel-heading">
                                Formulaire d'ajout
                            </div>
                            <div class="panel-body">
 	
<table width="100%" border="0">
  <tr>
    <td>Nom d'article</td>
    <td><select name="code_article" required="" autofocus="autofocus"  class="code_article" id="select-form" >
      <option value=" "></option>
	  <?php
		$requete2 = 'SELECT * FROM articles';
		$resultat2 = $db->query($requete2);
		
		 foreach($resultat2 as $route) { ?>
      <option value="<?php echo $route['code_article'];?>"><?php echo $route['designation'];?> _ <?php echo $route['unite'];?></option>
      <?php }?>
    </select></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><input type="date" class="date_sortie" value="<?php echo date('Y-m-d') ?>"   name="date_sortie"  required="" id="select-form"/></td>

  </tr>
 
  <tr>
    <td>Qté sortie :</td>
    <td><input type="text" class="quantite_sortie" name="quantite_sortie" required=""id="form-control" /></td>
  </tr>
  <tr>
    <td>Type</td>
    <td> <label class="label2">
      <input type="radio" name="typesortie" id="typesortie" value="Bon" /> 
      Bon</label> 
      <label class="label2"><input type="radio" name="typesortie"  id="typesortie" value="Dotation" /> Dotation</label>  </td>
  </tr>
  <tr>
    <td>Pour</td>
    <td><select name="etsouserviceoucorps" required="" class="etsouserviceoucorps" id="select-form" >
        <option value=" "></option>
        <?php
		$req1 = 'SELECT * FROM etsouservice';
		$resu1= $db->query($req1);
		
		 foreach($resu1 as $route1) { ?>
        <option value="<?php echo $route1['id_etsouservice'];?>"><?php echo $route1['SE'];?> _ <?php echo $route1['etsouservice'];?></option>
        <?php }?>
    </select></td>
  </tr>

   <tr>
    <td>Nom du béneficiaire </td>
    <td><input type="text" class="nombenef" name="nombenef" required="" id="form-control" /></td>
  </tr>

  <tr>
    <td>Pièce N°(avec detail) </td>
    <td><input type="text" class="bmouv" name="bmouv" required=""id="form-control" /></td>
  </tr>
  
  <tr>
    <td>observation :</td>
    <td><textarea class="observation" name="observation" id="textarea-form"  ></textarea></td>
  </tr>
</table>


</div>
<div class="panel-footer">
<div>      
 <button  type="button" onClick="enregistrersortiearticle()" class="btn btn-danger" >Enregistrer</button>
</div>
</div>
</div>	
</form>
</body>
</html>
