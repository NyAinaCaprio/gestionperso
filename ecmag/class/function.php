<?php
$db;

function connexiondb()
{
    global $db;
    $db = new PDO('mysql:host=localhost;dbname=gestiondestock', 'root', '');
    
}


function getArticle()
{
    global $db;
     $var = $db->query("SELECT * FROM articles ORDER BY saisile DESC");
    return $var;
}

function getAllFournisseur()
{
    global $db;
    $query =$db->query("SELECT  * from fournisseurs");
    return $query;
}

function getAllCategorieByID($id)
{
    global $db;
    $var = $db->query("select * from categorie where id_categorie = '".$id."'")->fetch();
    return $var;
}


function getAllCategorie( )
{
    global $db;
    $var = $db->query("select * from categorie ") ;
    return $var;
}

function getAllType()
{
    global $db;
    $var = $db->query("select * from type");
    return $var;

}
function getAllUniteByUnite($unite)
{
    global $db;
    $var = $db->query("select * from unite where id_unite = '".$unite."'")->fetch();
    return $var;
}

function getAllUnite()
{
    global $db;
    $var = $db->query("select * from unite ");
    return $var;
}
function getAllEtsouService()
{
    global $db;
    $var = $db->query("select * from etsouservice");
    return $var;

}

function getAllDetailMouv()
{
    global $db;
    $var = $db->query("select * from detail_mouvement");
    return $var;

}

function getAllTitreInventaire()
{
    global $db;
    $var = $db->query("SELECT * FROM titreinventaire");
    return $var;

}


function getAllEtatdeStock()
{
    global $db;
    $var = $db->query("select * from etatdestock");
    return $var;

}


function consultationEntree($choix, $date){
    global $db;
    $req = $db->query("SELECT * FROM mouvement where type = '".$choix."' AND date LIKE '%".$date."%'");
    return $req;

}

function consultationDetailMouv($id){
    global $db;
    $req = $db->query("SELECT * FROM detail_mouvement where id_mouvement = '".$id."'");
    return $req;

}

 function article($reference)
{
    global $db;
     $var = $db->query("SELECT * FROM articles WHERE reference = '".$reference."'");
     
    return $var;
        
}

function SelectBox()
{
    global $db;
    $output='';
    $req = $db->prepare('SELECT  * FROM articles');
    $req->execute();
    $res = $req->fetchAll();

    foreach ($res as $data) {
       $output .='<option value='.$data['reference'].'>'.$data['libelleproduit'].'</option>';
    }
    return $output;
}

function getIdMaxMouv()
{
    global $db;
    $marequete = $db->query("SELECT Max(`mouvement`.`id_mouvement`)
    FROM  `mouvement`")->fetch();
    return $marequete['Max(`mouvement`.`id_mouvement`)'];
}

function getIdMax()
{

    global $db;
    $marequete = $db->query("SELECT Max(`titreinventaire`.`id_titre_inventaire`)
FROM  `titreinventaire`")->fetch();
return $marequete['Max(`titreinventaire`.`id_titre_inventaire`)'];

}


function getDateMax()
{
    global $db;
    $idmax = getIdMax();

    $marequetedate = $db->query("SELECT * from titreinventaire where id_titre_inventaire = '".$idmax."'")->fetch();

    return $marequetedate['date'];

}

