 
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

 <form  action="class/code.php" method="post" >
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="etsouservice">Personnel Interne :</label>
                <select class="form-control" required id="id_etsouservice" onchange="showUser1(this.value)" >
                    <?php
                    $etsouservice = getAllEtsouservice();
                    foreach ($etsouservice as $listeetsouservice) {?>
                        <option value="<?php echo $listeetsouservice->id_etsouservice ?>"><?php echo $listeetsouservice->etsouservice ?> </option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="id_dettache">Personnel détaché :</label>
                <select class="form-control" required id="id_dettache" onchange="showUser2(this.value)" >
                    <?php
                    $detache = getDetache();
                    foreach ($detache as $listedetache) {?>
                        <option value="<?php echo $listedetache->id_dettache ?>"><?php echo $listedetache->dettache ?> </option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div id="txtHint" >

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="nbrjour">Nombre de jour :</label>
                <input type="text" class="form-control" required id="nbrjour" name="nbrjour" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="datededepart">Date de départ :</label>
                <input  type="text" placeholder="AAAA/MM/JJ" required class="form-control" id="datededepart" name="datededepart" value="<?php echo date('Y-m-d') ?>" >
            </div>
        </div>
    </div>

    <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="motif">Motif :</label>
                    <input  type="text" class="form-control" id="motif" required name="motif" >
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="adresse">(Pour en jouir à )Adresse Compete :</label>
                    <input  type="text" class="form-control" id="adresse" name="adresse" >
                </div>
            </div>
    </div>

    <p >Type de congé : </p>
    <div class="row">
            <divclass='form-group'>
            <div class="custom-control custom-radio mb-3">
                <input value="1" name="type" type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" >
                <label class="custom-control-label" for="customControlValidation3">Droit Normal</label>
            </div>
        <div class='form-group'>
            <div class="custom-control custom-radio mb-3">
                <input value="2" name="type" type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" >
                <label class="custom-control-label" for="customControlValidation2">Droit Exceptionnel</label>
            </div>
        </div>
    </div>


    <div class="text text-danger"><h3> Validé par : </h3></div>

    <div class="row">
        <div class="form-group col-xs-4">
            <label class='form-control' for="chefdiv">
                <input type="radio" value="1" name="chefdiv" > Chef de division
            </label>
        </div>
        <div class="form-group col-xs-4">
            <label class='form-control' for="chefservice">
                <input type="radio" value="1" name="chefservice" > Chef de Service
            </label>
        </div>
        <div class="form-group col-xs-4">
            <label class='form-control' for="chefspcm">
                <input type="radio" value="1"  name="chefspcm" > Chef SPCM de la DIA
            </label>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <input required type="checkbox" name="valider" >
            J'accepte
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>

    </div>
</form> 