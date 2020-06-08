<?php 
    session_start();

    require_once '../inc/function.php';
    connexiondb();
    $message = array();
    
    if (!empty($_POST)) :
        $message = isValid($_POST);

    if (!empty($message)) : ?>
            <?php 
                $_SESSION['message'] = $message ;
                header('location:../index.php?p=add');
                exit();
            ?>

        <?php endif ?>

        <?php if(empty($message)): ?>
         <?php   
    $filename = "";       
    if ($_FILES['image']['name']!="") {
        if ($_SERVER['DOCUMENT_ROOT']=="E:/wamp/www/") {
            if (move_uploaded_file($_FILES['image']['tmp_name'], '../public/personnelImage/'.$_FILES['image']['name'])) {
                $filename = $_FILES['image']['name'];
            }else{
                $filename="";
                $message['danger'] ='Erreur lors de téléchargement d\'image';                
            }
        }else{
            if (move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/personnel/public/personnelImage/'.$_FILES['image']['name'])) {
                $filename = $_FILES['image']['name'];                
            }else{
                $filename="";
                $message['danger'] ='Erreur lors de téléchargement d\'image';
            }
        }

            
    }else{
        $filename = "";
    }   

    $day = strftime("%d", strtotime($_POST['datenaisse'] )) ;
    $months = strftime("%m", strtotime($_POST['datenaisse'] )) ;
    $annee = strftime("%Y", strtotime($_POST['datenaisse'] )) + 65;

    $retraite= $annee.'-'.$months.'-'.$day;

    $req = $db->prepare('INSERT INTO personnelcivil (nomprenom, sexe, datenaisse, lieudenaiss, cin, delivrele, a,
    adresseactuelle, mail, situationmatrimonial, groupesanguin, groupeethnique, religion, id_categorie_civil, fonction, id_etsouservice, id_detache
    , telephone, rupture, retraite, photo) 
    VALUES (:nomprenom, :sexe, :datenaisse, :lieudenaiss, :cin, :delivrele, :a, :adresseactuelle, :mail, :situationmatrimonial, :groupesanguin, :groupeethnique, :religion, :id_categorie_civil, :fonction, :id_etsouservice, :id_detache
    , :telephone, :rupture, :retraite, :photo)');
    $req->execute(array(
        ':nomprenom'=> $_POST['nomprenom'],
        ':sexe'=> $_POST['sexe'],
        ':datenaisse'=> $_POST['datenaisse'],
        ':lieudenaiss'=> $_POST['lieudenaiss'],
        ':cin'=> $_POST['cin'],
        ':delivrele'=> $_POST['delivrele'],
        ':a'=> $_POST['a'],
        ':adresseactuelle'=> $_POST['adresseactuelle'],
        ':mail'=> $_POST['mail'],
        ':situationmatrimonial'=> $_POST['situationmatrimonial'],
        ':groupesanguin'=> $_POST['groupesanguin'],
        ':groupeethnique'=> $_POST['groupeethnique'],
        ':religion'=> $_POST['religion'],
        ':id_categorie_civil'=> $_POST['id_categorie_civil'],
        ':fonction'=> $_POST['fonction'],
        ':id_etsouservice'=> $_POST['id_etsouservice'],
        ':id_detache'=> $_POST['id_detache'],
        ':telephone'=> $_POST['telephone'],
        ':retraite' => $retraite,
        ':rupture' => 1,
        ':photo'=>$filename

    ));
    
    $id_civil = $db->lastInsertId();

    $interruptiondu = ($_POST['interruptiondu']!='') ? $_POST['interruptiondu'] : null ;
    $au = ($_POST['au']!='') ? $_POST['au'] : null ;

    $req = $db->prepare('INSERT INTO etatdeservicecivil 
        (id_civil, affectionactuelle, direction, matricule, datederecrutement, indice, interruptiondu, au,sortantecole) 
        VALUES (:id_civil, :affectionactuelle, :direction, :matricule, :datederecrutement, :indice, :interruptiondu, :au, :sortantecole)
        ');   
    $req->execute(array(
        ':id_civil' =>$id_civil,
        ':affectionactuelle' =>$_POST['affectionactuelle'],
        ':direction' =>$_POST['direction'],
        ':matricule' =>$_POST['matricule'],
        ':datederecrutement' =>$_POST['datederecrutement'],
        ':indice' =>$_POST['indice'],
        ':interruptiondu' =>$interruptiondu,
        ':au' =>$au, 
        ':sortantecole' =>$_POST['sortantecole']    
    )); 
    $datenaissance = ($_POST['datenaissance']!="") ? $_POST['datenaissance'] : null ;
    $datemarriage =  ($_POST['datemarriage']!="") ? $_POST['datemarriage'] : null ;

    if ($_POST['nomprenomC']!="") {
        $req = $db->prepare('INSERT INTO conjoint_civil 
            (id_civil, nomprenom, datenaissance, lieunaissance, datemarriage) 
            VALUES (:id_civil, :nomprenom, :datenaissance, :lieunaissance, :datemarriage)
            ');   
        $req->execute(array(
            ':id_civil' =>$id_civil,
            ':nomprenom' =>$_POST['nomprenomC'],
            ':datenaissance' =>$datenaissance,
            ':lieunaissance' =>$_POST['lieunaissance'],
            ':datemarriage' =>$datemarriage    
        )); 
    }

    $req = $db->prepare('INSERT INTO aptitudeinfo 
        (id_civil, bureautique, autres) 
        VALUES (:id_civil, :bureautique, :autres)
        ');   
    $req->execute(array(
        ':id_civil' =>$id_civil,
        ':bureautique' =>$_POST['bureautique'],
        ':autres' =>$_POST['autresB']    
    ));
    
/*Add langue*/
             $req = $db->prepare('INSERT INTO aptitudelinguistique 
            (id_civil, francais, anglais, autres) 
            VALUES (:id_civil, :francais, :anglais, :autres)
            ');   
        $req->execute(array(
            ':id_civil' =>$id_civil,
            ':francais' =>$_POST['francais'],
            ':anglais' =>$_POST['anglais'],    
            ':autres' =>$_POST['autresL']    
            ));     

/*add Particulier*/     
    $delivreleP =  ($_POST['delivreleP']!="") ? $_POST['delivreleP'] : null ;           
    if ($_POST['permis']!='') {
 
        $req = $db->prepare('INSERT INTO aptitudeparticulier 
        (id_civil, permis, delivrele, a, categorie, autres) 
        VALUES (:id_civil, :permis, :delivrele, :a, :categorie, :autres)
        ');   
    $req->execute(array(
        ':id_civil' =>$id_civil,
        ':permis' =>$_POST['permis'],
        ':delivrele' =>$delivreleP,    
        ':a' =>$_POST['aP'],    
        ':categorie' =>$_POST['categorieP'],    
        ':autres' =>$_POST['autresP']    
        ));     
     } 



    for ($i=0; $i <count($_POST['reference']) ; $i++) { 
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


    $message['success'] = "Enregistrement réussi";    
    $_SESSION['message']= $message;
    header('location:../index.php?p=viewPers&id_civil='.$id_civil.'');
    ?>
        <?php endif ?>
    <?php endif ?>
 