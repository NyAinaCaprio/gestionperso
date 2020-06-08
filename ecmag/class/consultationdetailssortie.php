<h2> Séléctionné votre choix</h2>
<hr />

<form name="form2" method="post" enctype="multipart/form-data" action="exportversexcel.php">
 <div class="panel panel-primary">
<div class="panel-heading">
    Formulaire consultation sortie d'article</div>
<div class="panel-body">

<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><select  name="typesortie" required="" id="select-form" autofocus="autofocus"  class="typesortie" >
      <option value="1">Dotation</option>
      <option value="2">Bon</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="22%"><label class="label"><input type="radio"  name="choix" id="choix" class="choix" value="1" />
      Tous</label></td>
    <td width="30%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label class="label">
          <input type="radio"  name="choix" id="choix2" class="choix" value="2" />
      Désignation</label></td>
    <td colspan="2"><select name="code_article"  required="" id="select-form" autofocus="autofocus"  class="code_article" >
      <option value=" "></option>
      <?php
		$requete2 = 'SELECT * FROM articles';
		$resultat2 = $db->query($requete2);
		
		 foreach($resultat2 as $route) { ?>
      <option value="<?php echo $route['code_article'];?>"><?php echo $route['designation'];?> _ <?php echo $route['unite'];?></option>
      <?php }?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label class="label">
          <input type="radio"  name="choix" id="choix5" class="choix" value="3" />
      ETS ou Service ou Corps</label></td>
    <td colspan="2"><select name="id_etsouservice"  required="" id="select-form" class="id_etsouservice" >
      <option value=" "></option>
      <?php
		$requete6 = 'SELECT * FROM etsouservice';
		$resultat6 = $db->query($requete6);
		
		 foreach($resultat6 as $data6) { ?>
      <option value="<?php echo $data6['id_etsouservice'];?>"><?php echo $data6['SE'];?> | | <?php echo $data6['etsouservice'];?></option>
      <?php }?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="label">
      <input type="radio"  name="choix" id="choix6" class="choix" value="4" />
    Catégorie</span></td>
    <td colspan="2"><select name="id_categorie" id="select-form" required="" class="id_categorie">
      <option value=""></option>
      <?php
		$requete3 = 'SELECT * FROM categorie';
		$resultat3 = $db->query($requete3);
		
		 foreach($resultat3 as $route3) { ?>
      <option value="<?php echo $route3['id_categorie'];?>"><?php echo $route3['categorie'];?></option>
      <?php }?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<div class="panel-footer">
<div>      
 <button  type="button" onClick="afficheconsultationsortie()" class="btn btn-danger" >Afficher</button>
</div>
</div>
</div>   