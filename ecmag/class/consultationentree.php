<?php 
require 'function.php';
connexiondb(); 
?>
<h2> Séléctionné votre choix</h2>
<hr />

<form name="form2" method="post" enctype="multipart/form-data" action="#">
 <div class="panel panel-primary">
    <div class="panel-heading">
    Consultation Entrée ou Sortie d'article
    </div>
<div class="panel-body">

<p>  <input type="radio" name="choix" id="choix" class="choix" value="1" />Entrée</p>
  <p><input type="radio" name="choix" id="choix" class="choix" value="2" />Sortie</p>
  <label>Date</label>
  <input type="text" name="date" required id="date" class="form-control" >

  <div class="panel-footer">
<!-- //listingarticlesentree.php -->
      <input type='submit' value='Afficher' class='btn btn-primary'>
  </div> 
    
</div>      
</div>
  
</form>

<table class="table table-striped table-bordered table-hover">
<tr>
     <th>Type</th>
    <th>Source</th>
    <th>Date</th>
    <th>N° Pièce jointe</th>
    <th>BL</th>
</tr>
 
  <?php if (isset($_POST['choix']) && isset($_POST['date']) ) {
   
  $data = consultationEntree($_POST['choix'], $_POST['date']);
  
  foreach ($data as $entree) : ?>

<tr>
   <?php $_SESSION['id_mouvement'] = $entree['id_mouvement']; ?>
  <td><?php echo $entree['type'] ?></td>
  <td><?php echo $entree['source'] ?></td>
  <td><?php echo $entree['date'] ?></td>
  <td><?php echo $entree['type'] ?></td>
  <td><?php echo $entree['type'] ?></td>
</tr>
  <?php endforeach ?>
  <?php 
  $data = consultationDetailMouv($_SESSION['id_mouvement']);
   ?>

  <div class="col-md-12">

    <p><h3>Detail Mouvement</h3></p>
    <table class="table table-striped table-bordered table-hover animated animate flash">
      <tr>
        <td>Désignation</td>
        <td>Quanité</td>
        <td>Etat</td>
        <td>Observation</td>
      </tr>
      <?php foreach ($data as $donnee) { ?>
      <tr>
            <?php $libprod = article($donnee['reference'])->fetch(); ?>
        <th><?php echo utf8_encode($libprod['libelleproduit']) ?></th>
        <th><?php echo $donnee['quantite'] ?></th>
        <th><?php echo utf8_encode($donnee['etat']) ?></th>
        <th><?php echo utf8_encode($donnee['observation']) ?></th>
      </tr>
      <?php } ?>
    </table>
  </div>

  <?php } ?>
</table>
