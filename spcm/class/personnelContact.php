<section  class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div id="centre" class="box-header with-border">
                            <section class="content-header">
                                <h1>
                                    Contact
                                    <small>Personnel</small>
                                </h1>

                                <div class="row">
                                    <div class="col-md-4">
                                    <input type="text" placeholder="Recherche:  Nom ou prénoms... " id="macritere" name="macritere" class="form-control" onkeypress="formcontactcivil()"/>
                                    </div>

                                </div>

                            </section>
                            <hr>

                            <!-- Main content -->
                            <div id="contenu" class="row">
                                <div id="contenu" class="box-header with-border">
                                    <?php
                                    $contact = getAllPersLimite();
                                    foreach($contact as $data) { ?>
                                        
                                        <div class="col-md-4">
                                            <!-- Default box -->
                                            <div class="box box-solid box-default">
                                                <div class="box-header">
                                                    <h3 class="box-title"><a href="#" data-id="<?php echo $data->nomprenom ?>" class="affichedetailcivil" ><?php echo $data->nomprenom ?></a></h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                        <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <ul>Adresse</u> : <?php echo $data->adresseactuelle ?>
                                                    <div><u>Fonction</u> : <?php echo $data->fonction ?></div>
                                                    <div><u>Téléphone</u> : <?php echo $data->telephone ?></div>
                                                    <div><u>E-mail</u> : <?php echo $data->mail ?></div>
                                                        <?php 
                                                        $var = getEtsouService($data->id_etsouservice);
                                                        foreach ($var as $donnees): ?>
                                                    <div><u>ETS ou Service</u> : "<?php echo $donnees->etsouservice ?>" ; 
                                                        <?php endforeach ?>

                                                        <?php 
                                                        $var = getDetachebyId($data->id_detache);
                                                        foreach ($var as $donnees): ?>
                                                        <u>Détachée</u> : "<?php echo $donnees->dettache ?>"</div>
                                                        <?php endforeach ?>
                                                        
                                                    <?php 
                                                       $var = getCategorie($data->id_categorie_civil); 
                                                    foreach ($var as $donnees): ?>
                                                    <div><u>Categorie</u> : <?php echo $donnees->categorie_civil ?></div>
                                                    <?php endforeach ?>
                                                    
                                                    <div><u>Photo</u> : <img src="../Personnel/public/personnelimage/<?php echo $data->photo ?>" class="user-image" width="40px" height="auto" /> </div>
                                                </div><!-- /.box-body -->
                                            </div><!-- /.box -->
                                        </div><!-- /.col -->


                                    <?php }?>

                                </div><!-- /.box-header -->


                            </div>


                        </div><!-- /.box-header -->
                        
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Main row -->


        </section><!-- /.content -->
