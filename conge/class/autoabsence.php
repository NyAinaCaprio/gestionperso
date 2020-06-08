<div class="login-social-link centered">
    <?php if (array_key_exists('message', $_SESSION)) : ?>
        <ul>
            <?php foreach ($_SESSION['message'] as $key => $message): ?>
            <li><div class='alert alert-<?php echo $key ?> '><?php echo $message ?></div></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <?php unset($_SESSION['message']); ?>

</div> 
<form class="formautoabsence" method="post" action="class/addAutoAbsence.php">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="id_etsouservice" class="form-control-label">Service ou Etablissement :</label>
            <select id="id_etsouservice" class="form-control"  onchange="showUser1(this.value)">
                <?php
                $data = getEtsouService();
                foreach ($data as $value) {  ?>
                    <option value="<?php echo $value->id_etsouservice ?>"><?php echo $value->etsouservice  ?></option>
                <?php } ?>
            </select>
        </div>
  <!--       <div class="form-group col-md-6">
            <label for="id_dettache" class="form-control-label">Personnel detaché :</label>
            <select id="id_dettache" class="form-control"  onchange="showUser2(this.value)">
 -->                <?php
/*                $data = getDetache();
                foreach ($data as $value) {  ?>
                    <option value="<?php echo $value->id_dettache ?>"><?php echo $value->dettache ?></option>
                <?php } */?>
<!--             </select>
        </div>
 -->
        <div id="txtHint" class="form-group">

        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="date" class="col-form-label">Date :</label>
            <input type="date" id="date" class="form-control" name="date" value="<?php echo date('Y-m-d') ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="heuredepart" class="col-form-label">Heure départ :</label>
            <input type="text" id="heuredepart" class="form-control" name="heuredepart" required>
        </div>
        <div class="form-group col-md-4">
            <label for="heureretour" class="col-form-label">Heure retour :</label>
            <input type="text" id="heureretour" class="form-control" name="heureretour" required>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="lieu" class="col-form-label">Lieu :</label>
            <input type="text" id="lieu" class="form-control" name="lieu" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <fieldset>
                <legend>Motif :</legend>
                <textarea required class="form-control" name="motif"></textarea>
            </fieldset>
        </div>
    </div>


    <div class="row">
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="checkbox" > j'accepte l'enregistrement
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <button type="submit" name="enregistrer" class="btn btn-primary" ><i class="fa fa-desktop"></i> Enregistrer</button>
    </div>

</form>