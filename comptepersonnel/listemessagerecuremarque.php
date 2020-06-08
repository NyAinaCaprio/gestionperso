<!DOCTYPE html>
 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 
	<title> </title>
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
 
</head>
<body >
<form enctype="multipart/form-data" name="formmessageremark">

  <div class="panel panel-danger">

 <div class="panel-heading">
 Liste des messages reçus
    </div>         

  <div class="pull-center"></div> 

<?php
require_once ('../Personnel/function.php');
require_once ('function.php');
connexiondb();
$req = getMessageRecu($_SESSION["varidcivil"]);

foreach ($req as $data){
  ?>  
  <blockquote class="primary">
 <div><span>De : <?php echo $data["nomprenom"]; ?> _ Catégorie : <?php echo $data["categorie"]; ?> _ Ets ou Service : <?php echo $data["etsouservice"]; ?> </span></div>


                            <p>
                                <em>Message : <?php echo $data["remarque"]; ?></em>
                            </p>
                            <small>Date : <?php echo $data["date"]; ?>
                                <cite title="Source Title">  Heure : <?php echo $data["heure"]?></cite>
                            </small>
<?php 
		if($_SESSION["varidcivil"]=="77" || $_SESSION["varidcivil"]=="380"){
		$varia = $data["expediteur"];
		echo "<a data-id='$varia' class='repondreadmin' href='#'>Repondre</a> ";
		}else{
		
		}
		?>
</blockquote> 
<?php }?>
 
	<hr>
	 
 </div>
   
  </form>
</body>


</html>