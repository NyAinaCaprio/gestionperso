<?php 


if (!empty($_POST)) {

    $message= array();
    if (isset($_POST['modifier'])) {
    $req = $db->prepare('UPDATE avancementsuccessifs SET 
        statut = ?, 
        reference = ?, 
        dateeffet = ? 
        WHERE
        numavancementsucc = ? 
        ');   
    $req->execute(array(
         $_POST['statut'],
         $_POST['reference'],
         $_POST['dateeffet'],
         $_GET['numavancementsucc']
        )); 
    
    $message['success'] = "Modification reussi";
        
    }

    if (isset($_POST['enregistrer'])) {
        # code...
    $req = $db->prepare('INSERT INTO avancementsuccessifs SET 
        statut = ?, 
        reference = ?, 
        dateeffet = ?, 
        id_civil = ?');   
    $req->execute(array(
         $_POST['statut'],
         $_POST['reference'],
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
                <table class="table table-bordered" id="addAvancementSucc_table">
                    <thead>
                        <tr>
                            <th scope="col" colspan="5" ><div class="alert alert-info">Avancements Successifs</div></th>  
                        </tr>
                        <tr>
                            <th width="2%" ></th>
                            <th width="20%">Statut</th>
                            <th width="30%">Reférence</th>
                            <th width="20%">Date Effet</th>
                            <th></th>                                                
                        </tr>
                    </thead>
                <tbody>
                    <?php $avancements = getAvanSucc($_GET['id_civil']); ?>
                        <?php foreach ($avancements as $datas)  : ?>
                        <tr>
                            <td><a href="index.php?p=editavancem&id_civil=<?php echo $datas->id_civil ?>&numavancementsucc=<?php if ($datas->numavancementsucc): echo $datas->numavancementsucc ?><?php endif ?>"><i class="fa fa-edit fa-1x"></i></a></td>
                            <td><?php echo $datas->statut ?></td>
                            <td><?php echo $datas->reference ?></td>
                            <td><?php echo $datas->dateeffet ?></td>
                            <td scope='col'><a onsubmit="return confirm("Etes vous sur ?")" href="index.php?p=delete&tab=avance&var=<?php echo $datas->numavancementsucc ?>"><i class="fa fa-trash-o fa-1x"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                            
                    <?php //endif ?>     
                </tbody>
            </table>
            <a href="index.php?p=editavancem&id_civil=<?php echo $_SESSION['varidcivil'] ?>" class='btn btn-info'>Créer Nouveau</a>
                        
        </div>
</div>
<hr>

<?php if (isset($_GET['numavancementsucc'])): ?>
    <?php $var = getAvanSuccByNum($_GET['numavancementsucc'])->fetch() ?>
    <form method='post' action=''>
    <div class="row">
    <div class='col-md-6'>
    <h2 class='text-red'>Modifier avancement</h2>
        <div class='form-group'>
            <label>STATUS</label>
            <input required type='text' name='statut' class='form-control' value='<?php echo $var->statut ?>'  >
        </div>
        <div class='form-group'>
            <label>REFERENCE</label>
            <input required type='text' name='reference' class='form-control' value='<?php echo $var->reference ?>'>
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

<?php if (!isset($_GET['numavancementsucc'])): ?>
    
    <form method='post' action=''>
        <div class="row">
        <div class='col-md-6'>
        <h2 class='text-red'>Nouveau avancement</h2>
            <div class='form-group'>
                <label>STATUS</label>
                <input required type='text' name='statut' class='form-control' >
            </div>
            <div class='form-group'>
                <label>REFERENCE</label>
                <input required type='text' name='reference' class='form-control'>
            </div>
                
            <div class='form-group'>
                <label>DATE EFFET</label>
                <input required type='date' name='dateeffet' class='form-control'>
            </div>                

            <input type='submit' class='btn btn-warning' name='enregistrer' value='Enregistrer'>
        </div>
    </div>
    </form>
<?php endif ?>
</div>
 

