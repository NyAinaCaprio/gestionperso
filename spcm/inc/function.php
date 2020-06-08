<?php
$db;

function connexiondb()
{
    global $db;
    $db = new PDO('mysql:host=localhost;dbname=dia', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
 }

function debug($value)
{
  echo   "<pre>".print_r($value, true)."</pre>" ;
}
function str_random($lenght)
{
  $alphabet ='azertyuipqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLWXCVBN0123456789';
  return substr(str_shuffle(str_repeat($alphabet, 60)), 0,$lenght) ;

}

function logged_only()
{ 
  if (!isset($_SESSION['auth'])) {
  $_SESSION['flash']['danger']="Vous n'avez pas le droit à cette page ";
  header('location : login.php');
  exit();
  }
}

function reconnected_coockie()
{
  if (isset($_COOKIE['remember'])) {
  //var_dump($_COOKIE['remember']);
  $remember_token = $_COOKIE['remember'];
  $parts = explode('//', $remember_token);
  $user_id = $parts[0];
  
  require 'db.php';
  global $db;
  $req = $db->prepare("SELECT * from users WHERE id = ? ");
  $req->execute(array($user_id));
  $user = $req->fetch();
  if ($user) {
    $expected = $user_id ."//". $user->remember_token . sha1($user_id. 'blablabla');
    if ($expected == $remember_token ) {
      $_SESSION['auth'] = $user;
      setcookie('remember', 60 * 60 * 24 * 7); 
    }
    }else{
    setcookie('remember', NULL, -1 );

    }


  }else{
  setcookie('remember', NULL, -1 );

  }
}
 
function select_deco()
{
  global $db;
  $output = array();
  $data = getAllTypeDecoration();
  
 foreach ($data as $value) {
  $output[]=$value;
  }
  
  foreach ($output  as $value) {
  
    $output .= '<option value='.(string)$value->numdecorationcivil.'>'.$value->decoration.'</option>';
}

  return $output;
}

function SelectBox_affect_Succ()
{
    global $db;
    
    $output=array();
    $req = getAllEtsouservice();

    foreach ($req as $data) {
       $output[] = $data->etsouservice;
    }


    $req = getAllDetache();

      foreach ($req as $data) {
        $output[] = $data->dettache;
      } 
    
    foreach ($output as $outputs) {
    $output .= '<option value='.$outputs.'>'.$outputs.'</option>';;
    }
    return $output;
}


function sommepersonnel()
{
  global $db;
  $donnee = $db->query("SELECT id_civil  FROM personnelcivil WHERE id_categorie_civil > 1 and rupture = 1 ")->rowCount() ;
  return $donnee;
}
function sommeParCategorie($var)
{
  global $db;
  $donnee = $db->query('SELECT id_civil  FROM personnelcivil WHERE id_categorie_civil = '.$var.' and rupture = 1')->rowCount() ;
  return $donnee; 
}
 
function resSommeCategorie()
{
    global $db;
    $donnee = $db->query("SELECT *  FROM categorie_civil WHERE id_categorie_civil > 1") ;
    $res = array();
    $total = sommepersonnel();
    while ($var = $donnee->fetch()) {

        $nb = sommeParCategorie($var->id_categorie_civil);
        $pourcent = ceil(($nb / $total)*100);

        $res [] = array(
            'categorie_civil'=>$var->categorie_civil,
            'pourcent'=>$pourcent,
            'nb'=>$nb,
            'total' => $total);

    }
    return $res;
}

function getAllCategorie()
{
    global $db;
    $f=$db->query("SELECT
  `categorie_civil`.`id_categorie_civil`, `categorie_civil`.`categorie_civil`
FROM
  `categorie_civil` ");
    return $f;
}

function  getAllEtsouservice()
{
    global $db;
    $var = $db->query("SELECT * from etsouservice WHERE  id_etsouservice > 1 ");
    return $var;
}

function getAllDetache(){
    global $db;
    $var = $db->query("SELECT * from dettache");
    return $var;
}
function sumByEtsouService($id_categorie_civil)
{
    global $db;
    $k = getAllCategorie();
    foreach ($k as $data)
    {
        $var = $db->query("SELECT
  `etsouservice`.`etsouservice`, Count(`personnelcivil`.`id_civil`) as sommepersonnel,
  `etsouservice`.`id_etsouservice`, `categorie_civil`.`categorie_civil`
FROM
  `etsouservice` INNER JOIN
  `personnelcivil` ON `personnelcivil`.`id_etsouservice` =
    `etsouservice`.`id_etsouservice` INNER JOIN
  `categorie_civil` ON `categorie_civil`.`id_categorie_civil` =
    `personnelcivil`.`id_categorie_civil`
GROUP BY
  `etsouservice`.`etsouservice`, `etsouservice`.`id_etsouservice`,
  `categorie_civil`.`categorie_civil`, `categorie_civil`.`id_categorie_civil`,
  `personnelcivil`.`rupture`
HAVING
  `etsouservice`.`id_etsouservice` > 1 AND
  `categorie_civil`.`id_categorie_civil` = '".$id_categorie_civil."' AND `personnelcivil`.`rupture` = 1 ");


        return $var;
    }

}



function sumByDetache($id_categorie_civil)
{   global $db;
    $det = getAllCategorie();

    $var = $db->query("SELECT
  Count(`personnelcivil`.`id_civil`) AS `Count_id_civil`,
  `dettache`.`id_dettache`,
  `dettache`.`dettache`,
  `categorie_civil`.`id_categorie_civil`,
  `categorie_civil`.`categorie_civil`
FROM
  `personnelcivil`
  INNER JOIN `dettache` ON `personnelcivil`.`id_detache` =
    `dettache`.`id_dettache`
  INNER JOIN `categorie_civil` ON `personnelcivil`.`id_categorie_civil` =
    `categorie_civil`.`id_categorie_civil`
WHERE
  `dettache`.`id_dettache` > 1 AND
  `categorie_civil`.`id_categorie_civil` = '".$id_categorie_civil."'
GROUP BY
  `dettache`.`id_dettache`,
  `dettache`.`dettache`,
  `categorie_civil`.`id_categorie_civil`,
  `categorie_civil`.`categorie_civil`");

    return $var;
}


function sumPersoInterne($id_categorie)
{
    global $db;
    $var  = $db->query("SELECT
  Count(`personnelcivil`.`id_civil`) as sommepersonnel
FROM
  `etsouservice` INNER JOIN
  `personnelcivil` ON `personnelcivil`.`id_etsouservice` =
    `etsouservice`.`id_etsouservice` INNER JOIN
  `categorie_civil` ON `categorie_civil`.`id_categorie_civil` =
    `personnelcivil`.`id_categorie_civil`
WHERE
  `etsouservice`.`id_etsouservice` > 1
GROUP BY
  `categorie_civil`.`id_categorie_civil`, `personnelcivil`.`rupture`
HAVING
  `categorie_civil`.`id_categorie_civil` = '".$id_categorie."' AND `personnelcivil`.`rupture` = 1 ")->fetch();
    return $var->sommepersonnel;

}

function sumPersoExterne($id_categorie)
{
    global $db;
    $var = $db->query("SELECT
  Count(`personnelcivil`.`id_civil`) as sommepersonnel
FROM
  `personnelcivil` INNER JOIN
  `etatdeservicecivil` ON `etatdeservicecivil`.`id_civil` =
    `personnelcivil`.`id_civil` INNER JOIN
  `dettache` ON `dettache`.`id_dettache` = `personnelcivil`.`id_detache`
WHERE
  `dettache`.`id_dettache` > 1
GROUP BY
  `personnelcivil`.`rupture`, `personnelcivil`.`id_categorie_civil`
HAVING
  `personnelcivil`.`rupture` = 1  AND `personnelcivil`.`id_categorie_civil` =
  '".$id_categorie."'")->fetch();

    return $var->sommepersonnel;
}

function effectifParEtsouService()
{
    global $db;
   $var = $db->query("SELECT
  Count(`personnelcivil`.`id_civil`) AS `Count_id_civil`,
  `etsouservice`.`etsouservice`,
  `etsouservice`.`id_etsouservice`
FROM
  `personnelcivil`
  INNER JOIN `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `personnelcivil`.`id_etsouservice`
WHERE
  `etsouservice`.`id_etsouservice` > 1
GROUP BY
  `etsouservice`.`etsouservice`,
  `etsouservice`.`id_etsouservice`");

    return $var;
}

function effectifParDettache()
{
    global $db;
    $var = $db->query("SELECT
  Count(`personnelcivil`.`id_civil`) AS `Count_id_civil`,
  `dettache`.`dettache`,
  `dettache`.`id_dettache`
FROM
  `personnelcivil`
  INNER JOIN `dettache` ON `personnelcivil`.`id_detache` =
    `dettache`.`id_dettache`
WHERE
  `personnelcivil`.`rupture` = 1  AND
  `dettache`.`id_dettache` > 1
GROUP BY
  `dettache`.`dettache`,
  `dettache`.`id_dettache`");
    return $var;
}


function getAllTypeDecoration()
{
    global $db;
    $var = $db->query("SELECT * FROM decorationcivil ORDER BY ordre ASC");
    return $var;
}

function getIntituleDeco($numdeco)
{
    global $db;
    $var = $db->query("SELECT * FROM decorationcivil WHERE numdecorationcivil ='".$numdeco."' ");
    return $var;
}

 
function listeRetraite($annee)
{
    global $db;
 
     
    $var = $db->query("SELECT
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`,`personnelcivil`.`fonction`,
  `categorie_civil`.`categorie_civil`, `etsouservice`.`etsouservice`,
   `dettache`.`dettache`,
  `personnelcivil`.`retraite`, `personnelcivil`.`rupture`
FROM
  `personnelcivil` INNER JOIN
  `etatdeservicecivil` ON `etatdeservicecivil`.`id_civil` =
    `personnelcivil`.`id_civil` INNER JOIN
  `dettache` ON `dettache`.`id_dettache` = `personnelcivil`.`id_detache`
  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `personnelcivil`.`id_etsouservice` INNER JOIN
  `categorie_civil` ON `categorie_civil`.`id_categorie_civil` =
    `personnelcivil`.`id_categorie_civil`
WHERE
  Year(`personnelcivil`.`retraite`) = '".$annee."' AND
  `personnelcivil`.`rupture` = 1 ");
    return $var;
}

 
function groupByRetraite()
{

    global $db;

    $annee = date("Y") + 5;

      $var = $db->query("SELECT  
         retraite , Count( id_civil) as `somme`
  FROM
    personnelcivil 
   
  GROUP BY
    Year(retraite), rupture
  HAVING
    Year(retraite) <= '".$annee."' AND
     rupture  = 1 ");
      return $var;
}


function getRechcivil($nomprenom)
{
    global $db;

    $res = $db->query('SELECT
  `personnelcivil`.*,
  `etsouservice`.*,
  `categorie_civil`.*,
  `dettache`.*,
  `etatdeservicecivil`.*
FROM
  `personnelcivil`
  INNER JOIN `etatdeservicecivil` ON `personnelcivil`.`id_civil` =
    `etatdeservicecivil`.`id_civil`
  INNER JOIN `dettache` ON `personnelcivil`.`id_detache` =
    `dettache`.`id_dettache`
  INNER JOIN `etsouservice` ON `personnelcivil`.`id_etsouservice` =
    `etsouservice`.`id_etsouservice`
  INNER JOIN `categorie_civil` ON `personnelcivil`.`id_categorie_civil` =
    `categorie_civil`.`id_categorie_civil`
WHERE
  `personnelcivil`.`nomprenom` LIKE "%'.$nomprenom.'%"');
return $res;
}

function getListcivil($id_civil)
{
    global $db;
    $res = $db->query('SELECT
  `personnelcivil`.*,
  `etsouservice`.*,
  `categorie_civil`.*,
  `dettache`.*,
  
  Year(`etatdeservicecivil`.`datederecrutement`),
  Year(Date(Now())),
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) AS anneedeservice,
  Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) AS ages,
  `etatdeservicecivil`.`datederecrutement`
FROM
  `personnelcivil`
  INNER JOIN `etatdeservicecivil` ON `personnelcivil`.`id_civil` =
    `etatdeservicecivil`.`id_civil`
  INNER JOIN `dettache` ON `personnelcivil`.`id_detache` =
    `dettache`.`id_dettache`
  INNER JOIN `etsouservice` ON `personnelcivil`.`id_etsouservice` =
    `etsouservice`.`id_etsouservice`
  INNER JOIN `categorie_civil` ON `personnelcivil`.`id_categorie_civil` =
    `categorie_civil`.`id_categorie_civil`
WHERE
  `personnelcivil`.`rupture` = 1  AND
  `personnelcivil`.`id_civil` = "'.$id_civil.'"');

return $res;
}

function getAllPers()
{
  global $db;
  $var=$db->query('SELECT * 
FROM
  personnelcivil 
WHERE
  rupture = 1 ');
  return $var; 
}


function getAllPersLimite()
{
  global $db;

  $var = $db->query('SELECT
*
FROM
  personnelcivil
WHERE
rupture = 1  
GROUP BY id_civil 
DESC 
LIMIT 0, 10');

  return $var;
}

function getNbrEnfant($id_civil)
{
    global $db;
    $var = $db->query("select numenfant from enfant WHERE id_civil = '".$id_civil."'");

    return $var->rowCount();

}



function getEtatdeService($id_civil)
{
    global $db;
    $var = $db->query("SELECT
  `etatdeservicecivil`.*,
  `etatdeservicecivil`.`id_civil`
FROM
  `etatdeservicecivil`
WHERE
  `etatdeservicecivil`.`id_civil` = '".$id_civil."'");
    return $var;
}
function getConjoint($id_civil)
{
    global $db;
    $var = $db->query('SELECT * FROM conjoint_civil where id_civil = '.$id_civil.'');
    return $var;
}

function getAptiPart($id_civil)
{
    global $db;
    $var = $db->query("SELECT * from aptitudeparticulier WHERE id_civil  = '".$id_civil."'");
    return $var;
}

function getAvanSucc($id_civil)
{
    global $db;
    $var = $db->query("select * from avancementsuccessifs WHERE id_civil = '".$id_civil."'");
    return $var;
}

function getAvanSuccByNum($numavancementsucc)
{
    global $db;
    $var = $db->query("SELECT * FROM avancementsuccessifs WHERE numavancementsucc = '".$numavancementsucc."'");
    return $var;
}

function getEnfant($id_civil)
{
    global $db;
    $var = $db->query("select * from enfant where id_civil = '".$id_civil."'");
    return $var;

}
function getEnfantByNum($numenfant)
{
    global $db;
    $var = $db->query("SELECT * FROM enfant where numenfant = '".$numenfant."'");
    return $var;

}
//----------------------------------


function getDecoDetail($id_civil)
{
    global $db;
    $var = $db->query("SELECT
  `decorationcivil`.`decoration`, `decorationcivil`.`libelledecoration`,
  `decorationcivil`.`numdecorationcivil`,
  `decoration_civil`.*
FROM
  `decoration_civil` INNER JOIN
  `decorationcivil` ON `decorationcivil`.`numdecorationcivil` =
    `decoration_civil`.`numdecorationcivil`
WHERE
  `decoration_civil`.`id_civil` = '".$id_civil."'");
    return $var;
}
function getDecoDetailByNum($numdecoration)
{
    global $db;
    $var = $db->query("SELECT
  `decorationcivil`.*, `decoration_civil`.*
FROM
  `decoration_civil` INNER JOIN
  `decorationcivil` ON `decorationcivil`.`numdecorationcivil` =
    `decoration_civil`.`numdecorationcivil`
WHERE
  `decoration_civil`.`numdecoration` = '".$numdecoration."'");
    return $var;
}

//-------------------------------------------------


function getAffecSucc($id_civil)
{
    global $db;
    $var = $db->query("select * from affectationsuccessivecivil where id_civil = '".$id_civil."'");
    return $var;
}

function getAffecSuccByNum($numaffectciv)
{
    global $db;
      $var = $db->query("select * from affectationsuccessivecivil where numaffectciv = '".$numaffectciv."'");
    return $var;
}

function getConge($id_civil)
{
    global $db;
    $var = $db->query("select * from conge_stat where id_civil = '".$id_civil."'");
    return $var;
}


function getInfo($id_civil)
{
    global $db;
    $var = $db->query("SELECT
  `aptitudeinfo`.*
FROM
  `aptitudeinfo`
WHERE
  `aptitudeinfo`.`id_civil` = '".$id_civil."'");
    return $var;

}

function getLinguistique($id_civil)
{
    global $db;
    $var = $db->query("select  * from aptitudelinguistique where id_civil = '".$id_civil."'");
    return $var;
}

function getEcoleFormation($id_civil)
{
    global $db;
    $var = $db->query("select * from ecoleformationstage where id_civil = '".$id_civil."'");
    return $var;
}
function getEcoleByNum($numecole)
{
    global $db;
    $var = $db->query("select * from ecoleformationstage where numecole = '".$numecole."'");
    return $var;
}
function getCategorie($id_categorie)
{
    global $db;
    $var = $db->query("SELECT * FROM categorie_civil WHERE id_categorie_civil = '".$id_categorie."'");
    return $var;
}

function getAllService()
{
    global $db;
    $var = $db->query('SELECT  * FROM  etsouservice WHERE SE = "SERVICE"');
    return $var;
}


function getAllEts()
{
    global $db;
    $var = $db->query('SELECT  * FROM  etsouservice WHERE SE = "ETABLISSEMENT"');
    return $var;
}
function getAllCorps()
{
    global $db;
    $var = $db->query('SELECT `corps`.* FROM `corps` WHERE `corps`.`id_corps` > 1');
    return $var;
}
function getByCorps($corps)
{
    global $db;
    $var = $db->query("SELECT
  `corps`.*,
  `corps`.`corps` AS `corps1`
FROM
  `corps`
WHERE
  `corps`.`corps` = '".$corps."'")->fetchColumn();
    return (bool) $var;
}

function getAllCentre()
{
    global $db;
    $var = $db->query("select * from etsouservice where SE = 'CENTRE'");
    return $var;
}


function getEtsouService($id_etsouservice)
{
    global $db;
    $var = $db->query("SELECT * FROM etsouservice WHERE id_etsouservice = '".$id_etsouservice."' ");
    return $var;
}

function getEtsouServiceByLib($libelle)
{
    global $db;
    $var = $db->query("select * from etsouservice where etsouservice= '".$libelle."'");
    return $var;
}

/*function rechToutContact()
{
    global $db;
    $var = $db->query('SELECT id_civil 
FROM
 personnelcivil 
WHERE
  rupture = 1 ');
return $var;
}
*/
 

function getDoublouCin($cin)
{
  global $db;
  
  $var = $db->query('SELECT
  id_civil
FROM
  personnelcivil
WHERE
  cin = "'.$cin.'"')->fetchColumn();
  return (bool) $var ;
}

function getMaxID()
{
    global $db;

    $var = $db->query("SELECT Max(`personnelcivil`.`id_civil`) as maxId FROM `personnelcivil`;")->fetch();

    return $var->maxId ;
}


function viewProposDeco($ages,$anneesce,$choix)
{
    global $db;
    $var = $db->query('SELECT
  `personnelcivil`.`id_civil`
FROM
  `personnelcivil`
  INNER JOIN `etatdeservicecivil` ON `etatdeservicecivil`.`id_civil` =
    `personnelcivil`.`id_civil`
  INNER JOIN `decoration_civil` ON `personnelcivil`.`id_civil` =
    `decoration_civil`.`id_civil`
WHERE
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) >= '.$anneesce.' AND
  Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) >='.$ages.' AND
  `decoration_civil`.`numdecorationcivil` <> '.$choix.'
GROUP BY
  `personnelcivil`.`nomprenom`,
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`),
  Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`),
  `etatdeservicecivil`.`datederecrutement`,
  `personnelcivil`.`id_civil`,
  `decoration_civil`.`numdecorationcivil`,
  `personnelcivil`.`rupture`
HAVING
  `personnelcivil`.`rupture` = 1 ');
  
  $db->exec('DELETE FROM id_civil');

    foreach ($var as $key => $value) 
    {
      $db->exec('INSERT INTO id_civil set id_civil = '.$value->id_civil.' ');
    }

  $var = $db->query('SELECT id_civil FROM id_civil GROUP BY id_civil');

  return $var;

}

 function consultDeco($numdecorationcivil)
{
  global $db;
  $req = $db->query('SELECT id_civil FROM decoration_civil WHERE numdecorationcivil = '.$numdecorationcivil.' ');
  return $req;

}
 function persByCategorie($categorie)
{
  global $db ;
 $var=$db->query('SELECT id_civil
FROM
  personnelcivil
WHERE
  rupture = 1  AND
 id_categorie_civil = "'.$categorie.'"');
return $var ;
}

function persByCategServ($categorie, $etsouservice)
{
  global $db ;
 $var=$db->query('SELECT
id_civil 
FROM
  personnelcivil
WHERE
  rupture = 1  AND
  id_etsouservice = '.$etsouservice.' AND
  id_categorie_civil = '.$categorie.'') ;
 return $var ;
}

function persAnneeSceCat($anneesce, $categorie)
{
  global $db ;
  $var=$db->query('SELECT
  `personnelcivil`.`id_civil`,  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) AS
  `anneesce`, Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) AS `age`,
  `etatdeservicecivil`.`datederecrutement`
FROM
  `personnelcivil` INNER JOIN
  `etatdeservicecivil` ON `personnelcivil`.`id_civil` =
    `etatdeservicecivil`.`id_civil` WHERE
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) >= '.$anneesce.'  
  AND `personnelcivil`.`rupture` = 1 
  AND `personnelcivil`.`id_categorie_civil` = '.$categorie.'');
 return $var ;
}

function persByCatDet($categorie, $dettache)
{
  global $db;
$var=$db->query('SELECT id_civil
FROM personnelcivil 
WHERE id_categorie_civil = '.$categorie.' 
AND id_detache = '.$dettache.'  
AND rupture = 1 ');  
  return $var;
  
}

function persByTousDet($dettache)
{
  global $db;
  $var=$db->query('SELECT
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`,
   `categorie_civil`.`categorie_civil`,
  `etsouservice`.`etsouservice`, `dettache`.`dettache`,
  Year(`etatdeservicecivil`.`datederecrutement`) AS `Daterecrut`,
  Year(Date(Now())) AS `Datenow`, `personnelcivil`.`datenaisse` AS `Datenaisse`,
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) AS
  `anneesce`, Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) AS `age`,
  `personnelcivil`.`retraite`, `etatdeservicecivil`.`datederecrutement`,
  `personnelcivil`.`rupture`
FROM
  `personnelcivil` INNER JOIN
  `categorie_civil` ON `categorie_civil`.`id_categorie_civil` =
    `personnelcivil`.`id_categorie_civil` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `personnelcivil`.`id_etsouservice` INNER JOIN
  `etatdeservicecivil` ON `personnelcivil`.`id_civil` =
    `etatdeservicecivil`.`id_civil` INNER JOIN
  `dettache` ON `dettache`.`id_dettache` = `personnelcivil`.`id_detache`
   WHERE `personnelcivil`.`id_detache` ="'.$dettache.'"  AND
  `personnelcivil`.`rupture` = 1  ') ;
  return $var;
}

function persByService($etsouservice)
{
  global $db;

  $var=$db->query('SELECT id_civil
FROM
   personnelcivil 
  WHERE id_etsouservice = '.$etsouservice.'  
  AND
  rupture = 1 ') ;  
  return $var;
}

function persByDetache($detache)
{
  global $db;

  $var=$db->query('SELECT id_civil 
FROM
   personnelcivil WHERE id_detache = '.$detache.'  
   AND
  rupture = 1 ') ;  
  return $var;
}

/*function persByCritere($critere)
{
  global $db;
$var=$db->query('SELECT
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`,
   `categorie_civil`.`categorie_civil`,
  `etsouservice`.`etsouservice`, `dettache`.`dettache`,
  Year(`etatdeservicecivil`.`datederecrutement`) AS `Daterecrut`,
  Year(Date(Now())) AS `Datenow`, `personnelcivil`.`datenaisse` AS `Datenaisse`,
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) AS
  `anneesce`, Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) AS `age`,
  `personnelcivil`.`retraite`, `etatdeservicecivil`.`datederecrutement`,
  `personnelcivil`.`rupture`
FROM
   `personnelcivil` INNER JOIN
  `categorie_civil` ON `categorie_civil`.`id_categorie_civil` =
    `personnelcivil`.`id_categorie_civil` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `personnelcivil`.`id_etsouservice` INNER JOIN
  `etatdeservicecivil` ON `personnelcivil`.`id_civil` =
    `etatdeservicecivil`.`id_civil` INNER JOIN
  `dettache` ON `dettache`.`id_dettache` = `personnelcivil`.`id_detache` 
  WHERE  `personnelcivil`.`nomprenom` LIKE "%'.$critere.'%"  AND
  `personnelcivil`.`rupture` = 1 ') ;
  return $var;
}*/
function persRetraite()
{
  global $db;
  $var= $db->query('SELECT id_civil FROM personnelcivil where rupture > 1 ');
  return $var;
}
function persByAnneeService($anneesce)
{
  global $db;
  $var=$db->query('SELECT
  `personnelcivil`.`id_civil`,  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) AS
  `anneesce`, Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) AS `age`,
  `etatdeservicecivil`.`datederecrutement`
FROM
  `personnelcivil` INNER JOIN
  `etatdeservicecivil` ON `personnelcivil`.`id_civil` =
    `etatdeservicecivil`.`id_civil` WHERE
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) >= "'.$anneesce.'"  AND
  `personnelcivil`.`rupture` = 1 ');
return $var;
}

function isValid($data)
{
      $message =array();

     
    if($data['id_categorie_civil'] =="") {
      $message['id_categorie_civil'] = "Categorie non valide"; 
     }
    if($data['id_categorie_civil'] ==2 && $data['matricule'] !='') {
      $message['catMatri'] = "ECD doit être sans Matricule"; 
     }
    if ($data['id_etsouservice'] =="" && $data['id_dettache'] =="") {
      $message['id_etsouservice'] = "Lieu de service ou Detachement non valide"; 
     }
    if ($data['nomprenom']=="") {
      $message['nomprenom'] = "NOM ET PRENOM(S) non valide"; 
    }if ($data['sexe']=="") {
      $message['sexe'] = "sexe non valide"; 
    }if ($data['cin']=="" || getDoublouCin($data['cin'])) {
      $message['cin'] = "CIN non valide"; 
    }if ($data['datenaisse']=="") {
      $message['datenaisse'] = "DATE DE NAISSANCE non valide"; 
    }if ($data['delivrele']=="") {
      $message['delivrele'] = "DATE DE DELIVRANCE CIN non valide"; 
    }if ($data['a']=="") {
      $message['a'] = "Lieu non valide pour la CIN"; 
    }if ($data['lieudenaiss']=="") {
      $message['lieudenaiss'] = "LIEU DE NAISSANCE non valide"; 
    }if ($data['adresseactuelle']=="") {
      $message['adresseactuelle'] = "ADRESSE ACTUELLE non valide"; 
    }if ($data['telephone']=="") {
      $message['telephone'] = "TELEPHONE non valide"; 
    } if ($data['id_categorie_civil']=='3' && $data['matricule']=="" ) {
      $message['matricule'] = "matricule non valide"; 
    }if ($data['id_categorie_civil']== '4' && $data['matricule']== "" ) {
      $message['matricule'] = "matricule non valide"; 
    }if ($data['affectionactuelle']=="") {
      $message['affectionactuelle'] = "AFFECTATION ACTUELLE non valide"; 
    }if ($data['fonction']=="") {
      $message['fonction'] = "FONCTION non valide"; 
    }if ($data['datederecrutement']=="") {
      $message['datederecrutement'] = "DATE  DE RECRUTEMENT non valide"; 
    }if ($data['indice']=="") {
      $message['indice'] = "INDICE non valide"; 
    }
    return $message; 
}

function isValidEdit($data)
{
      $message =array();

     
    if($data['id_categorie_civil'] =="") {
      $message['id_categorie_civil'] = "Categorie non valide"; 
     }
    if($data['id_categorie_civil'] ==2 && $data['matricule'] !='') {
      $message['catMatri'] = "ECD doit être sans Matricule"; 
     }
    if ($data['id_etsouservice'] =="" && $data['id_dettache'] =="") {
      $message['id_etsouservice'] = "Lieu de service ou Detachement non valide"; 
     }
    if ($data['nomprenom']=="") {
      $message['nomprenom'] = "NOM ET PRENOM(S) non valide"; 
    }if ($data['datenaisse']=="") {
      $message['datenaisse'] = "DATE DE NAISSANCE non valide"; 
    }if ($data['sexe']=="") {
      $message['sexe'] = "sexe non valide"; 
    }if ($data['cin']=="") {
      $message['cin'] = "CIN non valide"; 
    }if ($data['delivrele']=="") {
      $message['delivrele'] = "DATE DE DELIVRANCE CIN non valide"; 
    }if ($data['a']=="") {
      $message['a'] = "Lieu non valide pour la CIN"; 
    }if ($data['lieudenaiss']=="") {
      $message['lieudenaiss'] = "LIEU DE NAISSANCE non valide"; 
    }if ($data['adresseactuelle']=="") {
      $message['adresseactuelle'] = "ADRESSE ACTUELLE non valide"; 
    }if ($data['telephone']=="") {
      $message['telephone'] = "TELEPHONE non valide"; 
    } if ( $data['id_categorie_civil']== "4" && empty($data['matricule'])) {
      $message['matricule'] = "masdf sdjgdfhgj dtricule non valide"; 
    }
    if ( $data['id_categorie_civil']=='3' && empty($data['matricule']) ) {
      $message['matricule'] = "masdf sdjgdfhgj dtricule non valide"; 
    }
    if ($data['affectionactuelle']=="") {
      $message['affectionactuelle'] = "AFFECTATION ACTUELLE non valide"; 
    }if ($data['fonction']=="") {
      $message['fonction'] = "FONCTION non valide"; 
    }if ($data['datederecrutement']=="") {
      $message['datederecrutement'] = "DATE  DE RECRUTEMENT non valide"; 
    }if ($data['indice']=="") {
      $message['indice'] = "INDICE non valide"; 
    }
    return $message; 
}

function getAgeAnneeSce($choix)
{
  global $db;
  $var = $db->query("SELECT age, anneedeservice FROM  decorationcivil where numdecorationcivil = '".$choix."'")->fetch();
  return $var; 
}

function getDetachebyId($id_detache)
{
  global $db;
  $var = $db->query('SELECT * FROM dettache where id_dettache = '.$id_detache.'');
  return $var;
 
}

function getRupture()
{
   global $db;
  $var = $db->query('SELECT * FROM rupture');
  return $var;
  
}

function getRuptureById($id)
{
   global $db;
  $var = $db->query('SELECT * FROM rupture where id = '.$id.'');
  return $var;
  
}
function getDirecteur()
{
    global $db;
  $donnee = $db->query("SELECT *  FROM directeur ORDER by ID DESC ");
  return $donnee;
}

function addDirecteur($value, $filename)
{
    global $db;

          $req = $db->prepare('INSERT INTO directeur 
            (nomprenom, grade, fonction, periode, obs, photo) 
            VALUES (:nomprenom, :grade, :fonction, :periode,:obs,:photo)
            ');   
        $req->execute(array(
            ':nomprenom' =>$value['nomprenom'],
            ':grade' =>$value['grade'],
            ':fonction' =>$value['fonction'],    
            ':periode' =>$value['periode'],    
            ':obs' =>$value['obs'],    
            ':photo' =>$filename    
            ));
       return true;      
}