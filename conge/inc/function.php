<?php 
    $db;

/*function connexiondb()
	{
    global $db;
	    $db = new PDO('mysql:host=localhost;dbname=dia', 'root', '');
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}
*/

  function addCongeExceptionnel($data)
  {
    global $db;
      $l = "INSERT INTO conge set 
        id_civil = '" . $data['id_civil'] . "',
        typeconge = '" . $data['type'] . "',
        motif = '" . $data['motif'] . "',
        datededepart = '" . $data['datededepart'] . "',
        nbrjour = '" . $data['nbrjour'] . "',
        chefservice = '" . $data['chefservice']. "',
        chefdiv = '" . $data['chefdiv'] . "',
        chefspcm = '" . $data['chefspcm']. "',
        adresse = '" . $data['adresse'] . "'";
              $db->exec($l);
  }
  function addCongeNormal($data)
  {
    global $db;
    $l = "INSERT INTO conge set 
      id_civil = '" . $data['id_civil']. "',
      typeconge = '" . $data['type'] . "',
      motif = '" . $data['motif'] . "',
      datededepart = '" . $data['datededepart'] . "',
      nbrjour = '" . $data['nbrjour'] . "',
      chefservice = '".$data['chefservice']."' ,
      chefdiv = '".$data['chefdiv']."',
      chefspcm = '".$data['chefspcm']."',
      adresse = '" . $data['adresse']. "'";
        $db->exec($l);
  }

  function congeIsValid($data)
  {
    $message = array();

    if ($data['type'] =="") {
      $message["type"]= "Veuillez saisir un type";
    }if ($data['id_civil'] =="") {
      $message["id_civil"]= "Veuillez saisir la personne";
    }if ($data['datededepart'] =="") {
      $message["datededepart"]= "Veuillez saisir la date de depart";
    }if ($data['nbrjour'] =="") {
      $message["nbrjour"]= "Veuillez saisir le nombre de jour";
    }

    return $message;

  }

 function autoAbsenceIsValid($data)
    
  {
        $message = array();

    if ($data['id_civil'] =="") {
      $message["id_civil"]= "Veuillez séléctionner une personne";
    }if ($data['date'] =="") {
      $message["date"]= "Veuillez saisir la date";
    }if ($data['heuredepart'] =="") {
      $message["heuredepart"]= "Veuillez saisir l'heure de depart";
    }if ($data['heureretour'] =="") {
      $message["heureretour"]= "Veuillez saisir l'heure' de depart";
    }if ($data['lieu'] =="") {
      $message["lieu"]= "Veuillez saisir un lieu";
    }if ($data['motif'] =="") {
      $message["motif"]= "Veuillez saisir le motif";
    }

    return $message;
  }
/**
*
*/

   function isValid2($data)
  {
    $message = array();

    if ($data['nbrReliquat'] =="") {
      $message["nbrReliquat"]= "Veuillez saisir le nbr Reliquat";
    }if ($data['id_civil'] =="") {
      $message["id_civil"]= "Veuillez choisir la personne";
    }if ($data['anneereliquat'] =="") {
      $message["anneereliquat"]= "Veuillez saisir l'annee";
    }

    return $message;

  }

/**
* renvoye true si le reliquat de l'annee en cours a été deja saisi
**/
  function getAnneeRelikId($anneereliquat ,$id_civil)
  {
    global $db; 
    $var = $db->query('SELECT * FROM personnelcivil where id_civil = '.$id_civil.' AND anneereliquat = '.$anneereliquat.'')->rowcount();
    return (bool) $var;
  }



