<?php
require 'function.php';
require 'codeprepareetatdestock.php';
connexion_db();
prepareEtatDeStock();
?>

<!-- Exemple -->
<form name="form2" method="post" enctype="multipart/form-data" action="#">
 <div class="panel panel-primary">

<div class="panel-heading">
        ETAT DE STOCK
</div>

<div class="panel-body">

<table width="100%"  border="0">
  <tr>
    <td width="5%">
      <input type="radio" name="choix" id="choix" class="choix" value="1" />    </td>
    <td width="14%">Tous</td>
    <td width="20%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
  </tr>
  <tr>
    <td><input type="radio" name="choix" id="choix" class="choix" value="2" />    </td>
    <td>Catégorie :</td>
    <td colspan="2"><select name="id_categorie"  id="select-form" autofocus="autofocus"  class="id_categorie" >
      <option value=""></option>
      <?php
         $data = getCategorie();
         foreach($data as $route3) { ?>
      <option value="<?php echo $route3['id_categorie'];?>"><?php echo $route3['categorie'];?></option>
      <?php }?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="radio" name="choix" id="choix" class="choix" value="3" /></td>
    <td>Libell&eacute; article :</td>
    <td colspan="2"><select name="reference"  id="select-form" autofocus="autofocus"  class="reference" >
      <option value=""></option>
      <?php
        $resultat2 = getArticles();
        
         foreach($resultat2 as $route) { ?>
      <option value="<?php echo $route['reference'];?>"><?php echo utf8_encode($route['libelleproduit'])?> _ <?php echo utf8_encode($route['unite'])?></option>
      <?php }?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
</table>


</div>
<div class="panel-footer">
  <button  type="submit" class="btn btn-danger" >Afficher</button>
</div>
</div> 
<!-- Fni  -->
</form>

<!-- Affichage -->

<?php 
if (isset($_POST['choix']) && isset($_POST['reference']) ||isset($_POST['id_categorie'])) {
$_SESSION['choix'] = $_POST['choix'];
$_SESSION['reference'] = $_POST['reference'];
$_SESSION['id_categorie'] = $_POST['id_categorie']; 

?>
 <form action="class/etatdestockexport.php" method="POST"> 
<table class="table table-striped table-bordered table-hover animated animate flash">
            <thead>
                <tr>
                <th>REFERENCE</th>
                    <th>DESIGNATION</th>
                    <th>UNITE</th>
                    <th>CATEGORIE</th>
                    <th>QTE INITIALE</th>
                    <th>QTE ENTREE</th>
                  <th>QTE SORTIE</th>
                     <th>STOCK FINAL</th>
                </tr>
            </thead>
            <tbody>
                            
<?php  
  
if ($_SESSION['choix'] ==1){

  $resultat = selectAllEtatdeStock();

}elseif ($_SESSION['choix'] ==2){

    $resultat = selectEtatDeStockBy($_POST['id_categorie']);

  }elseif ($_SESSION['choix'] ==3) {

    $resultat = selectEtatDeStockRef($_POST['reference']);


  }
 foreach($resultat as $data)  { 
          ?>
        <tr>
            <td><?php echo $data['reference'];?></td>
            <td><?php echo utf8_encode($data['libelleproduit']) ;?></td>
            <td><?php echo utf8_encode($data['unite']);?></td>
            <td><?php echo $data['categorie'];?></td>
            <td><?php echo $data['quantite_initiale'];?></td>
            <td><?php echo $data['quantite_entree'];?></td>
             <td><?php echo $data['quantite_sortie'];?></td>
            <td><?php echo $data['StockFinal'];?></td>
        </tr>
                <?php } ?>
<tr>
<td colspan="10" ><div class="soustitre1"> <span  class="grasbleu"> <?php echo $resultat->rowcount();?></span> enregistrement(s)...</div></td>
</tr>
                            </tbody>
                        </table>
                      
<!-- <input type="submit" name="exportversexcel" value="Exporter vers Excel" class="btn btn-primary"> 
<input type="submit" name="exportverspdf" value="Exporter vers PDF" class="btn btn-primary">
 --> 
</form>
<?php } ?> 

 