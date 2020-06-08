<?php 
require 'function.php'; 
require 'codepreparefichedestock.php'; //return id Max

connexiondb();

 
?>
<h2>Fiche de stock</h2>
<hr><!-- exportversexcel -->
<form name="formfiche" method="post" enctype="multipart/form-data" action="#">

 <div class="panel panel-primary">

<div class="panel-heading">
        Formulaire fiche de stock
</div>

<div class="panel-body">

<table width="100%" border="0">
  <tr>
    <td width="5%"></td>
    <td width="14%">Libellé produit</td>
    <td width="70%">
      <select name="reference" required id="select-form" class="reference" >
      <option value=''></option>
      <?php
        $articles = getArticle();
       foreach($articles as $route) { ?>
      <option value="<?php echo $route['reference'];?>"><?php echo utf8_encode($route['libelleproduit']) ?> </option>
      <?php }?>
    </select></td>
    <td width="11%">&nbsp;</td>
  </tr>
</table>

</div>
<div class="panel-footer">
<div>      
 <button  type="submit" name='afficher'  class="btn btn-danger" >Afficher</button>
</div>
</div>
</div>      
</form>


<?php 
if (isset($_POST['afficher']) && !empty($_POST['reference'])) {
 require 'initialized.php';
?>

<form action="ficheexport.php" method="post">
    <div class="col-md-12"  >

      <div class=" col-md-12">

      <table width="50%" border="0">
        <tr>
          <td width="33%">REFERENCE :</td>
          <td width="67%"><h3><?php echo $requete["reference"];?></h3></td>
        </tr>
        <tr>
          <td>DESIGNATION :</td>
          <td><h4><?php echo utf8_encode($requete["libelleproduit"]) ;?></h4></td>
        </tr>
        <tr>
          <td>UNITE :</td>
          <td><?php echo utf8_encode($requete["unite"]);?></td>
        </tr>
        <tr>
          <td>CATEGORIE :</td>
          <td><?php echo $requete["categorie"];?></td>
        </tr>
        <tr>
          <td>QTE INITIALE :</td>
          <td><h4><?php echo $requ["stockphysique"];?></h4></td>
        </tr>
        </table>
          <hr />
        <table width="50%" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Date</th>
              <th>N de la PJ</th>
              <th>BL ou BMS</th>
              <th>PROVENANCE ou DESTINATION</th>
              <th>QTE ENTREE</th>
              <th>QTE SORTIE</th>
            </tr>
        </thead>
      <tbody>
      <?php 

      foreach($requetefich as $datafiche){
      ?>

      <tr>
      <td><?php  echo $datafiche["date"];  ?></td>
      <td> <?php  echo $datafiche["numerodelapj"]; ?></td>
      <td><?php echo $datafiche["BLouBMS"]; ?></td>
      <td><?php  echo $datafiche["provenanceoudestination"];  ?></td>
      <td><?php echo $datafiche["quantiteentree"];  ?></td>
      <td><?php   echo $datafiche["quantitesortie"]; ?></td>
      </tr>
      <?php } ?>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Somme</td>
        <td><?php echo $reqsumentre['Sum(`detail_mouvement`.`quantite`)'] ?></td>
        <td><?php echo $reqsumsortie['Sum(`detail_mouvement`.`quantite`)'] ?></td>
      </tr>
      <tr>
      <td colspan="5"><div align="right"> <h4>STOCK REEL :  </h4></div></td>
      <td><h4><?php echo $stockfinal ?></h4></td>
      </tr>
      </tbody>
      </table>
      </div>
    </div>
<!--   <input type="submit" name="exportversexcel" class="btn btn-primary" value="Exporter vers Excel"  />
  <input type="submit" name="exportverspdf" class="btn btn-primary" value="Exporter vers PDF"  />
 --></form>

 <?php }  ?>
 