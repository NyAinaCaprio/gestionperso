 
 <section  class="content">

            <div class="row">
                <div class="col-md-12">

                    <!-- kjsdhskjdfhskjdfhk -->
<?php
    $ages = '';
    $annee = ''; 

if (!empty($_POST)) : 
    
    $data = getAgeAnneeSce($_POST['mychoix']);
    $ages = $data->age;  
    $anneesce= $data->anneedeservice;
  
?>

<!-- PROPOSITION -->
<?php if (isset($_POST['proposer'])) : ?>
    <table  class="table table-bordered">
    <tr>
      <th ></th>
      <th >Nom et prénoms</th>
      <th >Catégorie</th>
      <th >Function</th>
      <th >Ets ou Service</th>
      <th >Lieu de Détachement</th>
      <th >Année de Sce</th>
      <th >Ages</th>
      <?php  $list = viewProposDeco($ages, $anneesce, $_POST['mychoix']);

  foreach($list as $datas)  : ?>
    
    <?php 
    $var = getListcivil($datas->id_civil);

    foreach ($var as $datas): ?>
    </tr>
    <tr>
    <td><a href="index.php?p=viewPers&id_civil=<?php echo $datas->id_civil ?>" ><i class="fa fa-edit fa-1x"></i></a> </td>
      <td><?php echo $datas->nomprenom ?></td>
      <td><?php echo $datas->categorie_civil ?></td>
      <td><?php echo $datas->fonction ?></td>
      <td><?php echo $datas->etsouservice ?></td>
      <td><?php echo $datas->dettache  ?></td>
      <td><?php echo $datas->anneedeservice ?></td>
      <td><?php echo $datas->ages ?></td>
    </tr>
 
    <?php endforeach ?>
    <?php endforeach ?>
    <tr>
      <th colspan="9"><div class='text text-success rem3'>Résultat :: <?php echo $list->rowcount() ?> Personnels</div></th>
    </tr>
  </table>
<?php endif ?>

<!-- CONSULTATION -->
<?php if (isset($_POST['consulter'])) : ?>
 
    <table class="table table-bordered">
      <tr>
        <th  >&nbsp;</th>
        <th >Nom et prénoms</th>
        <th >Catégorie</th>
        <th >Ets ou Service</th>
        <th >Lieu de détachement</th>
        <th >Fonction</th>
        <th >Année de Sce</th>
        <th >Age</th>

        <?php  $list = consultDeco($_POST['mychoix']);
        foreach($list as $datas) : ?>
        <?php 
        $var = getListcivil($datas->id_civil);
        foreach ($var as $datas): ?>
            
        <?php endforeach ?>
      </tr>
      <tr>
          
    <td><a href="index.php?p=viewPers&id_civil=<?php echo $datas->id_civil ?>"  ><i class="fa fa-edit fa-1x"></i></a> </td>
             <?php $data = getListcivil($datas->id_civil) ?>
            <?php foreach ($data as $datas): ?>
                <td><?php echo $datas->nomprenom ?></td>
                <td><?php echo $datas->categorie_civil ?></td>
                <td><?php echo $datas->etsouservice ?></td>
                <td><?php echo $datas->dettache ?></td>
                <td><?php echo $datas->fonction ?></td>
                <td><?php echo $datas->anneedeservice ?></td>
                <td><?php echo $datas->ages ?></td>
            <?php endforeach ?> 
      </tr>
      <?php endforeach ?>
    <tr>
      <th colspan="9"><div class='text text-success rem3'>Résultat :: <?php echo $list->rowcount() ?> Personnels</div></th>
    </tr>
    </table>
 
    <?php endif ?>