function getPersById($id)
{	
	global $db;
    $var = $db->query('SELECT  nomprenom, id_civil 
        FROM
        personnelcivil
        WHERE 
        id_etsouservice = '.$id.'');
    return $var;
}



function getDetache()
{
    global $db;
    $req = $db->query('select * from dettache');
    return $req;

}
function getPersByDetache($id)
{
	global $db;
	$var = $db->query('SELECT id_civil, nomprenom
              FROM
              personnelcivil
              WHERE
              id_detache  = '.$id.'');
	return $var;
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

/*
* return reliquat en cours 
*/
function reliquatEncours($id_civil)
{
    global $db;

    $r = $db->query("SELECT
  reliquat, id_civil
FROM
  personnelcivil
WHERE
  id_civil = '".$id_civil."'")->fetch();

    return $r->reliquat;


}


/*
* return annee reliquat en cours
*/

function anneeReliquatEnCours($id_civil)
{
    global $db;
    $f = $db -> query("SELECT anneereliquat FROM personnelcivil WHERE id_civil = '".$id_civil."'")->fetch();
    return $f->anneereliquat;
}

function diffAnnee($id_civil, $datededepart)
{
    global $db;

   $diffannee =  ($datededepart - anneeReliquatEnCours($id_civil)) * 30 ;
   plusReliquat($id_civil , $datededepart,$diffannee);
}

function countConge($id_civil, $datededepart)
{    global $db;
     $req = $db->query('SELECT
     id
  FROM
    conge
  WHERE
    id_civil = "'.$id_civil.'" AND
    YEAR (`conge`.`datededepart`) = "'.$datededepart.'"')->rowcount();

     return (bool) $req;
}

function getDateConge($date, $id_civil)
{
    global $db;
    $var = $db->query('SELECT
  id
FROM
  conge
WHERE
  id_civil = '.$id_civil.' AND datededepart = '.$date.'')->fetch();
return (bool) $var ;
}


function testanneereliquat($id_civil, $datededepart, $nbrjour, $typeconge)
{
    global $db;

        if (countConge($id_civil, $datededepart)==0) //si l'annee introduit n'existe pas > " sauvé l'ancien reliquat / plus droit normale / moins nbr jour demandé"
        {
            saveReliquatByYear($id_civil);
            diffAnnee($id_civil, $datededepart);
            moinsReliquat($id_civil,$nbrjour);

            return true;
        }


     elseif (countConge($id_civil, $datededepart)>=1)
      {
          moinsReliquat($id_civil,$nbrjour);

          return true;
      }

}

/*return l'anneeReliquat de la table pers*/
function getRelik($id_civil)
{
    global $db;
    $var = $db->query("SELECT
anneereliquat
FROM
  personnelcivil
WHERE
  id_civil = '".$id_civil."'")->fetch();
    return $var->anneereliquat ;
}
function getAllRelik()
{
    global $db;
    $var = $db->query('SELECT
 id_civil, nomprenom, reliquat
FROM
  personnelcivil
WHERE
rupture = 1 ');
    return $var;
}

function moinsReliquat($id_civil,$nbrjour)
{
    global $db;

    $val = reliquatEncours($id_civil) - $nbrjour;

    //mise à jour reliquat pour tous les personnels
    $reliquat = "UPDATE personnelcivil set reliquat = '".$val."' where id_civil = '".$id_civil."'";
    $db->exec($reliquat);


}

function plusReliquat($id_civil, $datededepart, $diffannee)
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

function addreliquatPers($id_civil, $datededepart, $var)
{
    global $db;

      $req = "UPDATE personnelcivil 
      set reliquat = '" .$var. "', anneereliquat = '" . $datededepart. "' 
      WHERE id_civil = '" . $id_civil. "'";
      $db->exec($req);

}
  function saveReliquatByYear($id_civil, $nbrReliquat = null)
  {

      /*on recupere le reliquat precedent du pers plus le 30 jours droit par an
       et on l'ajout dans la table reliquat à nouveau*/

      $var = reliquatEncours($id_civil);

      global $db;
      $r = $db->query("SELECT
       id_civil, reliquat, anneereliquat
    FROM
      personnelcivil
    WHERE
      id_civil = '".$id_civil."'")->fetch();

      $var = $r->reliquat + $nbrReliquat;


        $q = "INSERT INTO reliquat set 
        id_civil = '".$r->id_civil."',
        reliquat = '".$var."',
        anneereliquat = '".$r->anneereliquat."'";
        
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
    $var = $db->query("SELECT
  Min(`reliquat`.`anneereliquat`), `reliquat`.`id_civil`, `reliquat`.`reliquat`
FROM
  `reliquat`
GROUP BY
  `reliquat`.`id_civil`, `reliquat`.`reliquat`
HAVING
  `reliquat`.`id_civil` = '".$id_civil."'")->fetch();
    return $var['Min(`reliquat`.`anneereliquat`)']." soit ".$h['reliquat'];
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


function lastAutoAbsence()
{
    global $db;
    $var = $db->query("SELECT * from autoabsence ORDER BY id DESC LIMIT 0, 10");
    return $var;
}