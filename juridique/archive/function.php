    <?php

    $db;

        function connexiondb()
        {
            global $db;
            $db = new PDO('mysql:host=localhost;dbname=juridique', 'root', '');
        }

        function getAllContenu()
        {
            global $db;

            $donneContenu = $db->query("Select * from contenu")->fetch();
            return $donneContenu;

        }


function getContenuByID($id_contenu)
    {
        global $db;
        $getContenuByID = $db->query("SELECT
  `contenu`.*, `projet`.*, `type`.*, `contenu`.`id_contenu`
FROM
  `contenu` INNER JOIN
  `projet` ON `projet`.`id_projet` = `contenu`.`id_projet` INNER JOIN
  `type` ON `type`.`id_type` = `contenu`.`id_type`
WHERE
  `contenu`.`id_contenu` = '".$id_contenu."'")->fetch();

        return $getContenuByID ;
    }


    function getAllProjet()
    {
        global $db;
        $donneeProjet = $db->query("SELECT * FROM projet") ;
        return $donneeProjet;
    }

    function getProjetByID($id_projet)
    {
        global $db;
        $donneeProjetByID = $db->query("SELECT * FROM projet WHERE id_projet = '".$id_projet."'")->fetch() ;
        return $donneeProjetByID;
    }




    function sommeprojet()
    {
        global $db;
        $requete = $db->query("SELECT Count(`contenu`.`id_contenu`) FROM `contenu`;")->fetch( );

        $total = $requete[' Count(`contenu`.`id_contenu`)'];

        return $total;

    }

function sommeparprojet($id_projet)
{
    global $db;
    $donnee = $db->query("SELECT
  Count(`contenu`.`id_projet`), `projet`.`projet`
FROM
  `projet` INNER JOIN
  `contenu` ON `projet`.`id_projet` = `contenu`.`id_projet`
GROUP BY
  `projet`.`projet`
HAVING
  `projet`.`projet` = '".$id_projet."'")->fetch();

    return $somParProjet = $donnee['Count(`contenu`.`id_projet`)'];

}

function resSommeProjet()
{
    global $db;
    $donnee = $db->query("SELECT * FROM projet") ;
    $res = array();
    $total = sommeprojet();//254
    while ($resultat = $donnee->fetch()) {
        $nb = sommeparprojet($resultat['id_projet']);
        $pourcent = $nb/$total;
        $res [] = array('projet'=>$resultat['projet'],
            'pourcent'=>$pourcent,
            'id_projet'=>$resultat['id_projet']);

    }
    return $res;
}


function getAllType()
{
    global $db;
    $donneType = $db->query("Select * from type");
    return $donneType;

}


function getAllCompte()
{
    global $db;
    $donneCompte = $db->query("Select * from compte");
    return $donneCompte;

}

function getAllDossier($id_contenu)
{
    global $db;
    $donneDossier = $db->query("Select * from dossier WHERE id_contenu='".$id_contenu."'");
    return $donneDossier;

}

function consult($id){
    global $db;

    $mareq = $db->query("SELECT
  `contenu`.`id_contenu`, `contenu`.`numero`, `contenu`.`date`,
  `contenu`.`porte`, `contenu`.`observation`, `contenu`.`id_projet`,
  `contenu`.`id_type`, `projet`.`projet`, `type`.`type`, `contenu`.`lien`
FROM
  `contenu` INNER JOIN
  `type` ON `type`.`id_type` = `contenu`.`id_type` INNER JOIN
  `projet` ON `projet`.`id_projet` = `contenu`.`id_projet`
WHERE
  `projet`.`id_projet` = '".$id."'
ORDER BY
  `contenu`.`date` DESC");

    return $mareq;
    }
/*
    function getDoublonCin($cin)
    {
      global $db;
      $var = $db->query('select * from personnelcivil where cin = "'.$cin.'"');
      return $var;

    }*/
?>

