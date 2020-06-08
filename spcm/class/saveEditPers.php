<?php 
    session_start();
    require_once '../inc/function.php';
	connexiondb();
    

    if (!empty($_POST)) : 
        
        $message = array();
        $message = isValidEdit($_POST);

        if (!empty($message)) : ?>
            <?php 
                $_SESSION['message'] = $message ;
                header('location:../index.php?p=add');
                exit();
            ?>

        <?php endif ?>

        <?php if(empty($message)): ?>
<!-- down or no the fileImage -->
            <?php 
                if ($_FILES['image']['name']!="") {
                    if ($_SERVER['DOCUMENT_ROOT']=="E:/wamp/www/") {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], '../public/personnelImage/'.$_FILES['image']['name'])) {
                            $filename = $_FILES['image']['name'];                    
                        }else{
                            $filename="";
                            $message['danger'] = 'Erreur lors de la téléchargement de l\'image WINDOWS';
                        }
                    }else{
                     if (move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/personnel/public/personnelImage/'.$_FILES['image']['name'])) {
                            $filename = $_FILES['image']['name'];
                        }else{
                            $filename ='';
                            $message['danger'] = 'Erreur lors de la téléchargement de l\'image LINUX';                            
                        }   
                    }
                }else{
                    $filename="";
                }


                if (!empty($filename)) {
            $req = $db->prepare('UPDATE personnelcivil SET 
                        nomprenom = ? , 
                        sexe = ?
                        , datenaisse= ?
                        , lieudenaiss= ?
                        , cin= ?
                        , delivrele= ?
                        , a= ?
                        , adresseactuelle= ?
                        , mail= ?
                        , situationmatrimonial= ?
                        , groupesanguin= ?
                        , groupeethnique= ?
                        , religion= ?
                        , id_categorie_civil= ?
                        , fonction= ?
                        , id_etsouservice = ?
                        , id_detache = ?
                        , telephone= ? 
                        , rupture= ? 
                        , photo= ? 
                        WHERE 
                        id_civil = ?');
            $req->execute(array(
                        $_POST['nomprenom']
                        ,$_POST['sexe']
                        , $_POST['datenaisse']
                        ,$_POST['lieudenaiss']
                        ,$_POST['cin']
                        ,$_POST['delivrele']
                        ,$_POST['a']
                        ,$_POST['adresseactuelle']
                        ,$_POST['mail']
                        ,$_POST['situationmatrimonial']
                        ,$_POST['groupesanguin']
                        ,$_POST['groupeethnique']
                        ,$_POST['religion']
                        ,$_POST['id_categorie_civil']
                        ,$_POST['fonction']
                        ,$_POST['id_etsouservice']
                        ,$_POST['id_detache']
                        ,$_POST['telephone']
                        ,$_POST['rupture']
                        ,$filename
                        ,$_SESSION['varidcivil']
                        ));
        }
        else{
            $req = $db->prepare('UPDATE personnelcivil SET 
                    nomprenom = ? 
                    , sexe = ?
                    , datenaisse= ?
                    , lieudenaiss= ?
                    , cin = ?
                    , delivrele= ?
                    , a = ?
                    , adresseactuelle = ?
                    , mail = ?
                    , situationmatrimonial = ?
                    , groupesanguin = ?
                    , groupeethnique = ?
                    , religion = ?
                    , id_categorie_civil = ?
                    , fonction = ?
                    , id_etsouservice = ?
                    , id_detache = ?
                    , telephone = ?
                    , rupture = ?
                    WHERE 
                    id_civil = ?');
            $req->execute(array(
                $_POST['nomprenom']
                    ,$_POST['sexe']
                    ,$_POST['datenaisse']
                    ,$_POST['lieudenaiss']
                    ,$_POST['cin']
                    ,$_POST['delivrele']
                    ,$_POST['a']
                    ,$_POST['adresseactuelle']
                    ,$_POST['mail']
                    ,$_POST['situationmatrimonial']
                    ,$_POST['groupesanguin']
                    ,$_POST['groupeethnique']
                    ,$_POST['religion']
                    ,$_POST['id_categorie_civil']
                    ,$_POST['fonction']
                    ,$_POST['id_etsouservice']
                    ,$_POST['id_detache']
                    ,$_POST['telephone']
                    ,$_POST['rupture']
                    ,$_SESSION['varidcivil']
                ));
    }

    
    
    //$id_civil = $db->lastInsertId();
 /*Update etat de service*/
    $interruptiondu = ($_POST['interruptiondu'] !='') ? $_POST['interruptiondu'] : null;
    $au = ($_POST['au'] !='') ? $_POST['au'] : null;

    $req = $db->prepare('UPDATE etatdeservicecivil SET 
              direction = ?
            , affectionactuelle = ? 
            , matricule = ?
            , datederecrutement = ?
            , indice = ?
            , interruptiondu = ?
            , au = ?
            , sortantecole = ?
            WHERE
            id_civil = ?');   
    $req->execute(array(
            $_POST['direction'],
            $_POST['affectionactuelle'],
            $_POST['matricule'],
            $_POST['datederecrutement'],
            $_POST['indice'],
            $interruptiondu,
            $au,
            $_POST['sortantecole'],
            $_SESSION['varidcivil']
            )); 


    // Add or Update Conjoint
    $datemarriage = ($_POST['datemarriage'] !='') ? $_POST['datemarriage'] : null;
    $datenaissance = ($_POST['datenaissance'] !='') ? $_POST['datenaissance'] : null;

        
    if (getConjoint($_SESSION['varidcivil'])->rowcount()==0) {
        if ($_POST['nomprenomC']!="") {
            $req = $db->prepare('INSERT INTO conjoint_civil 
            (id_civil, nomprenom, datenaissance, lieunaissance, datemarriage) 
            VALUES (:id_civil, :nomprenom, :datenaissance, :lieunaissance, :datemarriage)
            ');   
        $req->execute(array(
            ':id_civil' =>$_SESSION['varidcivil'],
            ':nomprenom' =>$_POST['nomprenomC'],
            ':datenaissance' =>$datenaissance,
            ':lieunaissance' =>$_POST['lieunaissance'],
            ':datemarriage' =>$datemarriage));    
        }
    }else{
            $req = $db->prepare('UPDATE conjoint_civil SET 
                nomprenom = ?, 
                datenaissance = ?, 
                lieunaissance = ?, 
                datemarriage = ?
                WHERE 
                id_civil = ?');   
            $req->execute(array(
                 $_POST['nomprenomC'],
                 $datenaissance,
                 $_POST['lieunaissance'],
                 $datemarriage,
                 $_SESSION['varidcivil']    
            )); 
    }



 
/*Update INFORMATIQUE*/
    if ($_POST['bureautique']!='') {
    $req = $db->prepare('UPDATE aptitudeinfo SET 
        bureautique = ?,  
        autres = ?
        WHERE 
        id_civil = ?');   
    $req->execute(array(
        $_POST['bureautique'],
        $_POST['autresI'],
        $_SESSION['varidcivil']    
    ));

    }
 /*Update langue*/

        $req = $db->prepare('UPDATE  aptitudelinguistique SET
             francais = ?, 
             anglais = ?, 
             autres = ? 
             WHERE 
             id_civil = ? ');   
        $req->execute(array(
             $_POST['francais'],
             $_POST['anglais'],    
             $_POST['autresL'],
             $_SESSION['varidcivil']    
            ));     
  


/*add or UPDATE Particulier*/
    $particulier = getAptiPart($_SESSION['varidcivil'])->fetch();

    $delivreleP = ($_POST['delivreleP'] !='') ? $_POST['delivreleP'] : null;

    if ($particulier) {
        
            if (getAptiPart($_SESSION['varidcivil'])->rowcount()==0) {
                $req = $db->prepare('INSERT INTO aptitudeparticulier 
                (id_civil, permis, delivrele, a, categorie, autres) 
                VALUES (:id_civil, :permis, :delivrele, :a, :categorie, :autres)
                ');   
            $req->execute(array(
                ':id_civil' =>$_SESSION['varidcivil'],
                ':permis' =>$_POST['permis'],
                ':delivrele' =>$delivreleP,    
                ':a' =>$_POST['aP'],    
                ':categorie' =>$_POST['categorieP'],    
                ':autres' =>$_POST['autresP']    
                ));     
            }else{
            $req = $db->prepare('UPDATE aptitudeparticulier SET
                 permis = ?, 
                 delivrele = ?, 
                 a = ?, 
                 categorie = ?, 
                 autres = ? 
                 WHERE 
                 id_civil = ? ');   
            $req->execute(array(
                 $_POST['permis'],
                 $delivreleP,    
                 $_POST['aP'],
                 $_POST['categorieP'],
                 $_POST['autresP'],
                 $_SESSION['varidcivil']    
                ));     

            }    
            
        }

        $message['success'] = 'Enregistrement réussi';
        $_SESSION['message']= $message;

        header('location:../index.php?p=viewPers&id_civil='.$_SESSION['varidcivil'].'');

        ?>
        <?php endif ?>
    <?php endif ?>
 
 <?php 
/*   for ($i=0; $i <count($_POST['reference']) ; $i++) { 
             $req = $db->prepare('INSERT INTO avancementsuccessifs (id_civil, statut, reference, dateeffet) 
             VALUES (:id_civil, :statut, :reference, :dateeffet) ');
             $req->execute(array(
                ':id_civil'=> $id_civil,
                ':statut'=> $_POST['statut'][$i] ,
                ':reference'=> $_POST['reference'][$i],
                ':dateeffet'=> $_POST['dateeffetA'][$i]
                ));
         }  

       for ($i=0; $i <count($_POST['nomprenomE']) ; $i++) { 
             $req = $db->prepare('INSERT INTO enfant (id_civil, nomprenom, datenaiss, sexe, obs) 
             VALUES (:id_civil, :nomprenom, :datenaiss, :sexe, :obs) ');
             $req->execute(array(
                ':id_civil'=> $id_civil,
                ':nomprenom'=> $_POST['nomprenomE'][$i] ,
                ':datenaiss'=> $_POST['datenaiss'][$i] ,
                ':sexe'=> $_POST['sexe'][$i],
                ':obs'=> $_POST['obs'][$i]
                ));
        }
        for ($i=0; $i <count($_POST['numdecorationcivil']) ; $i++) { 
            $req = $db->prepare('INSERT INTO  decoration_civil (id_civil, numdecorationcivil, decretouarrete, annee, observation) 
            VALUES (:id_civil, :numdecorationcivil, :decretouarrete, :annee, :observation)');
            $req->execute(array(
            ':id_civil'=> $id_civil,
            ':numdecorationcivil'=> (int) $_POST['numdecorationcivil'][$i] ,
            ':decretouarrete'=> $_POST['decretouarrete'][$i] ,
            ':annee'=> $_POST['anneeD'][$i],
            ':observation'=> $_POST['observation'][$i]
            ));
        }        

        for ($i=0; $i <count($_POST['lieuaffect']) ; $i++) {

            $req = $db->prepare('INSERT INTO affectationsuccessivecivil (id_civil, lieuaffect, detachement, fonctiontenue, dateeffet) 
            VALUES (:id_civil, :lieuaffect, :detachement, :fonctiontenue, :dateeffet) ');
            $req->execute(array(
            ':id_civil'=> $id_civil,
            ':lieuaffect'=> $_POST['lieuaffect'][$i] ,
            ':detachement'=> $_POST['detachement'][$i] ,
            ':fonctiontenue'=> $_POST['fonctiontenue'][$i],
            ':dateeffet'=> $_POST['dateeffet'][$i]
            ));
        }          
        for ($i=0; $i <count($_POST['etabli']) ; $i++) { 
            $req = $db->prepare('INSERT INTO ecoleformationstage (id_civil, intitule, etabli, diplome, annee) 
            VALUES (:id_civil, :intitule, :etabli, :diplome, :annee) ');
            $req->execute(array(
            ':id_civil'=> $id_civil,
            ':intitule'=> $_POST['intitule'][$i] ,
            ':etabli'=> $_POST['etabli'][$i] ,
            ':diplome'=> $_POST['diplome'][$i],
            ':annee'=> $_POST['annee'][$i]
            ));
        }
*/
  ?>