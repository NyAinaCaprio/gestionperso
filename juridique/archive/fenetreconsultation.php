<?php session_start();
require_once('function.php');
connexiondb();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <div class="col-md-7">
<form action="resultatconsultation.php" method="POST" enctype="multipart/form-data" class="formparcelle">
  	<div class="row">
  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Projet:</label>
                                    <select name="id_projet" required="" class="form-control" id="id_projet">
                                      <option value=""></option>
                                                                          <?php
                                            $req = getAllProjet();
                                             
                                            foreach($req as $donnee) { ?>
                                                     <option value="<?php echo $donnee['id_projet'];?>"><?php echo $donnee['projet'];?></option>
                                                                          <?php }?>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type :</label>
                                     <select name="id_type" required="" class="form-control" id="id_type">
                                      <option value=""></option>
                                                                          <?php
                                            $req = getAllType();
                                             
                                            foreach($req as $donnee) { ?>
                                                     <option value="<?php echo $donnee['id_type'];?>"><?php echo $donnee['type'];?></option>
                                                                          <?php }?>

                                    </select>
                                </div>
                            </div>
                         
 
 	</div>	  

  
<div class="col-md-12">
    <div class="form-group">
        
  <span><input type="radio" name="choix" id="choix" value="1"> Date du : <input id="date1" type="date" name="date1"> au : <input  id="date2"  type="date" name="date2"></span> 

    </div>
</div>
                            

<div class="col-md-12">
    <div class="form-group">
        
 <span><input type="radio" name="choix" id="choix" value="2"> Titre : <input class="form-control" type="text" name="titre" id="titre"></span> 

    </div>
</div>
         
<div class="col-md-12">
    <div class="form-group">
        
 <span><input type="radio" name="choix" id="choix" value="3"> Numero : <input class="form-control" type="text" name="numero" id="numero"></span> 

    </div>
</div>
  
<div class="col-md-12">
    <div class="form-group">
        
 <span><input type="radio" name="choix" id="choix" value="4"> Observation : <textarea class="col-md-8 form-control" name="observation" id="observation"></textarea></span> 

    </div>
</div>  
 
<div class="col-md-12">
    <div class="form-group">
        
<p><button type="submit" class="btn btn-blue col-md-12"><i class="fa fa-check"></i>Afficher</button>
   </p> </div>
</div>  

  </form>
</div>
 		
 	   <!-- Bouton execution modal -->
<!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Lancer la modal
</button>-->
<!-- Modal -->
<!--
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Consultation par :</h4>
</div>
<div class="modal-body">
Exemple de modal
</div>
</div> 
</div> 
</div><!-- /.modal -->
 	  
 	</div>
 </div>

</body>
</html>