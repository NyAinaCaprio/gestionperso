<?php 
session_start();

require 'spcm/inc/function.php';
connexiondb();

if (isset($_GET['p'])) {
  $p = $_GET['p'];
}else{
  $p='home';
}


ob_start();

require 'home/inc/include.php';

$contenu = ob_get_clean();
require "home/public/template/template.php";

?>