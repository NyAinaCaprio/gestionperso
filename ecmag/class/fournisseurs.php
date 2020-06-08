<?php 
require'function.php';
connexiondb();

if(isset($_POST['enregistrer'])){
    $requete ='INSERT INTO fournisseurs SET 
societe = "'.$_POST['societe'].'",  
civilite = "'.$_POST['civilite'].'",
nomprenom = "'.$_POST['nomprenom'].'",
adresse = "'.$_POST['adresse'].'",
 codepostal = "'.$_POST['codepostal'].'",
ville= "'.$_POST['ville'].'",
telephone = "'.$_POST['telephone'].'",
mail = "'.$_POST['mail'].'",
observation = "'.$_POST['observation'].'"';

$db->exec($requete);
}
 ?>
<div class="overflow">
<h4>Listes  des fournisseurs :</h4>

 <div class="col-md-12">
    

<table class="table table-striped table-bordered table-hover">

    <thead>
        <th>SOCIETE</th>
        <th>Civ.</th>
        <th>NOM et PRENOMS</th>
        <th>Adresse</th>
        <th>TEL</th>
        <th>Mail</th>
        <th>Observation</th>
    </thead>
<?php
$query = getAllFournisseur();
foreach($query as $data) : ?>

<tbody>

    <td><a href="#" class="detailfournisseur" data-id_fournisseurs="<?php echo $data['id_fournisseurs'] ?>" title="ARTICLES ASSOCIES" > <?php echo $data['societe']; ?></a></td>
    <td><?php echo $data['civilite']; ?></td>
    <td><?php echo $data['nomprenom']; ?></td>
    <td><?php echo $data['adresse']; ?></td>
    <td><?php echo $data['telephone']; ?></td>
    <td><?php echo $data['mail']; ?></td>
    <td><?php echo $data['observation']; ?></td>


</tbody>
<?php endforeach ?>

    <tbody>
    <tr>
        <th colspan="7"> <?php echo $query ->rowcount(); ?> fournisseurs enregistr&eacute;s</th>
    </tr>
    </tbody>

</table>
</div>

    <form action="#" method ="post">

     <div class="col-md-12">
         <div class="col-md-4">
            <label for="societe">Société</label>
             <input type="text" class="form-control" required name="societe">
         </div>
         <div class="col-md-4">
             <label for="civilite">Civilité</label>
             <select class="form-control" name="civilite">
                 <option value="M">M</option>
                 <option value="F">F</option>
             </select>
         </div>
         <div class="col-md-4">
             <label for="nomprenom">Nom et Prénoms</label>
             <input type="text" class="form-control" required name="nomprenom">
         </div>
         <div class="col-md-4">
             <label for="adresse">Adresse</label>
             <input type="text" class="form-control" required name="adresse">
         </div>
         <div class="col-md-4">
             <label for="codepostal">Code Postal</label>
             <input type="text" class="form-control" required name="codepostal">
         </div>
         <div class="col-md-4">
             <label for="ville">Ville</label>
             <input type="text" class="form-control" required name="ville">
         </div>
         <div class="col-md-4">
             <label for="telephone">Téléphone</label>
             <input type="text" class="form-control" required name="telephone">
         </div>
         <div class="col-md-4">
             <label for="mail">Mail</label>
             <input type="email" class="form-control" required name="mail">
         </div>
         <div class="col-md-4">
             <label for="observation">observation</label>
             <input type="text" class="form-control" required name="observation">
         </div>

           <div class="col-md-12">
      <div class="col-md-3">
            <input type="submit" name='enregistrer' class="btn btn-success btn-xs " value='Enregistrer'>
      </div>  
    </div> 
    </form>
 </div>
