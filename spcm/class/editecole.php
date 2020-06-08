<?php 


if (!empty($_POST)) {

    $message= array();
    if (isset($_POST['modifier'])) {
    $req = $db->prepare('UPDATE   ecoleformationstage SET 
        intitule = ?, 
        etabli = ?, 
        diplome = ?, 
        annee = ? 
        WHERE
        numecole = ? 
        ');   
    $req->execute(array(
         $_POST['intitule'],
         $_POST['etabli'],
         $_POST['diplome'],
         $_POST['annee'],
         $_GET['numecole']
        )); 
    
    $message['success'] = "Modification reussi";
        
    }

    if (isset($_POST['enregistrer'])) {
        # code...
    $req = $db->prepare('INSERT INTO ecoleformationstage SET 
        intitule = ?, 
        etabli = ?, 
        diplome = ?, 
        annee = ?, 
        id_civil = ?');   
    $req->execute(array(
         $_POST['intitule'],
         $_POST['etabli'],
         $_POST['diplome'],
         $_POST['annee'],
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
                            <th scope="col" colspan="5" ><div class="alert alert-info">DIPLOME</div></th>  
                        </tr>
                        <tr>
                            <th width="2%" ></th>
                            <th width="20%">INTITULE</th>
                            <th width="30%">ETABLISSEMENT</th>
                            <th width="20%">DIPLOME</th>
                            <th width="20%">ANNEE</th>
                            <th></th>                                                
                        </tr>
                    </thead>
                <tbody>
                    <?php $ecole = getEcoleFormation($_GET['id_civil']); ?>
                        <?php foreach ($ecole as $datas)  : ?>
                        <tr>
                            <td><a href="index.php?p=editecole&id_civil=<?php echo $datas->id_civil ?>&numecole=<?php echo $datas->numecole ?>"><i class="fa fa-edit fa-1x"></i></a></td>
                            <td><?php echo $datas->intitule ?></td>
                            <td><?php echo $datas->etabli ?></td>
                            <td><?php echo $datas->diplome ?></td>
                            <td><?php echo $datas->annee ?></td>
                            <td scope='col'><a onsubmit="return confirm("Etes vous sur ?")" href="index.php?p=delete&tab=ecole&var=<?php echo $datas->numecole ?>"><i class="fa fa-trash-o fa-1x"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                            
                    <?php //endif ?>     
                </tbody>
            </table>
            <a href="index.php?p=editecole&id_civil=<?php echo $_SESSION['varidcivil'] ?>" class='btn btn-info'>Créer Nouveau</a>
                        
        </div>
</div>
<hr>

<?php if (isset($_GET['numecole'])): ?>
    <?php $var = getEcoleByNum($_GET['numecole'])->fetch() ?>
    <form method='post' action=''>
    <div class="row">
    <div class='col-md-6'>
    <h2 class='text-red'>Modifier le diplôme</h2>
        <div class='form-group'>
            <label>INTITULE</label>
            <input required type='text' name='intitule' class='form-control' value='<?php echo $var->intitule ?>'  >
        </div>
        <div class='form-group'>
            <label>etabli</label>
            <input required type='text' name='etabli' class='form-control' value='<?php echo $var->etabli ?>'>
        </div>
            
        <div class='form-group'>
            <label>DIPLOME</label>
            <input required type='text' name='diplome' class='form-control' value='<?php echo $var->diplome ?>'>            
        </div>                
        <div class='form-group'>
            <label>ANNEE</label>
            <input required type='text' name='annee' class='form-control' value='<?php echo $var->annee ?>'>            
         </div>                

        <input type='submit' class='btn btn-warning' name='modifier' value='Modifier'>
    </div>
</div>
</form>
<?php endif ?>

<?php if (!isset($_GET['numecole'])): ?>
    
    <form method='post' action=''>
        <div class="row">
            <div class='col-md-6'>
            <h2 class='text-red'>Nouveau diplôme</h2>
                <div class='form-group'>
                    <label>INTITULE</label>
                    <input required type='text' name='intitule' class='form-control' >
                </div>
                <div class='form-group'>
                    <label>etabli</label>
                    <input required type='text' name='etabli' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>DIPLOME</label>
                    <input required type='text' name='diplome' class='form-control'>
                </div>            
                <div class='form-group'>
                    <label>ANNEE</label>
                    <input required type='text' name='annee' class='form-control'>
                </div>                
                <input type='submit' class='btn btn-warning' name='enregistrer' value='Enregistrer'>
            </div>                
        </div>
    </div>
    </form>
<?php endif ?>
</div>
 

