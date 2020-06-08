<?php 


if (!empty($_POST)) {

    $message= array();
    if (isset($_POST['modifier'])) {
    $req = $db->prepare('UPDATE  affectationsuccessivecivil SET 
        lieuaffect = ?, 
        detachement = ?, 
        fonctiontenue = ?, 
        dateeffet = ? 
        WHERE
        numaffectciv = ? 
        ');   
    $req->execute(array(
         $_POST['lieuaffect'],
         $_POST['detachement'],
         $_POST['fonctiontenue'],
         $_POST['dateeffet'],
         $_GET['numaffectciv']
        )); 
    
    $message['success'] = "Modification reussi";
        
    }

    if (isset($_POST['enregistrer'])) {
        # code...
    $req = $db->prepare('INSERT INTO affectationsuccessivecivil SET 
        lieuaffect = ?, 
        detachement = ?, 
        fonctiontenue = ?, 
        dateeffet = ?, 
        id_civil = ?');   
    $req->execute(array(
         $_POST['lieuaffect'],
         $_POST['detachement'],
         $_POST['fonctiontenue'],
         $_POST['dateeffet'],
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" colspan="5" ><div class="alert alert-info">Effectations successives</div></th>  
                        </tr>
                        <tr>
                            <th width="2%" ></th>
                            <th width="20%">Lieu Affectation</th>
                            <th width="30%">Détachement</th>
                            <th width="20%">Fonction tenue</th>
                            <th width="20%">Date effet</th>
                            <th></th>                                                
                        </tr>
                    </thead>
                <tbody>
                    <?php $affect = getAffecSucc($_GET['id_civil']); ?>
                        <?php foreach ($affect as $datas)  : ?>
                        <tr>
                            <td><a href="index.php?p=editaffect&id_civil=<?php echo $datas->id_civil ?>&numaffectciv=<?php echo $datas->numaffectciv ?>"><i class="fa fa-edit fa-1x"></i></a></td>
                            <td><?php echo $datas->lieuaffect ?></td>
                            <td><?php echo $datas->detachement ?></td>
                            <td><?php echo $datas->fonctiontenue ?></td>
                            <td><?php echo $datas->dateeffet ?></td>
                            <td scope='col'><a onsubmit="return confirm("Etes vous sur ?")" href="index.php?p=delete&tab=affect&var=<?php echo $datas->numaffectciv ?>"><i class="fa fa-trash-o fa-1x"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                            
                    <?php //endif ?>     
                </tbody>
            </table>
            <a href="index.php?p=editaffect&id_civil=<?php echo $_SESSION['varidcivil'] ?>" class='btn btn-info'>Créer Nouveau</a>
                        
        </div>
</div>
<hr>

<?php if (isset($_GET['numaffectciv'])): ?>
    <?php $var = getAffecSuccByNum($_GET['numaffectciv'])->fetch() ?>
    <form method='post' action=''>
    <div class="row">
    <div class='col-md-6'>
    <h2 class='text-red'>Modifier Affectation</h2>
        <div class='form-group'>
            <label>LIEU D'AFFECTATION</label>
            <input required type='text' name='lieuaffect' class='form-control' value='<?php echo $var->lieuaffect ?>'  >
        </div>
        <div class='form-group'>
            <label>DETACHEMENT</label>
            <input required type='text' name='detachement' class='form-control' value='<?php echo $var->detachement ?>'>
        </div>
            
        <div class='form-group'>
            <label>FONCTION TENUE</label>
            <input required type='text' name='fonctiontenue' class='form-control' value='<?php echo $var->fonctiontenue ?>'>            
        </div>                
        <div class='form-group'>
            <label>DATE EFFET</label>
            <input required type='date' name='dateeffet' class='form-control' value='<?php echo $var->dateeffet ?>'>            
         </div>                

        <input type='submit' class='btn btn-warning' name='modifier' value='Modifier'>
    </div>
</div>
</form>
<?php endif ?>

<?php if (!isset($_GET['numaffectciv'])): ?>
    
    <form method='post' action=''>
        <div class="row">
            <div class='col-md-6'>
            <h2 class='text-red'>Nouvelle Affectation</h2>
                <div class='form-group'>
                    <label>Lieu D'AFFECTATION</label>
                    <input required type='text' name='lieuaffect' class='form-control' >
                </div>
                <div class='form-group'>
                    <label>DETACHEMENT</label>
                    <input required type='text' name='detachement' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>FONCTION TENUE</label>
                    <input required type='text' name='fonctiontenue' class='form-control'>
                </div>            
                <div class='form-group'>
                    <label>DATE EFFET</label>
                    <input required type='date' name='dateeffet' class='form-control'>
                </div>                
                <input type='submit' class='btn btn-warning' name='enregistrer' value='Enregistrer'>
            </div>                
        </div>
    </div>
    </form>
<?php endif ?>
</div>
 

