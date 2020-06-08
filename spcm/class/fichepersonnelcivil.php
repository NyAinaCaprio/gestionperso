<?php //session_start();
require_once "inc/function.php";
connexiondb();

$deco_list = select_deco();
$select_ServDet = SelectBox_affect_Succ();

$_SESSION['varidcivil'] = $_GET['id_civil'];
$civil = getListcivil($_SESSION['varidcivil'])->fetch();
$etatdeservice= getEtatdeService($_SESSION['varidcivil'])->fetch();
$conjoint = getConjoint($_SESSION['varidcivil']);
$avancements = getAvanSucc($_SESSION['varidcivil']);
$enfant = getEnfant($_SESSION['varidcivil']);
$decoration = getDecoDetail($_SESSION['varidcivil']);
$affect = getAffecSucc($_SESSION['varidcivil']);  
$conge = getConge($_SESSION['varidcivil']);
$info = getInfo($_SESSION['varidcivil'])->fetch(); 
$langue = getLinguistique($_SESSION['varidcivil'])->fetch();
$ecole = getEcoleFormation($_SESSION['varidcivil']);
$particulier = getAptiPart($_SESSION['varidcivil'])->fetch();
 
 
?> 
        <form action="class/saveEditPers.php" method="post"  enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div id="centre" class="box-header with-border">
                        
                           <div class="login-social-link centered">
                                <p>
                                    <?php
                                   // echo $_SESSION->varidcivil;
                                    if(array_key_exists('errors', $_SESSION)) {
                                        echo '<div class="alert alert-danger"><i class="fa fa-info-circle fa-2x"></i> '.$_SESSION->errors.'</div>';
                                    }else{

                                    }
                                    unset($_SESSION->errors);
                                    ?>
                                </p>
                            </div>
                            
                                  <div class="row">
                                      <div class="col-md-6">
                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Etat civil</h3>
                                            </div>

    
                                            <div class="form-group">
                                                <label for="id_categorie_civil">Catégorie *   </label>
                                                <select name="id_categorie_civil"   class="form-control input-sm" required>
                                                     
                                                    <option value="<?php echo $civil->id_categorie_civil ?>"><?php echo $civil->categorie_civil ?></option>
                                                    <?php
                                                    $cat = getAllCategorie();

                                                    foreach($cat as $route) { ?>
                                                        <option value="<?php echo $route->id_categorie_civil;?>"><?php echo $route->categorie_civil ?></option>
                                                    <?php }?>
                                                    <input  id="id_civil" name="id_civil" type="hidden" value="<?php echo $_SESSION['varidcivil'] ?>" />

                                            </div>

                                            <div class="form-group">
                                                <label for="id_etsouservice">ETS ou Service</label>
                                                <select name="id_etsouservice"  class="form-control input-sm" id="id_etsouservice">                                                    
                                                    <option value="<?php echo  $civil->id_etsouservice ?>"><?php echo  $civil->etsouservice ?></option>
                                                    <?php
                                                    $ets = getAllEtsouservice();
                                                    foreach($ets as $route) { ?>
                                                        <option value="<?php echo $route->id_etsouservice;?>"><?php echo $route->etsouservice;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                    <label for="id_dettache">Lieu de détachement</label>
                                                    <select id="id_dettache" name="id_dettache" class="form-control input-sm" >
                                                        <option value='<?php echo $civil->id_detache ?>'> <?php echo $civil->dettache ?></option>
                                                        <?php
                                                        $det = getAllDetache();

                                                        foreach($det as $route11) { ?>
                                                            <option value="<?php echo $route11->id_dettache;?>"><?php echo $route11->dettache;?></option>
                                                        <?php }?>
                                                    </select>

                                                </div>
                                            <div class="form-group">
                                                <label for="nomprenom">Nom et Prénoms</label>
                                                <input type="text" name="nomprenom" class="form-control input-sm" value='<?php echo $civil->nomprenom ?>' required>
                                            </div>
                                            <div class="form-group">
                                                <label for="sexe">Sexe</label>
                                                <select id="sexe" name="sexe" class="form-control input-sm">
                                                    <option value='<?php echo $civil->sexe ?>'><?php echo $civil->sexe ?> </option>
                                                    <option value='M'>M</option>
                                                    <option value='F'>F</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="cin">CIN</label>
                                                <input type="text"  maxlength="12" name="cin" id="cin" class="form-control input-sm" pattern="[0-9]{12}"  onchange="verifcin()" value='<?php echo $civil->cin ?>' required />
                                            </div>
                                            <div class="form-group">
                                                <label for="datenaisse">Date de naissance</label>
                                                <input required type="date"  maxlength="10" name="datenaisse" id="datenaisse" placeholder="Année/Mois/Jour" type="date" class="form-control input-sm" value='<?php echo $civil->datenaisse ?>' />
                                            </div>

                                            <div class="form-group">
                                                <label for="delivrele">Délivré le</label>
                                                <input required type="date" id="delivrele" name="delivrele" class="form-control input-sm"  placeholder="Année/Moi/Jour" type="date" value='<?php echo $civil->delivrele ?>' />
                                            </div>
                                            <div class="form-group">
                                                <label for="a">à</label>
                                                <input required type="text" id="a" name="a" class="form-control input-sm" value='<?php echo $civil->a ?>' />
                                            </div>
                                            <div class="form-group">
                                                <label for="lieudenaiss">Lieu de naissance</label>
                                                <input required type="text" id="lieudenaiss" name="lieudenaiss" class="form-control input-sm"  value='<?php echo $civil->lieudenaiss ?>' />
                                            </div>
                                            <div class="form-group">
                                                <label for="adresseactuelle">Adresse actuelle</label>
                                                <input required type="text" id="adresseactuelle" name="adresseactuelle" class="form-control input-sm"  value='<?php echo $civil->adresseactuelle ?>' />
                                            </div>
                                            <div class="form-group">
                                                <label for="mail">Mail</label>
                                                <input type="mail" id="mail" name="mail" class="form-control input-sm" value='<?php echo $civil->mail ?>' />
                                            </div>
                                            <div class="form-group">
                                                <label for="telephone">Téléphone :</label>
                                                <input required type="telephone" maxlength="10" id="telephone" name="telephone" class="form-control input-sm" value='<?php echo $civil->telephone ?>' />
                                            </div>
                                            <div class="form-group">
                                                <label for="situationmatri">Situation matrimoniale</label>
                                                <select id="situationmatrimonial"   name="situationmatrimonial" class="form-control input-sm"  >
                                                    <option value='<?php echo $civil->situationmatrimonial ?>'> <?php echo $civil->situationmatrimonial ?></option>
                                                    <option>Marié</option>
                                                    <option>Divorcé</option>
                                                    <option>Veuf(ve)</option>
                                                    <option>Célibataire</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="groupesanguin">groupesanguin</label>
                                                <input type="text" id="groupesanguin" name="groupesanguin" class="form-control input-sm" value='<?php echo $civil->groupesanguin ?>' />

                                            </div>
                                            <div class="form-group">
                                                <label for="groupeethnique">Groupe Ethnique</label>
                                                <input type="text" id="groupeethnique" name="groupeethnique" class="form-control input-sm" value='<?php echo $civil->groupeethnique ?>' />

                                            </div>
                                            <div class="form-group">
                                                <label for="retraite">Date retraite</label>
                                                <input type="text" disable name="retraite" class="form-control input-sm" value='<?php echo $civil->retraite ?>' />

                                            </div>
                                            <div class="form-group">
                                                <label for="religion">Religion</label>

                                                <select name="religion" id="religion" class="form-control input-sm">
                                                    <option value='<?php echo $civil->religion ?>'><?php echo $civil->religion ?> </option>
                                                    <option>Protestant</option>
                                                    <option>Catholique</option>
                                                    <option>Musulman</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Photo </label>
                                                <input type="file" name="image" id="image">
                                            </div>

                                        </div>

                                    </div>
 



                                    <div class="col-md-6">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                    <h3 class="box-title">Etat de service </h3>
                                                </div>

                                                <div class="form-group">
                                                    <label for="affectionactuelle">Affectration actuelle</label>
                                                    <input required type="text" id="affectionactuelle" name="affectionactuelle" class="form-control input-sm" value='<?php echo $etatdeservice->affectionactuelle ?>' />

                                                </div>
                                                <div class="form-group">
                                                    <label for="direction">Direction </label>
                                                    <input required type="text" id="direction" name="direction" class="form-control input-sm" value='<?php echo $etatdeservice->direction ?>'  />
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="matricule">Matricule</label>
                                                    <input type="text" id="matricule" name="matricule" class="form-control input-sm" value='<?php echo $etatdeservice->matricule ?>' /></td>
                                                </div>                                                
                                                <div class="form-group">
                                                    <label for="datederecrutement">Date de recrutement</label>
                                                    <input required type="date" id="datederecrutement" name="datederecrutement" class="form-control input-sm" type='date' placeholder="Année/Moi/Jour" value='<?php echo $etatdeservice->datederecrutement ?>' />
                                                </div>


                                                <div class="form-group">
                                                    <label for="indice">Indice</label>
                                                    <input required type="text" id="indice" name="indice" class="form-control input-sm"  value='<?php echo $etatdeservice->indice ?>' />
                                                </div>

                                                <div class="form-group">
                                                    <label for="interruptiondu">Interruption du</label>
                                                    <input  type="date" id="interruptiondu" name="interruptiondu" class="form-control input-sm" placeholder="Année/Moi/Jour" type='date' value='<?php echo $etatdeservice->interruptiondu ?>' />
                                                </div>

                                                <div class="form-group">
                                                    <label for="au">au</label>
                                                    <input  type="date" id="au" name="au" class="form-control input-sm" placeholder="Année/Moi/Jour"  type='date' value='<?php echo $etatdeservice->au ?>'/>
                                                </div>


                                                <div class="form-group">
                                                    <label for="sortantecole">Sortant ecole</label>
                                                    <input type="text" id="sortantecole" name="sortantecole" class="form-control input-sm" value='<?php echo $etatdeservice->sortantecole ?>' />

                                                </div>

                                            </div>
                                        </div>
                                      <div class="col-md-6">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                    <h3 class="box-title">Conjoint(e) </h3>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nomprenom">Nom et prénom</label>
                                                    <input type="text" id="nomprenom" name="nomprenom" class="form-control input-sm" value=' <?php if ($conjoint): echo $conjoint->nomprenom?> <?php endif ?>' />

                                                </div>

                                                <div class="form-group">
                                                    <label for="datedenaissance">Date de naissance</label>
                                                    <input type="date" id="datedenaissance" name="datenaissance" class="form-control input-sm" value='<?php if ($conjoint): echo $conjoint->datenaissance ?> <?php endif ?>' />

                                                </div>
                                                <div class="form-group">
                                                    <label for="lieunaissance">Lieu de Naissance</label>
                                                    <input type="text" id="lieunaissance" name="lieunaissance" class="form-control input-sm" value='<?php if ($conjoint): echo $conjoint->lieunaissance ?> <?php endif ?>' />

                                                </div>
                                                <div class="form-group">
                                                    <label for="datemarriage">Date mariage</label>
                                                    <input type="date" id="datemarriage" name="datemarriage" class="form-control input-sm" value=' <?php if ($conjoint ): echo $conjoint->datemarriage  ?> <?php endif ?>' />

                                                </div>
                                              </div>
                                        </div>

                                      <div class="col-md-6">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                    <h3 class="box-title">Aptitude informatique </h3>
                                                </div>

                                                <div class="form-group">
                                                    <label for="bureautique">Bureautique</label>
                                                    <select name='bureautique' class='form-control'>
                                                        <option value='<?php echo $info->bureautique ?>'><?php echo $info->bureautique ?></option>
                                                        <option value='Oui'>Oui</option>
                                                        <option value='Non'>Non</option>
                                                    </select> 

                                                </div>

                                                <div class="form-group">
                                                    <label for="autresI">Autres</label>
                                                    <textarea name='autresI' class='form-control'><?php if (isset($info->autres)): echo $info->autres ?> <?php endif ?></textarea>
                                                </div>
                                              </div>
                                        </div>

<div class="row">
    <div class='col-md-12'>
        <div class='col-md-6'>
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">Aptitude Linguistique </h3>
                </div>
            <div class="form-group">
                <label > Français</label>
                    <select name='francais' class='form-control'>
                        <option value='<?php echo $langue->francais ?>'><?php echo $langue->francais ?></option>
                        <option value='faible'>faible</option>
                        <option value='Moyen'>Moyen</option>
                        <option value='Excellent'>Excellent</option>
                             
                    </select>
                </div>
                <div class="form-group">
                    <label > Anglais</label>
                        <select name='anglais' class='form-control'>
                            <option value='<?php echo $langue->anglais ?>'><?php echo $langue->anglais ?></option>
                            <option value='faible'>faible</option>
                            <option value='Moyen'>Moyen</option>
                            <option value='Excellent'>Excellent</option>
                        </select>
                </div>
                <div class="form-group">
                    <label> Autres</label>
                    <input required type='text' name='autres' class='form-control' value='<?php echo $langue->autres ?>'> 
                </div>
            </div>     
        </div>  

                <div class='col-md-6'>
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">Aptitude Particulier </h3>
                </div>
            <div class="form-group">
                <label > Permis</label>
                    <input type='text' name='permis' class='form-control' value='<?php if (isset($particulier->permis)): echo $particulier->permis ?> <?php endif ?>'>
                </div>
                <div class="form-group">
                    <label > Délivré le </label>
                    <input type='date' name='delivreleP' class='form-control' value='<?php if (isset($particulier->delivrele)): echo $particulier->delivrele ?> <?php endif ?>'>
                </div>
                <div class="form-group">
                    <label > à</label>
                    <input type='text' name='a' class='form-control' value='<?php if (isset($particulier->a)): echo $particulier->a ?> <?php endif ?>'>
                </div>
                <div class="form-group">
                    <label > Permis</label>
                    <input type='text' name='categorie' class='form-control' value='<?php if (isset($particulier->categorie)): echo $particulier->categorie ?> <?php endif ?>'>
                </div>
                <div class="form-group">
                   <textarea name='autresP' class='form-control'></textarea> 
                </div>
            </div>     
        </div>        
    </div>
</div>                                        

<div class="row">
    <div class='col-md-12'>
    <div class="col-md-6">
            <table class="table table-bordered" id="addAvancementSucc_table">
                <thead>
                    <tr>
                        <th scope="col" colspan="5" ><div class="alert alert-info">Avancements Successifs</div></th>  
                    </tr>
                    <tr>
                        <th width="20%">Statut</th>
                        <th width="30%">Reférence</th>
                        <th width="20%">Date Effet</th>
                        <th width="20%"> <button type="button" name="addAvancementSucc" id="addAvancementSucc" class="btn btn-success btn-xs">+</button></th>
                        

                    </tr>
                </thead>
            <tbody>
                <?php //if ($avancements): ?>     
                    <?php foreach ($avancements as $datas)  : ?>
                    <tr>
                      <td><input required type='text' name='statut[]' class='form-control' value='<?php echo $datas->statut ?>'></td>
                      <td><input required type='text' name='reference[]' class='form-control' value='<?php echo $datas->reference ?>'></td>
                      <td><input required type='date' name='dateeffet[]' class='form-control' value='<?php echo $datas->dateeffet ?>'></td>
                      <td scope='col'><a href="index.php?p=delete&tab=avance&var=<?php echo $datas->numavancementsucc ?>" class='btn btn-danger btn-xs'></a></td>
                    </tr>
                  <?php endforeach ?>
                <?php //endif ?>     
            </tbody>
        </table>
    </div>

     <div class="col-md-6">
            <table class="table table-bordered" id="enfant_table">
          <thead>
            <tr><th scope="col" colspan="6" > <div class="alert alert-info">Enfant en charge</div></th>  </tr>
            <tr>
                <th width="40%">Nom et Prénom(s)</th>
                <th width="30%">Date de naissance</th>
                <th width="10%">Sexe</th>
                <th width="10%">Obs</th>
                <th width="10%"><button  type="button" name="addEnfantEnCharge" id="addEnfantEnCharge" class="btn btn-success btn-xs">+</button></th>
                <th width="10%"></th>

            </tr>
          </thead>
          <tbody>
                <?php //if ($avancements): ?>              
          <?php foreach ($enfant as $datas)  : ?>
            <tr>
              <td><input required type='text' name='nomprenom[]' class='form-control' value='<?php echo $datas->nomprenom ?>'></td>
              <td><input required type='text' name='datenaiss[]' class='form-control' value='<?php echo $datas->datenaiss ?>'></td>
              <td><input required type='date' name='sexe[]' class='form-control' value='<?php echo $datas->sexe ?>'></td>
              <td><input required type='date' name='obs[]' class='form-control' value='<?php echo $datas->obs ?>'></td>
                      <td scope='col'><a href="index.php?p=delete&tab=enfant&var=<?php echo $datas->numenfant ?>" class='btn btn-danger btn-xs'></a></td>        
            </tr>
          <?php endforeach ?>
                <?php //endif ?>               
        </tbody>
        </table>
    </div>
    <div class="col-md-6">
            <table class="table table-sm" id="decoration_table">
          <thead>
            <tr><th scope="col" colspan="4" > <div class="alert alert-info">Décoration</div></th>  </tr>
            <tr>
                <th scope="col">Intitulé décoration</th>
                <th scope="col">Décret ou arrêté</th>
                <th scope="col">Année</th>
                <th scope="col">Obs.</th>
                <th scope="col"><button  type="button" name="addDecoration" id="addDecoration" class="btn btn-success btn-xs">+</button></th>
                <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($decoration as $datas)  :  ?>
            <tr>
                <?php  $lib_deco = getIntituleDeco($datas->numdecorationcivil) ?>
              <td> 

                <select name='numdecorationcivil[]' class='form-control'>
                <?php foreach ($lib_deco as  $value) : ?>
                    <option value='<?php echo $value->numdecorationcivil ?>'><?php echo $value->decoration ?></option>
                <?php endforeach ?>
                

                <?php $listeDeco = getAllTypeDecoration() ?>
                <?php foreach ( $listeDeco as $liste ): ?>
                    <option value='<?php echo $liste->numdecorationcivil ?>'><?php echo $liste->decoration  ?></option>
                <?php endforeach ?>
                </select>
                </td>
                


              <td><input required type='text' name='decretouarrete[]' class='form-control' value='<?php echo $datas->decretouarrete ?>'></td>
              <td><input required type='date' name='annee[]' class='form-control' value='<?php echo $datas->annee ?>'></td>
              <td><input required type='texte' name='observation[]' class='form-control' value='<?php echo $datas->observation ?>'></td>
              <td></td>
                      <td scope='col'><a href="index.php?p=delete&tab=deco&var=<?php echo $datas->numdecoration ?>" class='btn btn-danger btn-xs'></a></td>
            </tr>
          <?php endforeach ?>
          </tbody>
        </table>
    </div>

    <div class="col-md-6">
            <table class="table table-sm" id="affectation_table">
          <thead>
            <tr><th scope="col" colspan="4" ><div class="alert alert-info">Affectation successives</div></th>  </tr>
            <tr>
                <th scope="col">Lieu d'affectation</th>
                <th scope="col">Détachement</th>
                <th scope="col">Fonction tenue</th>
                <th scope="col">Date Effet</th>
                <th scope="col"><button  type="button" name="addAffectation" id="addAffectation" class="btn btn-success btn-xs">+</button></th>
                <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($affect as $datas) : ?>
            <tr>
              <td><input required type='text' name='lieuaffect[]' class='form-control' value='<?php echo $datas->lieuaffect ?>'> </td>
              <td><input required type='text' name='detachement[]' class='form-control' value='<?php echo $datas->detachement ?>'></td>
              <td><input required type='text' name='fonctiontenue[]' class='form-control' value='<?php echo $datas->fonctiontenue ?>'></td>
              <td><input required type='date' name='dateeffet[]' class='form-control' value='<?php echo $datas->dateeffet ?>'></td>              
                <td scope='col'><a href="index.php?p=delete&tab=affect&var=<?php echo $datas->numaffectciv ?>" class='btn btn-danger btn-xs'></a></td>
              
            </tr>
            <?php endforeach ?>
             
          </tbody>
        </table>
    </div>
    <div class="col-md-6">
            <table class="table table-sm" id="conge_table">
          <thead>
            <tr><th scope="col" colspan="4" ><div class="alert alert-info">Congé</div></th>  </tr>
            <tr>
                <th scope="col">Année</th>
                <th scope="col">Reliquat</th>
                <th scope="col">Droit</th>
                <th scope="col">Total</th>
                <th scope="col"><button  type="button" name="addConge" id="addConge" class="btn btn-success btn-xs">+</button></th>
                <th scope="col">-</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($conge as $datas) : ?>
            <tr>
              <td><input required type='text' name='annee[]' class='form-control' value='<?php echo $datas->annee ?>'></td>
              <td><input required type='text' name='reliquat[]' class='form-control' value='<?php echo $datas->reliquat ?>'></td>
              <td><input required type='text' name='droit[]' class='form-control' value='<?php echo $datas->droit ?>'></td>
              <td><input required type='text' name='total[]' class='form-control' value='<?php echo $datas->total ?>'></td>              
              <td></td>
              <td scope='col'><button  type='button' id ='congeRemove' data-row='<?php echo $datas->numconge ?>' class='btn btn-danger btn-xs'>-</button></td>
            </tr>
            <?php endforeach ?>
            
             
          </tbody>
        </table>
    </div>


   


               
    <div class="col-md-6">
            <table class="table table-sm" id="ecole_table">
          <thead>
            <tr><th scope="col" colspan="4" > <div class='alert alert-info'>Ecole / Formation / Stage</div></th>  </tr>
            <tr>
                <th scope="col">Intitulé</th>
                <th scope="col">Ecoles / Institutions/Etablissements</th>
                <th scope="col">Diplômes/ Certificat</th>
                <th scope="col">Année</th>
                <th scope="col"><button  type="button" name="addEcole" id="addEcole" class="btn btn-success btn-xs">+</button></th>
                <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($ecole as $datas) : ?>
            <tr>
              <td><input required type='text' name='intitule[]' class='form-control' value='<?php echo $datas->intitule ?>'></td>
              <td><input required type='text' name='etabli[]' class='form-control' value='<?php echo $datas->etabli ?>'></td>
              <td><input required type='text' name='diplome[]' class='form-control' value='<?php echo $datas->diplome ?>'></td>              
              <td><input required type='text' name='annee[]' class='form-control' value='<?php echo $datas->annee ?>'></td>
              <td></td>
           <td scope='col'><a href="index.php?p=delete&tab=ecole&var=<?php echo $datas->numecole ?>" class='btn btn-danger btn-xs'></a></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>


</div>
</div>

                                </div>  

                        </div>    
                    </div>
                </div>

    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" name="enregistrer" class="btn btn-danger animated animate flip"><i class="fa fa-save fa-2x"></i> Enregistrer</button>
        </div>  

    </div>

</div>
</form>    

<script type="text/javascript">

$(document).ready(function(){
var count = 1;

$("#addAvancementSucc").click(function(){               
    count = count + 1;    

    var code1='';
    code1+= "<tr id='row"+count+"'>";

    code1+= "<td><input type='text' name='statut[]' class='form-control input-sm' ></td>";
    code1+= "<td> <input type='text' name='reference[]' class='form-control input-sm' required></td>";
    code1+= "<td> <input type='date' name='dateeffetA[]' class='form-control input-sm'></td>";
    code1+= "<td scope='col'><button type='button' id ='avancementsSuccessifsRemove' data-row='row"+count+"' class='btn btn-danger btn-xs'>-</button></td>";

    code1+="</tr>";


    $("#addAvancementSucc_table").append(code1);

});

$(document).on('click','#avancementsSuccessifsRemove',function(){
    var delete_row = $(this).data('row');
    $('#'+delete_row).remove();

});
 

//----
   $("#addEnfantEnCharge").click(function(){               
    count = count + 1;    
    var code2 = "<tr id='row"+count+"'>";

        code2+= "<td ><input type='type' name='nomprenomE[]' class='form-control input-sm' required></td>";
        code2+= "<td><input type='date' name='datenaiss[]' class='form-control input-sm' required></td>";
        code2+= "<td><select name='sexe[]' class='form-control' required><option value=''></option><option>Masculin</option><option>Feminin</option></select></td>";
        code2+= "<td><select name='obs[]' class='form-control' required><option value=''></option><option ='Légitime'>Legitime</option><option value='Reconue'>Reconue</option><option value='Adopté'>Adopté</option></select></td>";
        code2+= "<td scope='col'><button type='button' id ='enfantRemove' data-row='row"+count+"' class='btn btn-danger btn-xs'>-</button></td>";
        code2+="</tr>";


    $("#enfant_table").append(code2);

});

$(document).on('click','#enfantRemove',function(){
    var delete_row = $(this).data('row');
    $('#'+delete_row).remove();

});

//---------
            $("#addDecoration").click(function(){               
                count = count + 1;    
                var code3 = "<tr id='row"+count+"'>";
                    code3+= "<td><select name='numdecorationcivil[]' class='form-control' required> <option value=''></option> <?php echo $deco_list ; ?></select></td>";
                    code3+= "<td><input type='text' name='decretouarrete[]' class='form-control input-sm' required></td>";
                    code3+=  "<td> <input type='text' name='anneeD[]' class='form-control input-sm' maxlength='4'  pattern='[0-9]{4}' required></td>";
                    code3+=  "<td> <input type='text' name='observation[]' class='form-control input-sm'></td>";
                    code3 +="<td><button type='button' id ='decorationRemove' data-row='row"+count+"' class='btn btn-danger btn-xs'>-</button></td>";
                    code3+= "<td scope='col'></td>";
                    code3+="</tr>";
                    
                $("#decoration_table").append(code3);

            });

            $(document).on('click','#decorationRemove',function(){
                var delete_row = $(this).data('row');
                $('#'+delete_row).remove();

            });

 //----
$("#addAffectation").click(function(){               
    count = count + 1;    
    var code3 = "<tr id='row"+count+"'>";

        code3+= "<td><input type='text' name='lieuaffect[]' class='form-control input-sm'></td>";
        code3+= "<td><select name='detachement[]' class='form-control' required> <?php echo $select_ServDet ?> </select></td>";
        code3+=  "<td><input type='text' name='fonctiontenue[]' class='form-control input-sm'></td>";
        code3+= "<td><input type='date' name='dateeffet[]' class='form-control input-sm'></td>";
        code3 +="<td><button type='button' id ='affectationRemove' data-row='row"+count+"' class='btn btn-danger btn-xs'>-</button></td>";
        code3+= "<td scope='col'></td>";
        code3+="</tr>";


    $("#affectation_table").append(code3);

});

$(document).on('click','#affectationRemove',function(){
    var delete_row = $(this).data('row');
    $('#'+delete_row).remove();

});
 //----
 $("#addConge").click(function(){               
    count = count + 1;    
    var code3 = "<tr id='row"+count+"'>";

        code3+= "<td><input type='text' name='anneeC' class='form-control input-sm'></td>";
        code3+= "<td><input type='text' name='reliquat' class='form-control input-sm'></td>";
        code3+= "<td><input type='text' name='droit' class='form-control input-sm'></td>";
        code3+= "<td><input type='date' name='date' class='form-control input-sm'></td>";
        code3 +="<td><button type='button' id ='congeRemove' data-row='row"+count+"' class='btn btn-danger btn-xs'>-</button></td>";
        code3+= "<td scope='col'></td>";
        code3+="</tr>";


    $("#conge_table").append(code3);

});

$(document).on('click','#congeRemove',function(){
    var delete_row = $(this).data('row');
    $('#'+delete_row).remove();

});

 
 //----
 $("#addEcole").click(function(){               
    count = count + 1;    
    var code3 = "<tr id='row"+count+"'>";

        code3+= "<td><input type='text' name='intitule[]' class='form-control input-sm' required></td>";
        code3+= "<td><input type='text' name='etabli[]' class='form-control input-sm' required></td>";
        code3+= "<td><input type='text' name='diplome[]' class='form-control input-sm' required></td>";
        code3+= "<td><input type='text' name='annee[]' class='form-control input-sm'></td>";
        code3 +="<td><button type='button' id ='ecoleRemove' data-row='row"+count+"' class='btn btn-danger btn-xs'>-</button></td>";
        code3+= "<td></td>";
        code3+="</tr>";


    $("#ecole_table").append(code3);

});

$(document).on('click','#ecoleRemove',function(){
    var delete_row = $(this).data('row');
    $('#'+delete_row).remove();

});
 
 
});

 </script>
