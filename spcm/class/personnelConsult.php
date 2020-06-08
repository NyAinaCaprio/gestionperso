<!-- exportverspdf.php -->

  <section  class="content">
    <div class="row">
      <div class="col-md-12">
        <div id="centre" class="box">
          <div  class="box-header with-border">
            <?php if(array_key_exists('message', $_SESSION)) : ?>
            <div class="alert alert-danger"><?php echo $_SESSION['message'] ?></div>
          <?php endif ?>
          <?php unset($_SESSION['message']); ?>
          <form method="post" action="" >
            <div id="msgerreur" class="panel-info"></div>
            <div  class="animated animate alert alert-info" id="consult">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4 pull-center">
                      <div class="form-group">
                        <label for="categorie">Catégorie :</label>
                        <select name="categorie"  class="form-control">
                          <option value="1"></option>
                          <option value="2">ECD</option>                                                             
                          <option value="3">EFA</option>                                                             
                          <option value="4">FONCTIONNAIRE</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <div class="">
                        <label>
                          <input   type="radio" name="choix"  value="1" />TOUS</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="col-md-3">
                        <div class="">
                          <label>
                            <input   type="radio" name="choix"  value="2" />
                            ETS ou Service
                          </label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <select name="etsouservice" class="etsouservice form-control" id="select-form">
                          <?php
                          $requete2 = 'SELECT * FROM etsouservice';
                          $resultat2 = $db->query($requete2);
                          while($route=$resultat2->fetch()) { ?>
                          <option value="<?php echo $route->id_etsouservice ;?>"><?php echo $route->etsouservice ;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="col-md-3">
                        <div class="radio">
                          <label>
                            <input type="radio" name="choix" value="3" />
                            Lieu de détachement
                          </label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <select name="dettache" class="form-control">
                          <?php
                          $requete2 = 'SELECT * FROM dettache';
                          $resultat2 = $db->query($requete2);
                          while($route=$resultat2->fetch()) { ?>
                          <option value="<?php echo $route->id_dettache ;?>"><?php echo $route->dettache ;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="col-md-3">
                        <div class="radio">
                          <label>
                            <input type="radio" name="choix"  value="4" />
                            Année de service supérieure ou égale à
                          </label>
                        </div>
                      </div>
                        <div class="col-md-6">
                          <input type="text" name="anneesce" class="form-control"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <button name="apercu" type='submit' class="btn btn-block btn-warning btn-flat animated animate flip"> <i class="fa fa-search fa-2x"></i> Aperçu avant impression</button>
                    </div>
                    <div class="col-md-4">
                      <!-- <button name="exportversexcel" class="btn btn-block btn-success btn-flat animated animate flip" type="submit" > <i class="fa fa-file-excel-o fa-2x"></i> Exporter vers Excel</button> -->
                    </div>
  <!-- <div class="col-md-4">
  <button name="exportverspdf" type="submit" class="btn btn-block btn-primary btn-flat animated animate flip"><i class="fa fa-file-pdf-o fa-2x"></i> Exporter vers PDF</button>
  </div> -->

                </div>
              </div>
            </form>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
              </div>
            </div><!-- /.row -->
          </div><!-- ./box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  <!-- Main row -->


  </section><!-- /.content -->
    <?php if (empty($_POST)) : ?>
    <div class="alert alert-info">
      <p><h2>Les 10 dérniers enregistrements</h2></p>
    </div>
        <table id="example2" class="table table-bordered table-hover">
          <tr>
              <th></th>
              <th>Nom et prénoms</th>
              <th>Service ou Ets</th>
              <th>Détaché</th>
              <th>Catégorie</th>
              <th>Date retraite</th>
              <th>Fonction</th>
              <th>Date Recrute</th>
              <th>Ages</th>
              <th>Année de Sce.</th>
              <th></th>
                  <?php 

                  $var =  getAllPersLimite();

                  foreach($var as $datas) : ?>

                  <?php
                    $liste = getListcivil($datas->id_civil);
                   foreach ($liste as $datas): ?>
                    
          </tr>
          <tr>                          
              <td><a href="index.php?p=viewPers&id_civil=<?php echo $datas->id_civil ?>"><i class="fa fa-edit fa-1x"></i></a></td>
              <td><?php echo $datas->nomprenom ?></td>
              <td><?php echo $datas->etsouservice ?></td>
              <td><?php echo $datas->dettache ?></td>
              <td><?php echo $datas->categorie_civil ?></td>
              <td><?php  if(($datas->categorie_civil =="EFA") || ($datas->categorie_civil =="FONCTIONNAIRE") ){
            echo $datas->retraite ;
            }else{
            echo $datas->retraite ;
            
            }?></td>
              <td><?php echo $datas->fonction ?>
              <td><?php echo $datas->datederecrutement ?></td>
              <td><?php echo $datas->ages ?></td>
              <td><?php echo $datas->anneedeservice ?></td>
              <td><a href="class/supprtout.php?id_civil=<?php echo $datas->id_civil ?>" ><i class="fa fa-trash-o fa-1x"></i></a></td>
          </tr>
                  <?php endforeach ?>
            <?php endforeach ?>
      </table>
    <?php endif ?>
            
  <?php if (!empty($_POST)) : ?>  
    <?php
    $resultat = array();
 
 if (!isset($_POST['choix'])) {
        $_SESSION['message'] = "Veuillez préciser votre choix ";
        header('location: index.php?p=consult');
        exit(); 
    }

    $var = $_POST['categorie'].$_POST['choix'];

    if ($var== 21 or $var== 31 or $var== 41){
      $resultat = persByCategorie($_POST['categorie']);
    }elseif ($var==12){
      $resultat = persByService($_POST['etsouservice']);
    }elseif ($var==13){
      $resultat = persByDetache($_POST['dettache']);
    }elseif ($var==22 or $var==32 or $var==42){
      $resultat = persByCategServ($_POST['categorie'], $_POST['etsouservice']);
    }elseif ($var==23 or $var==33 or $var==43 ){
      $resultat = persByCatDet($_POST['categorie'], $_POST['dettache'] );
    }elseif ($var==14 or $var==24 or $var==34 or $var==44 ) {
      $resultat =persByAnneeService($_POST['anneesce']);
    }elseif($var==11) {
      $resultat = getAllPers();
      //$resultat = getAllPers();
    }else {
      $_SESSION['message'] = "Veuillez préciser votre choix";
      exit();
    }
 ?>
<?php  if (isset($_POST['apercu'] ))  :  ?>
    <table class="table table-hover  ">
    <tr>
      <th> </th>
      <th>Nom et prénoms</th>
      <th>Service ou Ets</th>
      <th>Détaché</th>
      <th>Catégorie</th>
      <th>Date retraite</th>
      <th>Fonction</th>
      <th>Date Recrute</th>
      <th>Ages</th>
      <th>Année de Sce.</th>
      <th>&nbsp;</th>
    </tr>
      <?php

        foreach($resultat as $datas)  : ?>
      <?php  $var = getListCivil($datas->id_civil);
      foreach ($var as $data) :?>
    <tr>
      <td><a href="index.php?p=viewPers&id_civil=<?php echo $data->id_civil ?>"<i class="fa fa-edit fa-1x"></i></a> </td>
      <td align="left"><?php echo $data->nomprenom  ?></td>
      <td><?php echo $data->etsouservice ?></td>
      <td><?php echo $data->dettache ?></td>
      <td><?php echo $data->categorie_civil ?></td>
      <td><?php 
      if(($data->categorie_civil =="EFA") || ($data->categorie_civil=="FONCTIONNAIRE") ){
      echo  $data->retraite ;
      }else{
      echo  $data->retraite ;
      
      }?>
      </td>
      <td><?php echo $data->fonction ?></td>
      <td><?php echo $data->datederecrutement ?></td>
      <td><?php echo $data->ages ;?></td>
      <td><?php echo $data->anneedeservice ?></td>
      <td><a href="class/supprtout.php?id_civil=<?php echo $data->id_civil ?>" ><i class="fa fa-trash-o fa-1x"></i></a></td>
    </tr>
    <?php endforeach ?>
    <?php endforeach ?>
    <tr>
      <th colspan="11" ><div class ='alert alert-info '>Résultat :: <?php echo $resultat->rowcount();?> personnels </div></th>
    </tr>
  </table> 
<?php endif ?>
<!-- exportversexcel -->
<?php if (isset($_POST['exportversexcel'] ))  : ?>
      <?php require_once('exportexcel.php'); ?>
<?php endif ?>
<!-- END exportversexcel -->

<?php endif ?>