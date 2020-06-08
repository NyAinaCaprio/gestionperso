<?php  
 
    $_SESSION['varidcivil'] = $_GET['id_civil'];
    $civil = getListcivil($_SESSION['varidcivil'])->fetch();

    $etatdeservice= getEtatdeService($_SESSION['varidcivil'])->fetch();
    $conjoint = getConjoint($_SESSION['varidcivil'])->fetch(); 
    $info = getInfo($_SESSION['varidcivil'])->fetch(); 
    $langue = getLinguistique($_SESSION['varidcivil'])->fetch();
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
                                                <h3 class="box-title">Etat civil </h3>
                                            </div>

                                            <div class="form-group">
                                                <label for="nomprenom">Nom et Prénoms</label>
                                                <input type="text" name="nomprenom" class="form-control input-sm" value='<?php echo $civil->nomprenom ?>' required>
                                            </div>
    
                                            <div class="form-group">
                                                <label for="id_categorie_civil">Catégorie *   </label>
                                                <select name="id_categorie_civil" id='id_categorie_civil' class="form-control input-sm" required>
                                                     
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
                                                    <label for="id_detache">Détachement : <span class='text text-danger' id="id_detache_error"></label>
                                                    <select id="id_detache" name="id_detache" class="form-control input-sm" >
                                                        <option value='<?php echo $civil->id_detache ?>'> <?php echo $civil->dettache ?></option>
                                                        <?php
                                                        $det = getAllDetache();

                                                        foreach($det as $route11) { ?>
                                                            <option value="<?php echo $route11->id_dettache;?>"><?php echo $route11->dettache;?></option>
                                                        <?php }?>
                                                    </select>

                                                </div>
                                            <div class="form-group">
                                                <label for="datenaisse">Date de naissance</label>
                                                <input required type="date"  maxlength="10" name="datenaisse" id="datenaisse" placeholder="Année/Mois/Jour"  class="form-control input-sm" value='<?php echo $civil->datenaisse ?>' />
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
                                                    <label for="fonction">Fonction</label>
                                                    <input required type="text" id="fonction" name="fonction" class="form-control input-sm" value='<?php echo $civil->fonction ?>'  />
                                                </div>

                                            <div class="form-group">
                                                <label for="cin">CIN : <span class='text text-danger' id="cin_error"></label>
                                                <input type="text"  maxlength="12" name="cin" id="cin" class="form-control input-sm" pattern="[0-9]{12}"  value='<?php echo $civil->cin ?>' required />
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="delivrele">Délivré le</label>
                                                <input required id="delivrele" name="delivrele" class="form-control input-sm"  placeholder="Année/Moi/Jour" value='<?php echo $civil->delivrele ?>' />
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
                                                <label for="rupture">Rupture</label>

                                                <select name="rupture" id="rupture" class="form-control input-sm">

                                                    <?php 

                                                    	$var =  getRuptureById($civil->rupture);
                                                    foreach ($var as $data): ?>
                                                    <option value='<?php echo $data->id ?>'><?php echo $data->motif ?></option>
                                                    	
                                                    <?php endforeach ?>
                                                    <?php 
                                                    	$var =  getRupture();
                                                    foreach ($var as $data): ?>
                                                    <option value='<?php echo $data->id ?>'><?php echo $data->motif ?></option>
                                                    	
                                                    <?php endforeach ?>                                                    
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
                                                    <label for="matricule">Matricule : <span class='text text-danger' id="matricule_error"></label>
                                                    <input type="text" id="matricule" name="matricule" class="form-control input-sm" value='<?php echo $etatdeservice->matricule ?>' /></td>
                                                </div>

                                                <div class="form-group">
                                                    <label for="datederecrutement">Date de recrutement</label>
                                                    <input required type="date" id="datederecrutement" name="datederecrutement" class="form-control input-sm" placeholder="Année/Moi/Jour" value='<?php echo $etatdeservice->datederecrutement ?>' />
                                                </div>


                                                <div class="form-group">
                                                    <label for="indice">Indice</label>
                                                    <input required type="text" id="indice" name="indice" class="form-control input-sm"  value='<?php echo $etatdeservice->indice ?>' />
                                                </div>

                                                <div class="form-group">
                                                    <label for="interruptiondu">Interruption du</label>
                                                    <input type="date" id="interruptiondu" name="interruptiondu" class="form-control input-sm"   value='<?php echo $etatdeservice->interruptiondu ?>' />
                                                </div>

                                                <div class="form-group">
                                                    <label for="au">au</label>
                                                    <input  type="date" id="au" name="au" class="form-control input-sm" value='<?php echo $etatdeservice->au ?>'/>
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
                                                    <input type="text" id="nomprenomC" name="nomprenomC" class="form-control input-sm" value=' <?php if ($conjoint): echo $conjoint->nomprenom?> <?php endif ?>' />

                                                </div>
                                                <div class="form-group">
                                                    <label for="datenaissance">Date de naissance</label>
                                                    <input type="date" id="datenaissance" name="datenaissance" class="form-control input-sm" placeholder="Année/Moi/Jour" value="<?php if ($conjoint) { echo $conjoint->datenaissance ;} ?>" /> 
                                                </div>
                                                <div class="form-group">
                                                    <label for="lieunaissance">Lieu de Naissance</label>
                                                    <input type="text" id="lieunaissance" name="lieunaissance" class="form-control input-sm" value='<?php if ($conjoint) { echo $conjoint->lieunaissance; } ?>' />

                                                </div>
                                                <div class="form-group">
                                                    <label for="datemarriage">Date mariage</label>
                                                    <input type="date" id="datemarriage" name="datemarriage" class="form-control input-sm" placeholder="Année/Moi/Jour" value="<?php if ($conjoint) { echo $conjoint->datemarriage; } ?>" /> 
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
                                                        <option value='<?php if ($info): echo $info->bureautique ?><?php endif ?>'><?php if ($info): echo $info->bureautique ?><?php endif ?></option>
                                                        <option value='Oui'>Oui</option>
                                                        <option value='Non'>Non</option>
                                                    </select> 

                                                </div>

                                                <div class="form-group">
                                                    <label for="autresI">Autres</label>
                                                    <textarea name='autresI' class='form-control'><?php if ($info): echo $info->autres ?> <?php endif ?></textarea>
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
                        <option value='<?php if ($langue): echo $langue->francais?><?php endif ?>'><?php if ($langue): echo $langue->francais ?> <?php endif ?></option>
                        <option value='faible'>faible</option>
                        <option value='Moyen'>Moyen</option>
                        <option value='Excellent'>Excellent</option>
                             
                    </select>
                </div>
                <div class="form-group">
                    <label > Anglais</label>
                        <select name='anglais' class='form-control'>
                            <option value='<?php if ($langue): echo $langue->anglais?><?php endif ?>'><?php if ($langue): echo $langue->anglais ?><?php endif ?></option>
                            <option value='faible'>faible</option>
                            <option value='Moyen'>Moyen</option>
                            <option value='Excellent'>Excellent</option>
                        </select>
                </div>
                <div class="form-group">
                    <label> Autres</label>
                    <input type='text' name='autresL' class='form-control' value=' <?php if ($langue): echo $langue->autres ?><?php endif ?>'> 
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
                    <input type='text' name='aP' class='form-control' value='<?php if (isset($particulier->a)): echo $particulier->a ?> <?php endif ?>'>
                </div>
                <div class="form-group">
                    <label > Catégorie </label>
                    <input type='text' name='categorieP' class='form-control' value='<?php if (isset($particulier->categorie)): echo $particulier->categorie ?> <?php endif ?>'>
                </div>
                <div class="form-group">
                   <textarea name='autresP' class='form-control'></textarea> 
                </div>
            </div>     
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
</div>


</div>
</form>   



