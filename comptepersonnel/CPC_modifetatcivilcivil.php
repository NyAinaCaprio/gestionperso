<?php session_start();


require_once ("function.php");
connexiondb();

$variable = getAllPersonnelDetail($_SESSION['varidcivil'])->fetch();
//--------------------
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
<title>Document sans titre</title>

</head>
<body  >  
<div ><strong>
  <input   name="id_civil" class="id_civil"  type="hidden" value="<?php echo $_SESSION['varidcivil'];?>" />
Modification ETAT CIVIL de <?php echo $_SESSION['varnomprenom']; ?>; "<?php echo $_SESSION["varservicelib"]; ?>"</strong></div>
 
<form name="modifetatcivilcivil" class="monformulaire" >
  <table>
    <tr>
      <td width="191"   >&nbsp;</td>
      <td width="10" >&nbsp;</td>
      <td width="322"  >&nbsp;</td>
      <td width="45"  >&nbsp;</td>
      <td width="150"  ><div align="center"><strong>Photo</strong></div></td>
    </tr>
    <tr>
      <td ><div align="right">Nom et Prénoms</div></td>
      <td>&nbsp;</td>
      <td ><input type="text" name="nomprenom"  class="nomprenom form-control" disabled="disabled" id="form-control"  autofocus="autofocus" required = "" value="<?php echo $variable['nomprenom'];?>"/></td>
      <td rowspan="5">&nbsp;</td>
      <td rowspan="5"><img src="mesimages/<?php echo $variable['photo']?>" width="150" height="150"/> </td>
    </tr>
    <tr>
      <td colspan="3" ><div align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Né(e)le : Jour
        <select name="jour" class="jour" disabled="disabled" id="jour">
                <option value="<?php echo $variable['jour'];?>"><?php echo $variable['jour'];?></option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
        Mois
        <select name="mois" class="mois" disabled="disabled" id="mois">
          <option value="<?php echo $variable['mois'];?>"><?php echo $variable['mois'];?></option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>
        Année        
        :
        <label>
          <select name="annee"  class="annee"  disabled="disabled" id="annee">
            <option value="<?php echo $variable['annee'];?>"><?php echo $variable['annee'];?></option>
            <option>1985</option>
            <option>1986</option>
            <option>1987</option>
            <option>1988</option>
            <option>1989</option>
            <option>1990</option>
            <option>1991</option>
            <option>1992</option>
            <option>1993</option>
            <option>1994</option>
            <option>1995</option>
            <option>1996</option>
            <option>1997</option>
            <option>1998</option>
            <option>1999</option>
          </select>
          </label>
        </div>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td align="right"valign="middle" bgcolor="">Lieu de Naissance</td>
      <td>&nbsp;</td>
      <td ><input type="text"name="lieudenaiss"id="form-control" class="lieudenaiss form-control" autofocus="autofocus" required = "" value="<?php echo $variable['lieudenaiss'];?>"/></td>
    </tr>
    <tr>
      <td align="right"valign="middle" bgcolor="">CIN N°</td>
      <td>&nbsp;</td>
      <td ><input class="cin form-control" type="text"name="cin" disabled="disabled" id="form-control" maxlength="12" autofocus="autofocus" required = "" value="<?php echo $variable['cin'];?>"/></td>
    </tr>
    <tr>
      <td align="right"valign="middle" bgcolor="">Délivrée le</td>
      <td>&nbsp;</td>
      <td ><input type="date" class="delivrele form-control"  disabled="disabled" name="delivrele"id="form-control" autofocus="autofocus" required = "" placeholder="Année/Moi/Jour"  value="<?php echo $variable['delivrele'];?>"/></td>
    </tr>
    <tr>
      <td align="right"valign="middle" bgcolor="">à</td>
      <td>&nbsp;</td>
      <td ><input type="text" name="a" disabled="disabled" id="form-control" autofocus="autofocus" class="a form-control" required = "" value="<?php echo $variable['a'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">Sexe</td>
      <td>&nbsp;</td>
      <td ><select class="sexe form-control" disabled="disabled" name="sexe" id="select-form">
          <option value="<?php echo $variable['sexe'];?>"><?php echo $variable['sexe'];?></option>
          <option>M</option>
          <option>F</option>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">Adresse Actuelle</td>
      <td height="21">&nbsp;</td>
      <td ><input type="text"name="adresseactuelle" class="adresseactuelle form-control" id="form-control" autofocus="autofocus" required = "" value="<?php echo $variable['adresseactuelle'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">E-mail</td>
      <td>&nbsp;</td>
      <td ><input class="mail form-control" type="text" name="mail" id="form-control" value="<?php echo $variable['mail'];?>" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">Situation Matrimoniale</td>
      <td>&nbsp;</td>
      <td ><select class="situationmatrimonial form-control" name="situationmatrimonial" id="select-form">
        <option value="<?php echo $variable['situationmatrimonial'];?>"><?php echo $variable['situationmatrimonial'];?></option>
        <option>Marié</option>
        <option>Divorcé</option>
        <option>Veuf(ve)</option>
        <option>Célibataire</option>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">Groupe Sanguin</td>
      <td>&nbsp;</td>
      <td ><input type="text"name="groupesanguin"id="form-control" class="groupesanguin form-control" value="<?php echo $variable['groupesanguin'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">Groupe Ethique</td>
      <td>&nbsp;</td>
      <td ><input type="text"name="groupeethnique"id="form-control" class="groupeethnique form-control" autofocus="autofocus" value="<?php echo $variable['groupeethnique'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">Religion:</td>
      <td>&nbsp;</td>
      <td ><select name="religion" class="religion form-control" id="select-form">
          <option value="<?php echo $variable['religion'];?>"><?php echo $variable['religion'];?></option>
          <option>Protestant</option>
          <option>Catholique</option>
          <option>Musulman</option>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">Catégorie</td>
      <td>&nbsp;</td>
      <td ><select name="id_categorie_civil" disabled="disabled" class="id_categorie_civil form-control" id="select-form">
          <?php 
		$requete3="SELECT * FROM personnelcivil WHERE id_civil ='".$_SESSION['varidcivil']."'";
		$resultat3=$db->query($requete3);
		$perso3=$resultat3->fetch();
		
		$requete4="SELECT id_categorie_civil, categorie_civil FROM `categorie_civil`";
		$resultat4=$db->query($requete4);
		
		while($route4=$resultat4->fetch()) { ?>
          <option <?php  if($route4['id_categorie_civil']==$perso3['id_categorie_civil']) echo "selected='selected'"; ?> value="<?php echo $route4['id_categorie_civil'];?>"><?php echo $route4['categorie_civil'];?></option>
          <?php }?>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">ETS ou Service</td>
      <td>&nbsp;</td>
      <td ><select class="id_etsouservice form-control" name="id_etsouservice" disabled="disabled" id="select-form">
        <?php 
		$requete3="SELECT * FROM personnelcivil WHERE id_civil ='".$_SESSION['varidcivil']."'";
		$resultat3=$db->query($requete3);
		$perso3=$resultat3->fetch();
		
		$requete4="SELECT id_etsouservice, etsouservice FROM `etsouservice`";
		$resultat4=$db->query($requete4);
		
		while($route4=$resultat4->fetch()) { ?>
        <option <?php  if($route4['id_etsouservice']==$perso3['id_etsouservice']) echo "selected='selected'"; ?> value="<?php echo $route4['id_etsouservice'];?>"><?php echo $route4['etsouservice'];?></option>
        <?php }?>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="">Téléphone</td>
      <td>&nbsp;</td>
      <td ><input type="text" class="telephone form-control" name="telephone" maxlength="10" id="form-control" autofocus="autofocus" required = "" value="<?php echo $variable['telephone'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  ><div align="right">Date probable de retraite</div></td>
      <td>&nbsp;</td>
      <td ><input type="text" class="retraite form-control" disabled="disabled" id="form-control" name="retraite" autofocus="autofocus" required = "" value="<?php echo $variable['retraite'];?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">Photo</div></td>
      <td>&nbsp;</td>
      <td><input type="file" name="image" class="image form-control" id="image" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"><div id="msgerreur"></div></td>
    </tr>
    <tr>
      <td><div align="center"><span style="margin-bottom: 0">
          <!------<input class="btn btn-primary"  type="button" value="Enregistrer"  onclick="enregmodifETcivil()"/>-------->
      </span><a href="miseajour.php"></a></div></td>
      <td>&nbsp;</td>
      <td><div id="msgerreur"></div></td>
      <td>&nbsp;</td>
      <td><span style="margin-bottom: 0">
      <button type="submit" class="btn btn-primary" id="ajouterphoto"><i class="fa fa-floppy-o fa-2x"></i> Enregistrer</button>
   <!--<input class="btn btn-primary " id="ajouterphoto"  type="submit" value="Enregistrer" />-->
 
      </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

</form>

</body>
</html>
