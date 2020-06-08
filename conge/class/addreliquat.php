<?php
$message='';
?>
    <div class="login-social-link centered">
        <?php if ( array_key_exists('message', $_SESSION)) : ?>
                <ul>
                    <?php foreach ($_SESSION['message'] as $key => $messages) :   ?>
                    <li>
                        <div class='alert alert-<?php echo $key ?>'>
                            <?php echo $messages ?>
                        </div>
                    </li>
                    <?php endforeach ?>
                </ul>
        <?php endif ?>
        <?php unset($_SESSION['message']) ?>

    </div> 
<div id="" class="col-md-12">
    <form method="post" action="class/codeajoutreliquat.php">
        <div class="row">
            <div class="form-group col-md-6">

                <label for="id_etsouservice" class="form-control-label">Personnel Interne :</label>
                <select id="id_etsouservice" class="form-control"  onchange="showUser1(this.value)">
                    <?php
                    $data = getAllEtsouservice();
                    foreach ($data as $value) {  ?>
                        <option value="<?php echo $value->id_etsouservice ?>"><?php echo $value->etsouservice ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="id_dettache" class="form-control-label">Personnel detaché :</label>
                <select id="id_dettache" class="form-control"  onchange="showUser2(this.value)">
                    <?php
                    $data = getDetache();
                    foreach ($data as $value) {  ?>
                        <option value="<?php echo $value->id_dettache ?>"><?php echo $value->dettache ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="txtHint" >

            </div>
        </div>
<div class='row'>

            <div class="form-group col-md-4">
                <label for="nbrReliquat" class="col-form-label">Nbr Reliquat :</label>
                <input type="text" required class="form-control" name="nbrReliquat">
            </div>
            <div class="form-group col-md-4">
                <label for="anneereliquat" class="col-form-label">Année :</label>
                <input type="text" required  class="form-control"  name="anneereliquat" value="<?php echo date("Y") ?>" >
            </div>

</div>

        
        <div class="row">
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" required type="checkbox" name="checkbox" > j'accepte
                    </label>
                    <button type="submit" name="enregistrer" class="btn btn-primary" ><i class="fa fa-desktop"></i> Enregistrer</button>
                </div>
            </div>
        </div>

    </form>
