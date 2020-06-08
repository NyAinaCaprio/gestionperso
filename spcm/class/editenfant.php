<?php 


if (!empty($_POST)) {

    $message= array();
    if (isset($_POST['modifier'])) {
    $req = $db->prepare('UPDATE enfant SET 
        nomprenom = ?, 
        datenaiss = ?, 
        sexe = ?, 
        obs = ? 
        WHERE
        numenfant = ? 
        ');   
    $req->execute(array(
         $_POST['nomprenom'],
         $_POST['datenaiss'],
         $_POST['sexe'],
         $_POST['obs'],
         $_GET['numenfant']
        )); 
    
    $message['success'] = "Modification reussi";
        
    }

    if (isset($_POST['enregistrer'])) {
        # code...
    $req = $db->prepare('INSERT INTO enfant SET 
        nomprenom = ?, 
        datenaiss = ?, 
        sexe = ?, 
        obs = ?, 
        id_civil = ?');   
    $req->execute(array(
         $_POST['nomprenom'],
         $_POST['datenaiss'],
         $_POST['sexe'],
         $_POST['obs'],
         $_SESSION['varidcivil']
        )); 
    
    $message['success'] = "Enregistrement reussi";
    }

    $_SESSION['message'] = $message;

}

?>

<div class='container'>
    <div class='row'>
        <div class="col-md-9">    
            <div class='col-md-12'>
            <?php if ( array_key_exists('message', $_SESSION)) : ?>
           
            <?php foreach ($_SESSION['message'] as $key => $messages) :   ?>
              <div class="alert alert-<?php echo $key ?> ">
                <?php echo $messages ?>
              </div>  
            <?php endforeach ?>
          
            <?php endif ?>
            <?php unset($_SESSION['message']) ?>
         
        </div>
                <table class="table table-hover" id="addAvancementSucc_table">
                    <thead>
                        <tr>
                            <th scope="col" colspan="5" ><div class="alert alert-info">Efant</div></th>  
                        </tr>
                        <tr>
                            <th width="2%" ></th>
                            <th width="20%">Nom et Prénom(s)</th>
                            <th width="30%">Date de naissance</th>
                            <th width="20%">Sexe</th>
                            <th width="20%">Observation</th>
                            <th></th>                                                
                        </tr>
                    </thead>
                <tbody>
                    <?php $enfant = getEnfant($_GET['id_civil']); ?>
                        <?php foreach ($enfant as $datas)  : ?>
                        <tr>
                            <td><a href="index.php?p=editenfant&id_civil=<?php echo $datas->id_civil ?>&numenfant=<?php echo $datas->numenfant ?>"><i class="fa fa-edit fa-1x"></i></a></td>
                            <td><?php echo $datas->nomprenom ?></td>
                            <td><?php echo $datas->datenaiss ?></td>
                            <td><?php echo $datas->sexe ?></td>
                            <td><?php echo $datas->obs ?></td>
                            <td scope='col'><a onsubmit="return confirm("Etes vous sur ?")" href="index.php?p=delete&tab=enfant&var=<?php echo $datas->numenfant ?>" ><i class="fa fa-trash-o fa-1x"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                            
                    <?php //endif ?>     
                </tbody>
            </table>
            <a href="index.php?p=editenfant&id_civil=<?php echo $_SESSION['varidcivil'] ?>" class='btn btn-info'>Créer Nouveau</a>
                        
        </div>
</div>
<hr>

<?php if (isset($_GET['numenfant'])): ?>
    <?php $var = getEnfantByNum($_GET['numenfant'])->fetch() ?>
    <form method='post' action=''>
    <div class="row">
    <div class='col-md-6'>
    <h2 class='text-red'>Modifier Enfant</h2>
        <div class='form-group'>
            <label>NOM ET PRENOMS</label>
            <input required type='text' name='nomprenom' class='form-control' value='<?php echo $var->nomprenom ?>'  >
        </div>
        <div class='form-group'>
            <label>DATE DE NAISSANCE</label>
            <input required type='text' name='datenaiss' class='form-control' value='<?php echo $var->datenaiss ?>'>
        </div>
            
        <div class='form-group'>
            <label>SEXE</label>
            <select name="sexe">
                <option value="<?php echo $var->sexe ?>"><?php echo $var->sexe ?></option>
            </select>
        </div>                
        <div class='form-group'>
            <label>OBSERVATION</label>
            <select name="obs">
                <option value="<?php echo $var->obs ?>"><?php echo $var->obs ?></option>
                <option value="Légitime">Légitime</option>
                <option value="Adopté">Adopté</option>
                <option value="Reconu">Reconu</option>
            </select>
        </div>                

        <input type='submit' class='btn btn-warning' name='modifier' value='Modifier'>
    </div>
</div>
</form>
<?php endif ?>

<?php if (!isset($_GET['numenfant'])): ?>
    
    <form method='post' action=''>
        <div class="row">
        <div class='col-md-6'>
        <h2 class='text-red'>Nouveau enfant</h2>
            <div class='form-group'>
                <label>NOM ET PRENOM</label>
                <input required type='text' name='nomprenom' class='form-control' >
            </div>
            <div class='form-group'>
                <label>DATE DE NAISSANCE</label>
                <input required type='date' name='datenaiss' class='form-control'>
            </div>
                
        <div class='form-group'>
            <label>SEXE</label>
            <select name="sexe">
                <option value='M' >M</option>
                <option  value='F'>F</option>
            </select>
        </div>                
        <div class='form-group'>
            <label>OBSERVATION</label>
            <select name="obs">
                <option value='Légitime' >Légitime</option>
                <option value='Adopté'>Adopté</option>
                <option value='Reconu'>Reconu</option>
            </select>
        </div>                
            <input type='submit' class='btn btn-warning' name='enregistrer' value='Enregistrer'>
        </div>
    </div>
    </form>
<?php endif ?>
</div>
 

