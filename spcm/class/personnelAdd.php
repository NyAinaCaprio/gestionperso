<?php 
/*    var_dump($_SESSION['auth']);
    die();
*/

$deco_list = select_deco();
$select_ServDet = SelectBox_affect_Succ();

if ( array_key_exists('message', $_SESSION)) : ?>
        <ul>
            <?php foreach ($_SESSION['message'] as $key => $messages) :   ?>
            <li>
                <div class='alert alert-<?php echo $key ?>'>
                    <?php echo $messages ?>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
<?php endif ?>
<?php unset($_SESSION['message']) ?>

        <form action="class/addPers.php" method="post"  enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div id="centre" class="box-header with-border">
                        
                           <div class="login-social-link centered">
                                <div id="msgerreur" class="alert alert-danger" style='display:none'></div>
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
                            
                                  <div class="row animated animate flipInY">
                                      <div class="col-md-6">
                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="alert alert-info">Etat civil</h3>
                                            </div>

    
                                            <div class="form-group">
                                                <label for="nomprenom">Nom et Prénom: </label>
                                                <input type="text"  name="nomprenom"  class="form-control input-sm" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_categorie_civil">Catégorie * : </label>
                                                <select name="id_categorie_civil" id="id_categorie_civil"   class="form-control input-sm" required>
                                                    <option value=""></option>
                                                    <?php $cat = getAllCategorie(); 
                                                    foreach($cat as $route) : ?>
                                                        <option value="<?php echo $route->id_categorie_civil;?>"><?php echo $route->categorie_civil ?></option>
                                                    <?php endforeach ?>
                                                </select>   
                                            </div>

                                            <div class="form-group">
                                                <label for="id_etsouservice">ETS ou Service : <span  class='text text-danger' id="id_etsouservice_error"></span> </label>
                                                <select name="id_etsouservice" id="id_etsouservice"  class="form-control input-sm" >
                                                    <option value="1"></option>
                                                    <?php
                                                    $ets = getAllEtsouservice();
                                                    foreach($ets as $route) { ?>
                                                        <option value="<?php echo $route->id_etsouservice;?>"><?php echo $route->etsouservice;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                    <label for="id_detache" >Détachement : <span class='text text-danger' id="id_detache_error"></span> </label>
                                                    <select   name="id_detache" id="id_detache" class="form-control input-sm" >
                                                        <?php
                                                        $det = getAllDetache();

                                                        foreach($det as $data) { ?>
                                                            <option value="<?php echo $data->id_dettache;?>"><?php echo $data->dettache;?></option>
                                                        <?php }?>
                                                    </select>

                                                </div>

                                            <div class="form-group">
                                                <label for="sexe">Sexe: </label>
                                                <select  name="sexe" class="form-control input-sm" required>
                                                    <option> </option>
                                                    <option>M</option>
                                                    <option>F</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="cin" >CIN :<span  class='text text-danger' id="cin_error"></span>  </label> 
                                                <input type="text"  maxlength="12" name="cin" id="cin"  class="form-control input-sm" pattern="[0-9]{12}"  required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="datenaisse">Date de naissance : </label>
                                                <input type="date"  maxlength="10" name="datenaisse"   placeholder="Année/Mois/Jour" class="form-control input-sm"  required  />
                                            </div>

                                            <div class="form-group">
                                                <label for="delivrele">Délivré le : </label>
                                                <input type="date"   name="delivrele" class="form-control input-sm"  placeholder="Année/Moi/Jour" required  />
                                            </div>
                                            <div class="form-group">
                                                <label for="a">à : </label>
                                                <input type="text"   name="a" class="form-control input-sm" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="lieudenaiss">Lieu de naissance : </label>
                                                <input type="text" name="lieudenaiss" class="form-control input-sm" required  />
                                            </div>
                                            <div class="form-group">
                                                <label for="adresseactuelle">Adresse actuelle: </label>
                                                <input type="text" name="adresseactuelle" class="form-control input-sm" required  />
                                            </div>
                                            <div class="form-group">
                                                <label for="mail">Mail: </label>
                                                <input type="mail"  name="mail" class="form-control input-sm" />
                                            </div>
                                            <div class="form-group">
                                                <label for="telephone">Téléphone : </label>
                                                <input type="telephone" maxlength="10"  name="telephone" class="form-control input-sm" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="situationmatri">Situation matrimoniale : </label>
                                                <select   name="situationmatrimonial" class="form-control input-sm">
                                                    <option>Marié</option>
                                                    <option>Divorcé</option>
                                                    <option>Veuf(ve)</option>
                                                    <option>Célibataire</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="groupesanguin">groupesanguin: </label>
                                                <input type="text"   name="groupesanguin" class="form-control input-sm" />

                                            </div>
                                            <div class="form-group">
                                                <label for="groupeethnique">Groupe Ethnique: </label>
                                                <input type="text"  name="groupeethnique" class="form-control input-sm" />

                                            </div>

                                            <div class="form-group">
                                                <label for="religion">Religion: </label>

                                                <select name="religion"  class="form-control input-sm">
                                                    <option>- </option>
                                                    <option>Protestant</option>
                                                    <option>Catholique</option>
                                                    <option>Musulman</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Photo : </label>
                                                <input type="file" name="image"  class="" />
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                            <div class="box box-info">
                                                <div class="box-header">
                                                    <h3 class="alert alert-info ">Etat de service </h3>
                                                </div>

                                                <div class="form-group">
                                                    <label for="affectionactuelle">Affectration actuelle: </label>
                                                    <input type="text"   name="affectionactuelle" class="form-control input-sm" required/>

                                                </div>
                                                <div class="form-group">
                                                    <label for="direction">Direction : </label>
                                                    <input type="text"  name="direction" class="form-control input-sm" required />
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="matricule">Matricule : <span class='text text-danger' id="matricule_error"></span> </label>
                                                    <input type="text"  name="matricule" id="matricule" class="form-control input-sm" /></td>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fonction">Fonction : </label>
                                                    <input type="text"   name="fonction" class="form-control input-sm" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="datederecrutement">Date de recrutement : </label>
                                                    <input type="date"  name="datederecrutement" class="form-control input-sm" placeholder="Année/Moi/Jour"  required />
                                                </div>


                                                <div class="form-group">
                                                    <label for="indice">Indice : </label>
                                                    <input type="text"  name="indice" class="form-control input-sm" required />
                                                </div>

                                                <div class="form-group">
                                                    <label for="interruptiondu">Interruption du : </label>
                                                    <input type="date"  name="interruptiondu" class="form-control input-sm" placeholder="Année/Moi/Jour"  />
                                                </div>

                                                <div class="form-group">
                                                    <label for="au">au : </label>
                                                    <input  type="date"   name="au" class="form-control input-sm" placeholder="Année/Moi/Jour" />
                                                </div>


                                                <div class="form-group">
                                                    <label for="sortantecole">Sortant ecole : </label>
                                                    <input type="text"   name="sortantecole" class="form-control input-sm" />

                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="box box-info">
                                                <div class="box-header">
                                                    <h3 class="box-title">Conjoint(e) </h3>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nomprenomC">Nom et prénom : </label>
                                                    <input type="text"  name="nomprenomC" class="form-control input-sm" />

                                                </div>
                                                <div class="form-group">
                                                    <label for="datenaissance">Date de naissance  : </label>
                                                    <input type="date" name="datenaissance" class="form-control input-sm"  />
                                                </div>
                                                                                                </div>
                                                <div class="form-group">
                                                    <label for="lieunaissance">Lieu de naissance : </label>
                                                    <input type="text"  name="lieunaissance" class="form-control input-sm"  />
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="datemarriage">Date du mariage : </label>
                                                    <input type="date" name="datemarriage" class="form-control input-sm"  />
                                                </div>
                                
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box box-info">
                                                <div class="box-header">
                                                    <h3 class="box-title">Aptidute Particulier </h3>
                                                </div>

                                                <div class="form-group">
                                                    <label for="permis">Permis  : </label>
                                                    <input type="text"  name="permis" class="form-control input-sm" />

                                                </div>
                                                <div class="form-group">
                                                    <label for="delivrele">Date de naissance  : </label>
                                                    <input type="date" name="delivreleP" class="form-control input-sm"  />
                                                </div>                                            
                                                <div class="form-group">
                                                    <label for="a">à : </label>
                                                    <input type="text"  name="aP" class="form-control input-sm"  />
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="categorie">Catégorie : </label>
                                                    <input type="texte" name="categorieP" class="form-control input-sm"  />
                                                </div>
                                                <div class="form-group">
                                                    <label for="autres">Autres : </label>
                                                    <textarea class="form-control" name='autresP' ></textarea>
                                                </div>                                
                                        </div>                                        
                                        </div>
                                    </div>
                                <hr>
 
 
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="alert alert-info">Aptitude informatique </h3>
                </div>

                <div class="form-group">
                    <label for="bureautique">Bureatique : </label>
                    <select required name='bureautique' class='form-control'>
                        <option value='Non'>Non</option>
                        <option value='Oui'>Oui</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="autres">Autres : </label>
                    <textarea name='autresB' class='form-control' ></textarea>
                </div>
            </div>
        </div>
    

        <div class="col-md-6">
           <div class="box box-info">
                <div class="box-header">
                    <h3 class="alert alert-info">Aptitude linguistique </h3>
                </div>

                <div class="form-group">
                    <label for="arancais">Francais : </label>
                    <select required name='francais' class='form-control'>                        
                        <option value='Faible'>Faible</option>
                        <option value='Moyenne'>Moyenne</option>
                        <option value='Excellent'>Excellent</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="anglais">Anglais : </label>
                    <select required name='anglais' class='form-control'>
                        <option value='Faible'>Faible</option>
                        <option value='Moyenne'>Moyenne</option>
                        <option value='Excellent'>Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="autres">Autres : </label>
                    <textarea name='autresL' class='form-control'></textarea>
                </div>

            </div>
        </div>

 
 

<div class="rox">
    <div class='col-md-12'>
    <div class="col-md-6">
            <table class="table table-bordered" id="addAvancementSucc_table">
          <thead>
            <tr>
                <th scope="col" colspan="5" >
                    <div class="box-header">
                        <h3 class="alert alert-info">Avancements Successifs </h3>
                    </div>
                </th>  
            </tr>
            <tr>
                <th width="20%">Statut</th>
                <th width="30%">Reférence</th>
                <th width="20%">Date Effet</th>
                <th width="20%"> <button type="button" name="addAvancementSucc" id="addAvancementSucc" class="btn btn-success btn-xs">+</button></th>
                

            </tr>
          </thead>
          <tbody>
            <tr>
            </tr>
             </tbody>
        </table>
    </div>

     <div class="col-md-6">
            <table class="table table-bordered" id="enfant_table">
          <thead>
            <tr>
                <th scope="col" colspan="6" >
                    <div class="box-header">
                        <h3 class="alert alert-info">Enfant </h3>
                    </div>
                </th>  
            </tr>
            <tr>
                <th width="40%">Nom et Prénom(s)</th>
                <th width="30%">Date de naissance</th>
                <th width="10%">Sexe</th>
                <th>Obs.</th>
                <th width="10%"><button type="button" name="addEnfantEnCharge" id="addEnfantEnCharge" class="btn btn-success btn-xs">+</button></th>
                <th width="10%"></th>

            </tr>
          </thead>
          <tbody>
            <tr>
            </tr>
        </tbody>
        </table>
    </div>
    <div class="col-md-6">
            <table class="table table-bordered" id="decoration_table">
          <thead>
            <tr>
                <th scope="col" colspan="6" >
                    <div class="box-header">
                        <h3 class="alert alert-info">Décoration </h3>
                    </div>
                </th>  
            </tr>
            <tr>
                <th scope="col">Intitulé décoration</th>
                <th scope="col">Décret ou arrêté</th>
                <th scope="col">Année</th>
                <th scope="col">Observation</th>
                <th scope="col"><button type="button" name="addDecoration" id="addDecoration" class="btn btn-success btn-xs">+</button></th>
                <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            <tr>
                
            </tr>
             
          </tbody>
        </table>
    </div>

    <div class="col-md-6">
            <table class="table table-bordered" id="affectation_table">
          <thead>
            <tr>
                <th scope="col" colspan="6" >
                    <div class="box-header">
                        <h3 class="alert alert-info">Afféctions successives </h3>
                    </div>
                </th>  
         </tr>
            <tr>
                <th scope="col">Lieu d'affectation</th>
                <th scope="col">Détachement</th>
                <th scope="col">Fonction tenue</th>
                <th scope="col">Date Effet</th>
                <th scope="col"><button type="button" name="addAffectation" id="addAffectation" class="btn btn-success btn-xs">+</button></th>
                <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            <tr>

              
            </tr>
             
          </tbody>
        </table>
    </div>
    <div class="col-md-6">
            <table class="table table-bordered" id="conge_table">
          <thead>
            <tr>
                <th scope="col" colspan="6" >
                    <div class="box-header">
                        <h3 class="alert alert-info">Congé</h3>
                    </div>
                </th>  
            </tr>
                 <tr>
                    <th scope="col">Année</th>
                    <th scope="col">Reliquat</th>
                    <th scope="col">Droit</th>
                    <th scope="col">Total</th>
                    <th scope="col"><button type="button" name="addConge" id="addConge" class="btn btn-success btn-xs">+</button></th>
                    <th scope="col">-</th>

                </tr>
            </thead>
            <tbody>
            <tr></tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-6">
        <table class="table table-bordered" id="ecole_table">
          <thead>
            <tr>
                <th scope="col" colspan="6" >
                    <div class="box-header">
                        <h3 class="alert alert-info">Ecole / Formation / Stages </h3>
                    </div>
                </th>  
            </tr>
            <tr>
                <th scope="col">Intitulé</th>
                <th scope="col">Ecoles / Institutions/Etablissements</th>
                <th scope="col">Diplômes/ Certificat</th>
                <th scope="col">Année</th>
                <th scope="col"><button type="button" name="addEcole" id="addEcole" class="btn btn-success btn-xs">+</button></th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
                <tr></tr>
             
                </tbody>
            </table>
        </div>
        </div>
        </div>
    </div>  
</div>    
    <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="enregistrer" class="btn btn-success animated animate flip"><i class="fa fa-save fa-2x"></i> Enregistrer</button>
                                </div>  

                            </div>
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
        code3+= "<td><input type='text' name='total' class='form-control input-sm'></td>";
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