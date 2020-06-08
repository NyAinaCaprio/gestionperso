<?php 


if (!empty($_POST)) {

    $message= array();
    if (isset($_POST['modifier'])) {
    $req = $db->prepare('UPDATE decoration_civil SET 
        numdecorationcivil = ?, 
        decretouarrete = ?, 
        annee = ?, 
        observation = ? 
        WHERE
        numdecoration = ? 
        ');   
    $req->execute(array(
         $_POST['numdecorationcivil'],
         $_POST['decretouarrete'],
         $_POST['annee'],
         $_POST['observation'],
         $_GET['numdecoration']
        )); 
    
    $message['success'] = "Modification reussi";
        
    }

    if (isset($_POST['enregistrer'])) {
        # code...
    $req = $db->prepare('INSERT INTO decoration_civil SET 
        numdecorationcivil = ?, 
        decretouarrete = ?, 
        annee = ?, 
        observation = ?, 
        id_civil = ?');   
    $req->execute(array(
         $_POST['numdecorationcivil'],
         $_POST['decretouarrete'],
         $_POST['annee'],
         $_POST['observation'],
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
                            <th scope="col" colspan="5" ><div class="alert alert-info">Décoration civil</div></th>  
                        </tr>
                        <tr>
                            <th width="2%" ></th>
                            <th width="40%">Libellé décoration</th>
                            <th width="30%">Decret ou arrétée</th>
                            <th width="20%">Année</th>
                            <th width="20%">Observation</th>
                            <th></th>                                                
                        </tr>
                    </thead>
                <tbody>
                    <?php $deco = getDecoDetail($_GET['id_civil']); ?>
                        <?php foreach ($deco as $datas)  : ?>

                        <tr>
                            <td><a href="index.php?p=editdeco&id_civil=<?php echo $datas->id_civil ?>&numdecoration=<?php echo $datas->numdecoration ?>"><i class="fa fa-edit fa-1x"></i></a></td>
                            <td><?php echo $datas->decoration ?></td>
                            <td><?php echo $datas->decretouarrete ?></td>
                            <td><?php echo $datas->annee ?></td>
                            <td><?php echo $datas->observation ?></td>
                            <td scope='col'><a onsubmit="return confirm("Etes vous sur ?")" href="index.php?p=delete&tab=deco&var=<?php echo $datas->numdecoration ?>" ><i class="fa fa-trash-o fa-1x"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                            
                    <?php //endif ?>     
                </tbody>
            </table>
            <a href="index.php?p=editdeco&id_civil=<?php echo $_SESSION['varidcivil'] ?>" class='btn btn-info'>Créer Nouveau</a>
                        
        </div>
</div>
<hr>

<?php if (isset($_GET['numdecoration'])): ?>
    <?php $var = getDecoDetailByNum($_GET['numdecoration'])->fetch(); ?>
    <form method='post' action=''>
    <div class="row">
        <div class='col-md-6'>
        <h2 class='text-red'>Modifier Décoration</h2>
            <div class='form-group'>
                <label>LIBELLE DECORATION</label>
                        
                    <select name='numdecorationcivil' class='form-control'>
                    <?php  $lib_deco = getIntituleDeco($var->numdecorationcivil) ?>
                    <?php foreach ($lib_deco as  $datas) : ?>
                        <option value='<?php echo $datas->numdecorationcivil ?>'><?php echo $datas->decoration ?></option>
                    <?php endforeach ?>
                    

                    <?php $listeDeco = getAllTypeDecoration() ?>
                    <?php foreach ( $listeDeco as $liste ): ?>
                        <option value='<?php echo $liste->numdecorationcivil ?>'><?php echo $liste->decoration  ?></option>
                    <?php endforeach ?>
                    </select>

            </div>
            <div class='form-group'>
                <label>DECRET OU ARRETEE</label>
                <input required type='text' name='decretouarrete' class='form-control' value='<?php echo $var->decretouarrete ?>'>
            </div>
                
            <div class='form-group'>
                <label>ANNEE</label>
                <input required type='text' name='annee' class='form-control' value='<?php echo $var->annee ?>'>
            </div>
            <div class='form-group'>
                <label>OBSERVATION</label>
                <input required type='text' name='observation' class='form-control' value='<?php echo $var->observation ?>'>            
            </div>                

            <input type='submit' class='btn btn-warning' name='modifier' value='Modifier'>
        </div>
    </div>
</form>
<?php endif ?>

<?php if (!isset($_GET['numdecoration'])): ?>
    
    <form method='post' action=''>
        <div class="row">
        <div class='col-md-6'>
        <h2 class='text-red'>Nouveau décoration</h2>
            <div class='form-group'>
                <label>LIBELLE DECORATION</label>
                   <select name='numdecorationcivil' class='form-control'>                    
                    <?php $listeDeco = getAllTypeDecoration() ?>                    
                    <?php foreach ( $listeDeco as $liste ): ?>
                        <option value='<?php echo $liste->numdecorationcivil ?>'><?php echo $liste->decoration  ?></option>
                    <?php endforeach ?>
                    </select>
            </div>
            <div class='form-group'>
                <label>DECRET OU ARRETER</label>
                <input required type='text' name='decretouarrete' class='form-control'>
            </div>
            <div class='form-group'>
                <label>ANNEE</label>
                <input required type='text' name='annee' class='form-control'>
            </div>                
            <div class='form-group'>
                <label>OBSERVATION</label>
                <input required type='text' name='observation' class='form-control'>
            </div>               
            <input type='submit' class='btn btn-warning' name='enregistrer' value='Enregistrer'>
        </div>
    </div>
    </form>
<?php endif ?>
</div>
 

