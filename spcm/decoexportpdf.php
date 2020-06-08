<?php
$db = new PDO('mysql:host=localhost;dbname=dia', 'root', '');
?>
<style type="text/Css">

    .test1
    {
        border: solid 1px #FF0000;
        background: #FFFFFF;
        border-collapse: collapse;
    }
    .fondbleu{
        background-color: blue;
        color:#FFFFFF;
    }

</style>
<page orientation="paysage"  style="font-size: 12px">

    <span>GOUVERNEMENT</span><br>
    <span>MINISTERE DE LA DEFENSE NATIONALE</span><br>
    <span>ETAT MAJOR GENERAL DE L'ARMEE MALAGASY</span><br>
    <span>DIRECTION DE L'INTENDANCE DE L'ARMEE</span><br>
    <span style="font-weight: bold; font-size: 18pt; color: #FF0000; font-family: Times; text-align: center;"> Fiche Personnel Civil  <br></span>

    <hr style="height: 1mm; background: #AA5500; border: solid 1mm #0055AA">

    <br>

    <table  class="table table-bordered">
        <tr>
            <th ></th>
            <th >Nom et prénoms</th>
            <th >Catégorie</th>
            <th >Function</th>
            <th >Ets ou Service</th>
            <th >Lieu de Détachement</th>
            <th >Année de Sce</th>
            <th >Ages</th>
        </tr>
        <?php
       $db = new PDO('mysql:host=localhost;dbname=dia', 'root', '');

         if($_POST['mychoix']==2)
        {$ages =25;  $anneesce= 10;}
        else if($_POST['mychoix']==3)
        { $ages =25;  $anneesce= 15;}
        else if($_POST['mychoix']==4)
        { $ages =25;  $anneesce= 16;}
        else if($_POST['mychoix']==5)
        { $ages =40;  $anneesce= 20;}
        else if($_POST['mychoix']==6)
        { $ages =40;  $anneesce= 25;}
        else if($_POST['mychoix']==7)
        { $ages =40;  $anneesce= 30;}
        else if($_POST['mychoix']==8)
        { $ages =45;  $anneesce= 20;}
        else if($_POST['mychoix']==9)
        { $ages =45;  $anneesce= 25;}
        else if($_POST['mychoix']==10)
        { $ages =45;  $anneesce= 29;}
        else if($_POST['mychoix']==11)
        { $ages =45;  $anneesce= 32;}
        else if($_POST['mychoix']==12)
        { $ages =45;  $anneesce= 37;}

             $var = $db->query('SELECT
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`,
  `categorie_civil`.`categorie_civil`, `personnelcivil`.`fonction`,
  `etsouservice`.`etsouservice`, `dettache`.`dettache`, Year(Date(Now())) -
  Year(`etatdeservicecivil`.`datederecrutement`) AS `anneedeservice`,
  Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) AS `ages`
FROM
  `decoration_civil` INNER JOIN
  `personnelcivil` ON `personnelcivil`.`id_civil` =
    `decoration_civil`.`id_civil` INNER JOIN
  `etatdeservicecivil` ON `etatdeservicecivil`.`id_civil` =
    `personnelcivil`.`id_civil` INNER JOIN
  `dettache` ON `dettache`.`id_dettache` = `etatdeservicecivil`.`id_dettache`
  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `personnelcivil`.`id_etsouservice` INNER JOIN
  `categorie_civil` ON `categorie_civil`.`id_categorie_civil` =
    `personnelcivil`.`id_categorie_civil`
WHERE
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) >= "'.$anneesce.'" AND
  Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) >= "'.$ages.'"
GROUP BY
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`,
  `categorie_civil`.`categorie_civil`, `personnelcivil`.`fonction`,
  `etsouservice`.`etsouservice`, `dettache`.`dettache`,
  `etatdeservicecivil`.`datederecrutement`, `decoration_civil`.`decretouarrete`,
  `personnelcivil`.`rupture`
HAVING
  `decoration_civil`.`decretouarrete` = "" AND `personnelcivil`.`rupture` IS
  NULL;');

        foreach($var as $personne)  {
            ?>
        <tr>
            <td><a href="#" title="Consulter : <?php echo $personne['nomprenom'];?>" class="voirlapersonne" data-id="<?php echo $personne['id_civil'];?>"><i class="fa fa-download fa-1x"></i></a> </td>
            <td><?php echo $personne['nomprenom'];?></td>
            <td><?php echo $personne['categorie_civil'];?></td>
            <td><?php echo $personne['fonction'];?></td>
            <td><?php echo $personne['etsouservice'];?></td>
            <td><?php  echo $personne['dettache']; ?></td>
            <td><?php echo $personne['anneedeservice'];?></td>
            <td><?php echo $personne['ages'] ;?></td>
        </tr>
        <?php }?>

    </table>
    <p> <?php echo $var->rowcount() ?> enregistrements...</p>
</page>