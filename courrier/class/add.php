<?php 
$degre = getDegre();
$class = getClassement();
$type = getTypeCourrier();



 ?>
<form method="post" action ="class/codeAdd.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="autorite_origine">Autorite Origine</label>
      <input type="text" class="form-control" id="autorite_origine" name="autorite_origine" required placeholder="autorite_origine">
    </div>
    <div class="form-group col-md-6">
      <label for="numrefcourrier">Référence </label>
      <input type="text" class="form-control" id="numrefcourrier" name="numrefcourrier" required placeholder="numrefcourrier">
    </div>
  </div>
  <div class="form-group">
    <label for="objet_courrier">Objet</label>
    <input type="text" class="form-control" id="objet_courrier" name="objet_courrier" required placeholder="objet_courrier">
  </div>
  <div class="form-group">
    <label for="remarque">Remarque</label>
    <textarea class="form-control" id="remarque" name="remarque" required ></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="datecourrier">Date</label>
      <input type="date" name="datecourrier" required class="form-control" id="datecourrier">
    </div>
    <div class="form-group col-md-4">
      <label for="id_degre">Degré</label>
      <select name="id_degre" required id="id_degre" class="form-control">
        <?php foreach ($degre as $value): ?>
        <option selected value="<?php echo $value->id_degre ?>" ><?php echo $value->degre ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="id_classement">Classement</label>
      <select name="id_classement" required id="id_classement" class="form-control">
        <?php foreach ($class as $value): ?>
        <option selected value="<?php echo $value->id ?>"><?php echo $value->classement ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="id_type_courrier">Type</label>
      <select id="id_type_courrier" name="id_type_courrier" required class="form-control">
        <?php foreach ($type as $value): ?>
        <option selected value="<?php echo $value->id_type_courrier ?>"><?php echo $value->type ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group custom-file form-group">
      <label class="custom-file-label" for="validatedCustomFile">Choisir le fichier ...</label>
      <input type="file" class="custom-file-input" name="image" required>
     </div>
  </div>
  <hr>
  
  <div class="form-group col-md-4">
    <div class="form-check">
      <input required class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
       Valider l'enregistrement
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>

</form>
<script type="text/javascript">
  
</script>