<?php
require '../../spcm/inc/function.php' ;
require '../inc/function.php' ;
connexiondb();


$texte = htmlspecialchars($_SERVER['REQUEST_URI']);
  
?>


<?php if (preg_match("#etsouservice#i", "'.$texte.'")==true): ?>
    <div class=" ">
      <label for="id_civil">Nom et prénoms :</label>
      <select class="form-control" name="id_civil" id="id_civil" >
        
        <?php 
        $q = intval($_GET['id_etsouservice']);
        $var = getPersById($q);
        foreach ($var as $data): ?>
          <option value="<?php echo $data->id_civil ?>"><?php echo $data->nomprenom ?></option>  
        <?php endforeach ?>
      </select>
    </div>
<?php endif ?>

<?php if (preg_match("#id_dettache#i", "'.$texte.'")==true): ?>
    <div class=" ">
      <label for="id_civil">Nom et prénoms :</label>
      <select class="form-control" name="id_civil" id="id_civil" >
        
        <?php 
        $q = intval($_GET['id_dettache']);
        $var = getPersByDetache($q); 
        foreach ($var as $data): ?>
          <option value="<?php echo $data->id_civil ?>"><?php echo $data->nomprenom ?></option>  
        <?php endforeach ?>
      </select>
    </div>
<?php endif ?> 
