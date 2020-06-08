<?php session_start();
require_once ("../personnel/inc/function.php");
connexiondb();
/*echo $_SESSION["varidcivil"];
echo $_SESSION["varservicelib"];
echo $_SESSION["varcategoriecivil"];
echo $_SESSION["varnomprenom"];*/
?>

<form action="#" class="formenvoyemessage" name="formenvoyemessage">
    <div class="interligne">
    <h3><?php
    $data=getListcivil($_SESSION['varidcivil']) ?>
    <span class="monimages"><img src="mesimages/<?php echo $data['photo']?>" alt="" width="60" height="58" /></span>
    <?php echo $_SESSION["varnomprenom"]; ?>  </h3>
    <div class="barre"></div>
        <br>
    <u>Service</u> : <?php echo $_SESSION["varservicelib"]; ?><br>
    <u>Catégorie</u> : <?php echo $_SESSION["varcategoriecivil"]; ?>
    </div>

<!-------------------->
<div class="col-md-12">

<div>
    <ul class="nav nav-tabs">
        <li class=" "> <a href="#sample-1a" data-toggle="tab">Reçu</a> </li>
        <li class=" "> <a href="#sample-1b" data-toggle="tab">Envoyé</a> </li>
        <li class=" "> <a href="#sample-1c" data-toggle="tab">Ecrire un message</a> </li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane fade active in" id="sample-1a">
            <div id="reception"><?php include("listemessagerecuremarque.php"); ?></div>
        </div>

        <div class="tab-pane fade" id="sample-1b">
            <div id="envoye"><?php include ("listemessageremarque.php"); ?></div>
        </div>

        <div class="tab-pane fade" id="sample-1c">
            <div class="mafooter">
                <h6>Dites nous si vous avez des remarques à propos de votre renseignement :</h6>

                <textarea class="textarea" id="remarque" name="remarque" placeholder="Votre remarque..."></textarea>
                    <br>
                    <hr />
                    <input type="button" onClick="enregmessageremarque()" class="btn btn-danger" value="Envoyé"><br/><br/>
             </div>
        </div>
    </div>

</div>
    
</div>


<div class="col-md-12">
    <div class="repondre"></div>
    <div  id="msgerreur"></div>
</div>

</form>
