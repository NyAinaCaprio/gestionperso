    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <span class="box-title text-danger">Liste personnel trouvé :</span>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th ></th>
                            <th >Nom et prénoms</th>
                            <th >Service ou Ets</th>
                            <th >Détaché</th>
                            <th >Catégorie</th>
                            <th >Date retraite</th>
                            <th >Fonction</th>
                            <th >Date Recrute</th>
                            <th >Ages</th>
                            <th >Année de Sce.</th>
                            <th ></th>

                            <?php 
                            $var = "";
                                $donnee =  getRechcivil($_GET['critere']);
                                foreach($donnee as $datas) : ?>
                                <?php 
                                $var = getListcivil($datas->id_civil);

                                foreach ($var as $datas): ?>
                                        
                        </tr>
                        <tr>
                            <td><a href="index.php?p=viewPers&id_civil=<?php echo $datas->id_civil ?>" ><i class="fa fa-edit fa-1x"></i></a></td>
                            <td><?php echo $datas->nomprenom ?></td>
                            <td><?php echo $datas->etsouservice ?></td>
                            <td><?php echo $datas->dettache ?></td>
                            <td><?php echo $datas->categorie_civil ?></td>
                            <td><?php echo $datas->retraite ?></td>
                            <td><?php echo $datas->fonction ?>
                            <td><?php echo $datas->datederecrutement ?></td>
                            <td><?php echo $datas->ages ?></td>
                            <td><?php echo $datas->anneedeservice ?></td>
                            <td><a href="class/supprtout.php?id_civil=<?php echo $datas->id_civil ?>" ><i class="fa fa-trash-o fa-1x"></i></a></td>
                        </tr>
                                <?php endforeach ?>
                          <?php endforeach ?>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6 text text-success">
                        <?php if ($var): ?>
                            <h2> Résultat :: <?php echo $donnee->rowcount() ?> xxxpersonnel(s).  </h2>
                        <?php else: echo "<h2>Aucun resultat trouvé</h2> " ?>
                        <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 