<div class=' well'>
     
    <div class="alert alert-info">
        <h3> Liste personnel retraité en  <?php echo $_GET["annee"] ?></h3>    
    </div>   
    
</div>
<div id='centre'></div>         
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                                <?php $data = listeRetraite($_GET["annee"]); ?>
                        <h2 class="page-header">
                            <div class="text text-success rem3" >Résultat :: <?php echo $data->rowcount()?> Personnels  </div class="text text-success rem3">
                        </ h2>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <th ></th>
                                <th >Nom et prénoms</th>
                                <th >Catégorie</th>
                                <th >Service</th>
                                <th >Function</th>
                                <th >Lieu de détachement</th>
                                <th >Date probable retraite</th>
                                <th ></th>
                                <?php
                                foreach($data as $datas)  {
                                ?>
                            </tr>
                            <tr>
                                <td><a href="index.php?p=viewPers&id_civil=<?php echo $datas->id_civil ?>"><i class="fa fa-edit"></i></a></td>
                                <td><?php echo $datas->nomprenom ?></td>
                                <td><?php echo $datas->categorie_civil ?></td>
                                <td><?php echo $datas->etsouservice ?></td>
                                <td><?php echo $datas->fonction ?></td>
                                <td><?php echo $datas->dettache ?></td>
                                <td><?php echo $datas->retraite?>
                                <td><a href="class/supprtout.php?id_civil=<?php echo $datas->id_civil ?>"><?php if ($_SESSION['auth']->username="anja"): echo "<i class='fa fa-trash-o'>" ?> <?php endif ?></i></a></td>
                            </tr>
                            <?php }?>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

 