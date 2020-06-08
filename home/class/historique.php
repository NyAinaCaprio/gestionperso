<div class="row">
            <div class="col-md-12 text-justify">
                La mission de l'Intendance est de procurer au combattant une eff
                icacité maximale en contribution à son bien être, tant matériel que 
                moral et celui de sa famille. En tant que direction d'un service de
                soutien, elle est tenue de satisfaire les besoins des armées en 
                fonction des ressources et des moyens qui lui sont consentis ainsi que
                des priorités et échéances fixées par le commandement.
                Le plus grand changement concerne la scission de l'Administration militaire, jusque 
                le unique, en Direction de l'Intendance pour la partie finance, administration de soutien 
                de l'homme et en Direction des Matériels Techniques pour le soutien en maintenance. Cette 
                restructuration de l'administration militaire en 1988 entraine des modifications importantes 
                dans la chaine logistique de soutien Intendance: Etablissement Militaire de l'Industrie de Vêtement 
                (EMIV) ainsi que l'Etablissement Militaire de l'Industrie de la Chaussure (EMIC), L'Etablissement 
                de l’Imprimerie de l'Armée (EIA) sont affectes à la DMT pour la subordination, alors que l'habillement 
                fait partie normalement de la chaine soutien de l'homme. En 1994, la Direction de l'Intendance 
                de l'Armée (DIA), son appellation actuelle, remplace la Direction de l'Intendance de l'Armée Populaire.
                Le décret de modification ramène également les établissements habillement et chaussures dans les 
                girons de l'Intendance. Il à fallu attendre ainsi dix ans plus tard, l’année 2004, avant que
                l'application de cette réintégration soit réalisée. La DIA assume actuellement le rôle et les 
                attributions d'un service de l'Administration générale mais aussi logistique de l'armée. 
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <h3 class="text text-primary">LES DIRECTEURS SUCCESSIFS DE LA DIA</h3>
        </div>
        
        <div class="col-md-12 mt-4">
        <div class="row">
 
                <?php 
                $var = getDirecteur();
                foreach ($var as $value) :?>
                    <div class="col-md-4">
                        <div class="card border-info mb-3" style="max-width: 18rem;">
                            <div class="col-md-3 pull-center" >
                                <img src="spcm/public/directeurImage/<?php echo $value->photo ?>" class="user-image" width="260px" height="auto" />
                            </div>
                            <div class="card-header"><?php echo $value->grade ." " . $value->nomprenom ?></div>
                            <div class="card-body text-info">
                                <h5 class="card-title"><?php echo $value->fonction ?></h5>
                                <h5 class="card-title"><?php echo $value->periode ?></h5>
                                <p class="card-text"><?php echo $value->obs ?></p>
                            </div>
                        </div>  
                    </div>
                <?php endforeach ?>
        </div>
        </div>

<!-- <img alt="image1"  src="../image/1.JPG" width="300px " height="300px ">
<img alt="image2" src="../image/2.JPG" width="300px " height="300px ">
<img alt="image3" src="../image/3.JPG" width="300px " height="300px ">
<img alt="image4" src="../image/4.JPG" width="300px " height="300px ">
<img alt="image5" src="../image/5.JPG" width="300px " height="300px ">
<img alt="image6" src="../image/6.JPG" width="300px " height="300px ">
<img alt="image1"  src="../image/7.JPG" width="300px " height="300px ">
<img alt="image2" src="../image/8.JPG" width="300px " height="300px ">
<img alt="image3" src="../image/9.JPG" width="300px " height="300px ">
<img alt="image4" src="../image/10.JPG" width="300px " height="300px ">
<img alt="image5" src="../image/11.JPG" width="300px " height="300px ">
<img alt="image6" src="../image/12.JPG" width="300px " height="300px ">

  -->