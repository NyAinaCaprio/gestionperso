<?php

    $db;

        function connexiondb()
        {
            global $db;
            $db = new PDO('mysql:host=localhost;dbname=dia', 'root', '');
        }


function getCategorie()
{
    global $db;
$req = $db->query('select * from categoriecivil');
return $req;
}

function getEtsouService()
{
    global $db;
    $req = $db->query('select * from etsouservice');
    return $req;

}

function getDetache()
{
    global $db;
    $req = $db->query('select * from dettache');
    return $req;

}

function getPersonnelListe($nomprenom)
{
    global $db;
    $req = $db->query('SELECT
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`,
  `etsouservice`.`etsouservice`, `categorie_civil`.`categorie_civil`,
  `etatdeservicecivil`.`fonction`
FROM
  `personnelcivil` INNER JOIN
  `etatdeservicecivil` ON `etatdeservicecivil`.`id_civil` =
    `personnelcivil`.`id_civil` INNER JOIN
  `categorie_civil` ON `categorie_civil`.`id_categorie_civil` =
    `personnelcivil`.`id_categorie_civil` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `personnelcivil`.`id_etsouservice`
WHERE
  `personnelcivil`.`nomprenom` LIKE "%'.$nomprenom.'%"');
    return $req;
}


function anneeReliquatEnCours($id_civil)
{
    global $db;
    $f = $db -> query("SELECT
  `personnelcivil`.`anneereliquat`
FROM
  `personnelcivil`
WHERE
  `personnelcivil`.`id_civil` = '".$id_civil."'")->fetch();
    return $f['anneereliquat'];
}

function diffAnnee($id_civil,$datededepart)
{
    global $db;

   $diffannee =  ($datededepart - anneeReliquatEnCours($id_civil)) * 30 ;
   plusReliquat($id_civil , $datededepart,$diffannee);
}

function countConge($id_civil, $datededepart)
{    global $db;
     $req = $db->query('SELECT
    Count(`conge`.`id`)
  FROM
    `conge`
  WHERE
    `conge`.`id_civil` = "'.$id_civil.'" AND
    YEAR (`conge`.`datededepart`) = "'.$datededepart.'"')->fetch();

     return $req['Count(`conge`.`id`)'];
}

function getDateConge($date, $id_civil)
{
    global $db;
    $var = $db->query("SELECT
  Count(`conge`.`id`)
FROM
  `conge`
WHERE
  `conge`.`id_civil` = '".$id_civil."' AND
  `conge`.`datededepart` = '".$date."'")->fetch();
return $var['Count(`conge`.`id`)'];
}
function testanneereliquat($id_civil, $datededepart, $nbrjour, $typeconge)
{
    global $db;

        if (countConge($id_civil, $datededepart)==0) //si l'annee en saisie n'existe pas > " sauvé l'ancien reliquat / plus droit normale / moins nbr jour demandé"
        {
            saveReliquatByYear($id_civil);
            diffAnnee($id_civil,$datededepart);
            moinsReliquat($id_civil,$nbrjour);

            return true;
        }


     elseif (countConge($id_civil, $datededepart)>=1)
      {
          moinsReliquat($id_civil,$nbrjour);

          return true;
      }

}

function getRelik($id_civil)
{
    global $db;
    $var = $db->query("SELECT
  `personnelcivil`.`anneereliquat`, `personnelcivil`.`id_civil`
FROM
  `personnelcivil`
WHERE
  `personnelcivil`.`id_civil` = '".$id_civil."'")->fetch();
    return $var["anneereliquat"];
}

function moinsReliquat($id_civil,$nbrjour)
{
    global $db;

    $val = reliquatEncours($id_civil) - $nbrjour;

    //mise à jour reliquat pour tous les personnels
    $reliquat = "UPDATE personnelcivil set reliquat = '".$val."' where id_civil = '".$id_civil."'";
    $db->exec($reliquat);


}

function plusReliquat($id_civil, $datededepart,$diffannee)
{
    global $db;
        $val = reliquatEncours($id_civil) + $diffannee;

        //mise à jour reliquat pour tous les personnels
        $majReliquat = "UPDATE personnelcivil set reliquat = '".$val."' where id_civil = '".$id_civil."'";
        $db->exec($majReliquat);

        // mise à jour anneereliquat en année en cours  pour les civils en activité
        $majAnneeRliq = "UPDATE personnelcivil set anneereliquat = '".$datededepart."' where id_civil = '".$id_civil."'";

        $db->exec($majAnneeRliq);

}


function reliquatEncours($id_civil)
{
    global $db;

    $r = $db->query("SELECT
  `personnelcivil`.`reliquat`, `personnelcivil`.`id_civil`
FROM
  `personnelcivil`
WHERE
  `personnelcivil`.`id_civil` = '".$id_civil."'")->fetch();

    return $r['reliquat'];


}


function saveReliquatByYear($id_civil)
{
    global $db;
    $r = $db->query("SELECT
  `personnelcivil`.`id_civil`, `personnelcivil`.`reliquat`,
  `personnelcivil`.`anneereliquat`
FROM
  `personnelcivil`
WHERE
  `personnelcivil`.`id_civil` = '".$id_civil."'")->fetch();

    $q = "INSERT INTO reliquat set 
  id_civil = '".$r['id_civil']."',
  reliquat = '".$r['reliquat']."',
  anneereliquat = '".$r['anneereliquat']."'";
    $db->exec($q);

}

/*
function saveDroitNormal($id_civil,$nbrjour,$datededepart)
{
    global  $db;

    $r= $db->query("select * from reliquat where id_civil = '".$id_civil."' and anneereliquat ='".$datededepart."'")->fetch();

    $val = $r['droitnormal'] + $nbrjour;

    $g = "UPDATE reliquat set droitnormal = '".$val."' where id_civil = '".$id_civil."' and anneereliquat = '".$datededepart."'";
    $db->exec($g);

}
*/

function getListConge()
{
    global $db;
    $f= $db->query("SELECT
  `personnelcivil`.`id_civil`, `conge`.`typeconge`,
  Year(`conge`.`datededepart`) AS annee, Sum(`conge`.`nbrjour`) as total,
  `personnelcivil`.`reliquat`
FROM
  `personnelcivil` INNER JOIN
  `conge` ON `conge`.`id_civil` = `personnelcivil`.`id_civil`
WHERE
  `personnelcivil`.`rupture` IS NULL
GROUP BY
  `personnelcivil`.`id_civil`, `conge`.`typeconge`, Year(`conge`.`datededepart`)");
return $f;
}


function getReliquatGroupByYear($id_civil){
    global $db;
   $l = $db->query("SELECT
  `conge`.`id_civil`, Year(`conge`.`datededepart`) as annee, Sum(`conge`.`nbrjour`) as total
FROM
  `conge`
GROUP BY
  `conge`.`id_civil`, Year(`conge`.`datededepart`)
HAVING
  `conge`.`id_civil` = '".$_GET['id_civil']."'");
    return $l;
}
function getPersonnel($id_civil)
{
    global $db;
    $k = $db->query("select nomprenom from personnelcivil WHERE id_civil = '".$id_civil."'")->fetch();
    return $k;
}

function getMinAnneeReliquat($id_civil)
{
    global $db;
    $h=$db->query("SELECT
  Min(`reliquat`.`anneereliquat`), `reliquat`.`id_civil`, `reliquat`.`reliquat`
FROM
  `reliquat`
GROUP BY
  `reliquat`.`id_civil`, `reliquat`.`reliquat`
HAVING
  `reliquat`.`id_civil` = '".$id_civil."'")->fetch();
    return $h['Min(`reliquat`.`anneereliquat`)']." soit ".$h['reliquat'];
}

function sumExceptByID($id_civil,$annee){
    global $db;
    $var = $db->query("SELECT
  Sum(`conge`.`nbrjour`)
FROM
  `conge`
WHERE
  `conge`.`id_civil` = '".$id_civil."' AND
  Year(`conge`.`datededepart`) = '".$annee."'
GROUP BY
  `conge`.`typeconge`
HAVING
  `conge`.`typeconge` = 2;")->fetch();
    return $var['Sum(`conge`.`nbrjour`)'];
}


function getAllAutoAbsence($id_civil)
{
    global $db;
    $var = $db->query("select * from autoabsence where id_civil = '".$id_civil."'");
    return $var;
}