<?php  
if (isset($_POST['exportverspdf'])){
    ob_start();
    include(dirname(__FILE__).'/ficheinventaire.php');


    $content = ob_get_clean();
	

  
    require_once('vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr','UTF-8');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('Fiche_Inventaire.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}

if (isset($_POST['exportversexcel'])){

    require_once('exportversexcel.php');
}