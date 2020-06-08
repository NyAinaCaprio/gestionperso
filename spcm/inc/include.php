<?php 
if (isset($_GET['critere'])) {
	require 'class/listecivilerech.php';
	
}

if ($p=='home') {
	require 'class/personnelDetail.php';
}elseif ($p == 'add') {
	require 'class/personnelAdd.php';
}elseif($p=="deco"){
	require 'class/personnelDeco.php';

}elseif ($p=='detail') {
	require 'class/personnelDetail.php';
}elseif($p=='contact'){
	require 'class/personnelContact.php';

}elseif($p=='viewPers'){
	require 'class/personnelView.php';

}elseif ($p=='consult') {
	require 'class/personnelConsult.php';
}elseif ($p=='service') {
	require 'class/ajoutetsouservice.php';
}elseif ($p=='detache') {
	require 'class/ajoutdetache.php';
}elseif ($p=='listeretraite') {
	require 'class/listedateretraitecivil.php';
}elseif ($p=='editpers') {
	require 'class/fichepersonnelcivil.php';
}elseif ($p=='delete') {
	require 'class/deleteDetailPers.php';
}elseif ($p=='corps') {
	require 'class/ajoutcorps.php';
}elseif ($p=='editetatcivil') {
	require 'class/editetatcivil.php';
}elseif ($p=='editavancem') {
	require 'class/editavancem.php';
}elseif ($p=='editenfant') {
	require 'class/editenfant.php';
}elseif ($p=='editdeco') {
	require 'class/editdeco.php';
}elseif ($p=='editaffect') {
	require 'class/editaffect.php';
}elseif ($p=='editecole') {
	require 'class/editecole.php';
}elseif ($p=='directeur') {
	require 'class/directeur.php';
}
 ?>