<?php
$db;

function connexion_db()
{
    global $db;
    $db = new PDO('mysql:host=localhost;dbname=gestiondestock', 'root', '');
    return $db;
}


function deleteEtatDeStock()
{
    global $db;
    
    $db->exec("delete from etatdestock");
 

}

function insertRefArticles()
{
    global $db;

    $datacode = $db->query("SELECT reference FROM articles");
    foreach($datacode as $donneecode)
    {

        $requete1 = "INSERT INTO etatdestock SET reference ='".$donneecode['reference']."'";

        $db->exec($requete1);
    }

}


function insertQteInitiale()
{
    global $db;
    $idmax = getIdMax();
    $dataqteini = $db->query("SELECT
  `inventaire`.`reference`, `inventaire`.`stockphysique`
FROM
  `inventaire`
WHERE
  `inventaire`.`id_titreinventaire` = '".$idmax."'");

    foreach($dataqteini as $donneini)
    {
        $requete2='UPDATE etatdestock SET 	
quantite_initiale = "'.$donneini["stockphysique"].'" WHERE reference ="'.$donneini['reference'].'"';
        $db->exec($requete2);
    }


}

function insertQteEntree()
{
    global $db;
    $datemax = getDateMax();

    $dataqteentree= $db->query("SELECT
  `articles`.`reference`, Sum(`detail_mouvement`.`quantite`),
  `articles`.`libelleproduit`
FROM
  `articles` INNER JOIN
  `detail_mouvement` ON `articles`.`reference` = `detail_mouvement`.`reference`
  INNER JOIN
  `mouvement` ON `mouvement`.`id_mouvement` = `detail_mouvement`.`id_mouvement`
WHERE
  `mouvement`.`type` = 1 AND
  `mouvement`.`date` > '".$datemax."'
GROUP BY
  `articles`.`reference`, `articles`.`libelleproduit`");

    foreach($dataqteentree as $donneentree)  {
        $requete2="UPDATE  etatdestock SET 	
quantite_entree = '".$donneentree["Sum(`detail_mouvement`.`quantite`)"]."' WHERE reference = '".$donneentree['reference']."'";
        $db->exec($requete2);

    }
}

function insertQteSortie()
{
    global $db;
    $datemax = getDateMax();
    $dataqtesort = $db->query("SELECT
  `articles`.`reference`, Sum(`detail_mouvement`.`quantite`),
  `articles`.`libelleproduit`
FROM
  `articles` INNER JOIN
  `detail_mouvement` ON `articles`.`reference` = `detail_mouvement`.`reference`
  INNER JOIN
  `mouvement` ON `mouvement`.`id_mouvement` = `detail_mouvement`.`id_mouvement`
WHERE
  `mouvement`.`type` = 2 AND
  `mouvement`.`date` > '".$datemax."'
GROUP BY
  `articles`.`reference`, `articles`.`libelleproduit`");

    foreach($dataqtesort as $donneesort)
    {

        $requete3='UPDATE etatdestock SET 
    quantite_sortie= "'.$donneesort["Sum(`detail_mouvement`.`quantite`)"].'" WHERE reference = "'.$donneesort['reference'].'"';
        $db->exec($requete3);
    }

}

function prepareEtatDeStock()
{
    global $db;
    deleteEtatDeStock();
    insertRefArticles();
    insertQteInitiale();
    insertQteEntree();
    insertQteSortie();

    $etatDeStock = $db->query("SELECT
  `etatdestock`.`reference`, `articles`.`libelleproduit`,
  Sum(`etatdestock`.`quantite_initiale`), 
  Sum(`etatdestock`.`quantite_entree`),
  Sum(`etatdestock`.`quantite_sortie`),
  Sum(`etatdestock`.`quantite_initiale`)+
  Sum(`etatdestock`.`quantite_entree`)-
  Sum(`etatdestock`.`quantite_sortie`) As `StockFinal`
FROM
  `etatdestock` INNER JOIN
  `articles` ON `articles`.`reference` = `etatdestock`.`reference`
GROUP BY
  `articles`.`libelleproduit`");

return $etatDeStock;
}

function getCategorie()
{
    global  $db;
    $requete3 = $db->query("SELECT * FROM categorie");
    return $requete3;
}

function getArticles()
{

    global $db;
    $req = $db->query("SELECT
  `articles`.`libelleproduit`, `unite`.`unite`, `articles`.`reference`
FROM
  `articles` INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite`
GROUP BY
  `articles`.`libelleproduit`, `unite`.`unite`, `articles`.`reference`");
    return $req;
}

function selectAllEtatdeStock()
{
    global $db;
  $resultat = $db->query("SELECT
  `etatdestock`.`reference`, `articles`.`libelleproduit`,
  Sum(`etatdestock`.`quantite_initiale`) AS `quantite_initiale`, 
  Sum(`etatdestock`.`quantite_entree`) AS `quantite_entree`,
  Sum(`etatdestock`.`quantite_sortie`) AS `quantite_sortie`, 
  Sum(`etatdestock`.`quantite_initiale`) +
  Sum(`etatdestock`.`quantite_entree`) - 
  Sum(`etatdestock`.`quantite_sortie`) AS `StockFinal`, 
  `unite`.`unite`, `categorie`.`categorie`
FROM
  `etatdestock` INNER JOIN
  `articles` ON `articles`.`reference` = `etatdestock`.`reference` INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
GROUP BY
  `etatdestock`.`reference`, `articles`.`libelleproduit`, `unite`.`unite`,
  `categorie`.`categorie`, `articles`.`id_categorie`
ORDER BY
  `etatdestock`.`reference` DESC");

    return $resultat;
}

function selectEtatDeStockBy($categorie)
{
  global $db;

$resultat=$db->query("SELECT
  `etatdestock`.`reference`, `articles`.`libelleproduit`,
  Sum(`etatdestock`.`quantite_initiale`) AS `quantite_initiale`, 
  Sum(`etatdestock`.`quantite_entree`) AS `quantite_entree`,
  Sum(`etatdestock`.`quantite_sortie`) AS `quantite_sortie`, 
  Sum(`etatdestock`.`quantite_initiale`) +
  Sum(`etatdestock`.`quantite_entree`) - 
  Sum(`etatdestock`.`quantite_sortie`) AS `StockFinal`, 
  `unite`.`unite`, `categorie`.`categorie`
FROM
  `etatdestock` 
INNER JOIN
  `articles` ON `articles`.`reference` = `etatdestock`.`reference` 
INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite` 
INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
GROUP BY
  `etatdestock`.`reference`, `articles`.`libelleproduit`, `unite`.`unite`,
  `categorie`.`categorie`, `articles`.`id_categorie`
HAVING
  `articles`.`id_categorie` = '".$categorie."'
ORDER BY
  `etatdestock`.`reference` DESC");  

return $resultat;
 
}

function selectEtatDeStockRef($reference)
{
    global $db;
 $resultat=$db->query("SELECT
  `etatdestock`.`reference`, `articles`.`libelleproduit`,
  Sum(`etatdestock`.`quantite_initiale`) AS `quantite_initiale`, 
  Sum(`etatdestock`.`quantite_entree`) AS `quantite_entree`,
  Sum(`etatdestock`.`quantite_sortie`) AS `quantite_sortie`, 
  Sum(`etatdestock`.`quantite_initiale`) +
  Sum(`etatdestock`.`quantite_entree`) - 
  Sum(`etatdestock`.`quantite_sortie`) AS `StockFinal`, 
  `unite`.`unite`, `categorie`.`categorie`
FROM
  `etatdestock` 
INNER JOIN
  `articles` ON `articles`.`reference` = `etatdestock`.`reference` 
INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite` 
INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie` 
WHERE
  `etatdestock`.`reference` = '".$reference."'
GROUP BY
  `articles`.`libelleproduit`, `unite`.`unite`, `categorie`.`categorie` ORDER BY
  `etatdestock`.`reference` DESC");


 return $resultat;
}