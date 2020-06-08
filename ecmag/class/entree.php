<?php session_start();
require_once ("function.php");
connexiondb();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
</head>
<body>
<div id="wrapper" class="">
    <?php
    require_once ('layout.php')
    ?>
    <div id="page-wrapper" class="animated animate fadeInLeft">
        <div id="page-inner">
            <div class="panel panel-info" id="msgerreur">  </div>

            <div class="entetedepage"> </div>

             <div class="contenu"  >   </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>



</body>
</html>
