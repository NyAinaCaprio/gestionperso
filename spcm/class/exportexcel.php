<?php
$codehtml = '';
$codehtml = '
<div align="center">

 
          <table width="785" style="line-height:14px" border="0">
            <tr>
              <td colspan="3"></td>
            </tr>
            
            <tr>
              <td width="359"><div align="center"><strong><u><center>GOUVERNEMENT</center></u></strong></div></td>
              <td width="165">&nbsp;</td>
              <td width="137">&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center"><strong><u><center>MINISTERE DE LA DEFENSE NATIONALE</center></u></strong></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center"><strong><u><center>ETAT MAJOR GENERAL DE L\'ARMEE MALAGASY</center></u></strong></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center"><strong><u><center>DIRECTION DE L\'INTENDANCE DE L\'ARMEE</center></u></strong></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>

</div>

<div style=" text-align:center; background:#1E15C8; color:red; font-weight:bold"><center><h3>Liste Personnel Civil</h3></center></div>
<hr/>
<div id="montableau">
          <table border="1" cellspacing="0" cellpadding="0" style="line-height:12px;">
            <tr style="background:#6699FF">
              <td >Nom et prénoms</td>
              <td >Service ou Ets</td>
              <td >Détaché</td>
              <td >Catégorie</td>
              <td >Date retraite</td>
              <td >Fonction</td>
              <td >Date Recrute</td>
              <td >Ages</td>
              <td >Année de Sce.</td>
             </tr>';

          foreach ($resultat as $datas) {
          $var = getListCivil($datas->id_civil);

          foreach ($var as $datas) {
             
          
          $codehtml.=' 

            <tr>
          <th align="left">'.$datas->nomprenom.'</th>  
          <th>'.$datas->etsouservice.'</th>
          <th>'.$datas->dettache.'</th>
          <th>'.$datas->categorie_civil.'</th>
          <th>'.$datas->retraite.'</th>
          <th align="left">'.$datas->fonction.'</th>
          <th>'.$datas->datederecrutement.'</th>
          <th>'.$datas->ages.'</th>
          <th>'.$datas->anneedeservice.'</th>
            </tr>';
            }
          }

          $codehtml.='


          </table>
</div>
</div>

<div style=" font-weight:bold; font-size:14px; text-align:center"><p>Le nombre des personnels civil est arrêté à la somme de : '.$resultat->rowcount().'<p></div>
<br/>

<div style=" margin-left:10cm"> Fait à Antananarivo le,........................... </div>


</div>';

header("Content-Type: application/xls");
header("Content-Disposition:attachment; filename=Liste_Personnel_Civil.xls");
echo $codehtml;

 
?>

