<?php
require_once('function.php') ;
connexiondb();

$texte = htmlspecialchars($_SERVER['REQUEST_URI']);
 

if(preg_match("#etsouservice#i", "'.$texte.'")==true)
{
	?>
<div class="col-md-6">
    <label for="id_civil">Nom et prénoms :</label>
<select class="form-control" name="id_civil" id="id_civil" >
            <?php
            $q = intval($_GET['id_etsouservice']);
            $personnel = $db->query('SELECT
  `personnelcivil`.`nomprenom`, `personnelcivil`.`id_civil`
FROM
  `personnelcivil`
WHERE
  `personnelcivil`.`id_etsouservice` = "'.$q.'" AND
  `personnelcivil`.`rupture` IS NULL');
            foreach ($personnel as $listepersonnel) { ?>
                <option value="<?php echo $listepersonnel['id_civil'] ?>"><?php echo $listepersonnel['nomprenom']?></option>
            <?php } ?>
</select>
</div>
<?php
}
else
{
	?>

	<label for="id_civil">Nom et prénoms :</label>
<select class="form-control" id="id_civil" >
            <?php
            $q = intval($_GET['id_dettache']);
            $personnel = $db->query("SELECT
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`
FROM
  `personnelcivil` INNER JOIN
  `etatdeservicecivil` ON `personnelcivil`.`id_civil` =
    `etatdeservicecivil`.`id_civil` INNER JOIN
  `dettache` ON `dettache`.`id_dettache` = `etatdeservicecivil`.`id_dettache`
WHERE
  `dettache`.`id_dettache` = '".$_GET['id_dettache']."' AND
  `personnelcivil`.`rupture` IS NULL");
            foreach ($personnel as $listepersonnel) { ?>
                <option value="<?php echo $listepersonnel['id_civil'] ?>"><?php echo $listepersonnel['nomprenom']?></option>
            <?php } ?>
</select>
<?php
}







?>