<?php endif ?>
                    <!-- sdfkjshdkjfhskdjfhsdf -->
                    <div class="box">
                        <div id="centre" class="box-header with-border">
                            <div class="box box-solid bg-green-gradient">
                                <div class="box-header">
                                    <i class="fa fa-calendar"></i>
                                    <h3 class="box-title">Distinction Honorifique Civil</h3>

                                </div><!-- /.box-header -->

                            </div>
                            <!-- decoexporte.php -->
                            <!-- decorationconsulter() -->
                            <!-- decorationproposition() -->
                            <form action="" method="post" enctype="multipart/form-data" >
                                <div class="row">
                                    <div  class="col-md-12 ">
                                    <div class="col-md-3">
                                        <button name='proposer' type='submit' class="btn btn-block btn-primary " > <i class="fa fa-tags"></i> PROPOSITION </button>
                                    </div>
                                    <div class="col-md-3">
                                        <button name='consulter' type='submit' class="btn btn-block btn-primary " > <i class="fa fa-tags"></i> CONSULTER </button>
                                    </div>
                                </div>
                                </div>





                        <?php
                         $var = getAllTypeDecoration();

                        foreach ($var as $data) :  ?>


                            <div class="animated animate slideInLeft col-lg-6">
                                <label>
                                    <div  class="box-header with-border">
                                        <span class="radio" style="text-align: left">
                                        <input type="radio" name="mychoix" value="<?php echo $data->numdecorationcivil ?>"  />
                                            <i class="fa fa-folder-open"></i>
                                        <?php echo $data->decoration .' :: âges : '.$data->age.' :: Année de Sercive :  '.$data->anneedeservice ?>
                                        </span>
                                    </div><!-- /input-group -->
                                </label>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="col-md-3">
                            <button type="submit" name="exportversexcel" class="btn btn-block btn-success " id="exportverspdf"><i class="fa fa-file-excel-o"></i> Exporte vers Excel</button>
                        </div>

                        <!-- <div class="col-md-3">
                            <button type="submit" name="exportverspdf" id="exportverspdf" class="btn btn-block btn-info " > <i class="fa fa-file-pdf-o"></i> Exporte vers PDF</button>

                        </div> -->

                    </div>

                    <div id="myheader1" class="col-md-12"></div>

                    <div class="col-md-12 well">

                        <div class="col-md-6">

                                  <div class="alert alert-info">Primo : ORDRE NATIONAL DE MADAGASCAR (ONM)</div> 
                            <ul class="list-group  ">
                                <li class="list-group-item"><i class="fa fa-certificate"></i>  ALPHA : CHEVALIER (CH ONM) : 45 ans d'âge et 20 ans de Sce</li>
                                <li class="list-group-item"> <i class="fa fa-certificate"></i>  BRAVO : OFFICIER (OFF ONM) : 5 ans port de  chevalier</li>
                                <li class="list-group-item"> <i class="fa fa-certificate"></i>  CHARLIE : COMMANDEUR (COMM ONM) : 4 ans port de OFF ONM</li>
                                <li class="list-group-item"><i class="fa fa-certificate"></i>  DELTA : GRAND OFFICIER (GRAND OFF) : 3 ans port de (COMM ONM)</li>
                                <li class="list-group-item"><i class="fa fa-certificate"></i>  ECHO : GRAND CROIX DE DEUXIEME CLASSE (GRAND CROIX) : 5 ans port GRAND OFF</li>
                            </ul>

                        </div>

                            <div class="col-md-6">
                                <div class="alert alert-danger"> Secondo : ORDRE DE MERITE DE MADAGASCAR (OMM)</div> 
                            <ul class="list-group  ">
                                <li class="list-group-item"><i class="fa fa-certificate"></i>  ALPHA : CHEVALIER (CH OMM) : 40 ans d'âge et 20 ans de service</li>
                                <li class="list-group-item"><i class="fa fa-certificate"></i>  BRAVO :  OFFICIER (OFF OMM) : 5 ans port de CHEVALIER (CH OMM)</li>
                                <li class="list-group-item"><i class="fa fa-certificate"></i>  CHARLIE : COMMANDEUR (COMM OMM) : 5 ans port de OFFICIER (OFF OMM)</li>
                            </ul>

                        </div>

                    </div>


                    </form>


                </div><!-- /.box-header -->
 


                    </div><!-- /.box -->
                
                </div><!-- /.col -->


            </div><!-- /.row -->

           


        </section><!-- /.content -->
    

