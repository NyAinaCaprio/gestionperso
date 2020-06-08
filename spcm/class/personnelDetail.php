 <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div id="centre" class="box-header with-border">
                <section class="content-header">
                    <h1>
                        Efféctif
                        <small>Stat</small>
                    </h1>
                </section>

                    <!-- Main content -->
                    <div class="row">
                        <?php
                        $res = resSommeCategorie();
                        foreach ($res as $data){
                            ?>

                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?php echo $data['categorie_civil']?></span>
                                            <span class="info-box-number"><?php echo $data['pourcent'].'%' ?></span>
                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-green" style="width:<?php echo $data['pourcent'].'%' ?>"></div>
                                            </div>
                                            <span class="progress-description"> 
                                            </span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div>


                                <?php } ?>
                            </div>


                            <div class="blog-item-header">

                                <div class="box-header">
                                    <h3 class="alert alert-success">Personnel interne</h3>
                                </div><!-- /.box-header -->

                            </div> 
                            
                            <div class="row padding-top-20">
                                <?php
                                $cat = getAllCategorie();
                                foreach ($cat as $data)
                                {
                                    $id_categorie_civil = $data->id_categorie_civil;

                                    ?>

                                    <div class="col-md-4 detailparets animated animate fadeInLeft">
                                        <div class="panel panel-default">
                                            <div class="panel-heading ">
                                                <i class="fa fa-twitter fa-2x"> <?php echo $data->categorie_civil.'_ Total : '.sumPersoInterne($id_categorie_civil) ?></i>
                                            </div>
                                            <div class="panel-body ">

                                                <table  width="100%" >
                                                    <tr>
                                                        <td >Service ou ETS</td>
                                                        <td >Effectifs</td>
                                                    </tr>
                                                    <?php $res = sumByEtsouService($id_categorie_civil);
                                                    foreach ($res as $do)
                                                    {

                                                        ?>
                                                        <tr>
                                                            <td><a data-service="SERVICE" href="#" class="" ><?php echo $do->etsouservice ?></a></td>
                                                            <td><?php echo $do ->sommepersonnel ?></td>
                                                        </tr>
                                                    <?php }?>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <br><br>

                            <div class="blog-item-header">

                                <div class="box-header">
                                    <h3 class="alert alert-success">Personnel détachée </h3>
                                </div>
                            </div>
                            <div class="row padding-top-20">
                                <?php

                                $cat = getAllCategorie();
                                foreach ($cat as $data)
                                {
                                    $id_categorie_civil = $data->id_categorie_civil;

                                    ?>
                                    <div class=" col-md-4 detailparets animated animate slideInLeft">
                                        <div class="panel panel-default">
                                            <div class="panel-heading ">
                                                <i class="fa fa-twitter fa-2x"> <?php echo $data->categorie_civil.'_ Total :'.sumPersoExterne($id_categorie_civil) ?></i>
                                            </div>
                                            <div class="panel-body ">

                                                <table width="100%" >
                                                    <tr>
                                                        <td ><span >DETACHE</span></td>
                                                        <td ><span >Effectifs</span></td>
                                                    </tr>
                                                    <?php  $res = sumByDetache($id_categorie_civil);
                                                    foreach ($res as $do)
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td><a data-id="" data-service="SERVICE" href="#" class="" ><?php echo $do->dettache ?></a></td>
                                                            <td><?php echo $do->Count_id_civil?></td>
                                                        </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                                <!-- row -->
        <div class="row">
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">STATISTIQUES</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <?php 
                        
                        $var = resSommeCategorie();
                    ?>
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Catégorie</th>
                          <th>Efféctifs</th>
                          <th>Pourcentages</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($var as $value): ?>
                        <tr>
                          <td><a href="pages/examples/invoice.html"><?php echo $value['categorie_civil'] ?></a></td>
                          <td > <div class='rem3'><?php echo $value['nb'] ?></div> </td>
                          <td> <div class='rem3'><?php echo $value['pourcent'] ?> %</div></td>                           
                        </tr>
                        <?php endforeach ?>
                        <tr>
                          <td><a href="pages/examples/invoice.html">EFFECTIFS TOTAL</a></td>
                          <td><div class='rem3'><?php echo $value['total'] ?> %</div> </td>
                          <td></td>
                        </tr>                        
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-4">
              <!-- PRODUCT LIST -->              
            </div><!-- /.col -->
          </div>                                
                                <!-- box -->
 
                            <div class="alert alert-info col-md-12">
                                <div class="col-md-12">
                                    <span>DETAIL PAR SERVICE ET DETACHEE</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">

                                    <table class="table table-bordered"  >
                                        <tr>
                                            <td width="106"><span >Personnel Interne</span></td>
                                            <td width="67"><span >Effectifs</span></td>
                                            <?php
                                          
                                            $var = effectifParEtsouService();

                                            foreach($var as $data){
                                            ?>
                                        </tr>
                                        <tr>
                                            <th><a data-id="<?php echo $data->id_etsouservice ?>" data-service="SERVICE" href="#" class="listeparservice" ><?php echo $data->etsouservice ?></a></th>
                                            <th><?php echo $data->Count_id_civil?></th>
                                        </tr>
                                        <?php }?>
                                    </table>
                                </div>
                                <div class="col-md-6">

                                    <table class="table table-bordered"  >
                                        <tr>
                                            <td width="106"><span >Personnel Détachée</span></td>
                                            <td width="67"><span >Effectifs</span></td>

                                            <?php
                                            $var = effectifParDettache();
                                            foreach($var as $datas)  {
                                            ?>
                                        </tr>
                                        <tr>
                                            <th><a data-id="<?php echo $datas->id_dettache ?>" data-service="DETTACHEE" href="#" class="listepardettache" ><?php echo $datas->dettache ?></a></th>
                                            <th><?php echo $datas->Count_id_civil ?></th>

                                        </tr>
                                        <?php }?>
                                    </table>

                                </div>
                            </div>

 
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
</div>
             
 