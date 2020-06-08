
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Direction de l'Intendance de l'Armées</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <body>
<div id="carrousel">
	<ul>
		<li><img src="../../Personnel/Public/personnelImage/DSCN2295.JPG" /></li>
		<li><img src="../../Personnel/Public/personnelImage/DSCN2296.JPG" /></li>
		<li><img src="../../Personnel/Public/personnelImage/DSCN2298.JPG" /></li>
	</ul>
</div>
<div class="controls"> <span class="prev">Precedent</span> <span class="next">Suivant</span> </div>
<!-- 
<form>
	<div id="erreur">
		<p style='display:none'>Vous n'avez pas rempli correctement les champs du formulaire !</p>
	</div>
	
	<label for="pseudo">Pseudonyme</label> 
	<input type="text" id="pseudo" class="champ" />
	<br /><br />
	
	<label for="mdp">Mot de passe</label> 
	<input type="password" id="mdp" class="champ" />
	<br /><br />
	
	<label for="confirmation">Confirmation</label>
	 <input type="password" id="confirmation" class="champ" />
	 <br /><br />
	
	<label for="mail">E-mail</label> 
	<input type="text" id="mail" class="champ" />
	<br /><br />
	
	<input type="submit" id="envoi" value="Envoyer" /> 
	
	<input type="reset" id="rafraichir" value="Rafraîchir" />
</form> -->
<!-- <p>q dq sjdgqs dgqsj dgqsjd gqsjd gqsdgjqsjdhgqsjdhgqsjdgqsjdhgqsjdssdh fjsdjg djhfsg djfhgs djfh sjfgd</p> -->
<script
src="../../assets/js/jquery-3.1.0.js" ></script>
 <script type="text/javascript">

jQuery(document).ready(function() {


		var $pseudo = $('#pseudo'),
		$mdp = $('#mdp'),
		$confirmation = $('#confirmation'),
		$mail = $('#mail'),
		$envoi = $('#envoi'),
		$reset = $('#rafraichir'),
		$erreur = $('#erreur'),
		$champ = $('.champ');

			$champ.keyup(function(){
			if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
				$(this).css({ // on rend le champ rouge
				borderColor : 'red',
				color : 'red'
			});
			}
			else{
					$(this).css({ // si tout est bon, on le rend vert
					borderColor : 'green',
					color : 'green'
					});
				}
			});

			$confirmation.keyup(function(){
				if($(this).val() != $mdp.val()){ // si la confirmation est différente du mot de passe
			$(this).css({ // on rend le champ rouge
				borderColor : 'red',
				color : 'red'
				});
			}
			else{
				$(this).css({ // si tout est bon, on le rend vert
				borderColor : 'green',
				color : 'green'
				});
			}
			});	

	function verifier(champ) {
		if (champ.val()=="") {
			$erreur.css('display', 'block');
			champ.css({ // on rend le champ rouge
				borderColor : 'red',
				color : 'red'
				});
		};
	}

	$envoi.click( function (e) {
		e.preventDefault();
		verifier($pseudo);
		verifier($mdp);
		verifier($confirmation);
		verifier($mail);
		
	});

	$reset.click( function () {
		$champ.css({
			borderColor:'#ccc',
			color:'#555'
		});
		$erreur.css('display','none');
	} );			

var $carrousel = $('#carrousel'), // on cible le bloc du carrousel
	$img = $('#carrousel img'), // on cible les images contenues dans le carrousel
	indexImg = $img.length - 1, // on définit l'index du dernier élément
	i = 0, // on initialise un compteur
	$currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)

	$img.css('display', 'none'); // on cache les images
	$currentImg.css('display', 'block'); // on affiche seulement l'image courante
	//$carrousel.append('<div class="controls"> <span class="prev">Precedent</span> <span class="next">Suivant</span> </div>');


	$('.next').click(function(){ // image suivante
		i++; // on incrémente le compteur
		if( i <= indexImg ){
			$img.css('display', 'none'); // on cache les images
			$currentImg = $img.eq(i); // on définit la nouvelle image
			$currentImg.css('display', 'block'); // puis on l'affiche
		}
		else{
				i = indexImg;
			}
		});
		$('.prev').click(function(){ // image précédente
			i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"
		if( i >= 0 ){
			$img.css('display', 'none');
			$currentImg = $img.eq(i);
			$currentImg.css('display', 'block');
		}
		else{
			i = 0;
			}
		});

		function slideImg(){
			setTimeout(function(){ // on utilise une fonction anonyme
				if(i < indexImg){ // si le compteur est inférieur au dernier index
					i++; // on l'incrémente
				}
			else{ // sinon, on le remet à 0 (première image)
					i = 0;
				}
				$img.css('display', 'none');
				$currentImg = $img.eq(i);
				$currentImg.css('display', 'block');
				slideImg(); // on oublie pas de relancer la fonction à la fin
				}, 7000); // on définit l'intervalle à 7000 millisecondes (7s)
				}
			slideImg(); // enfin, on lance la fonction une première fois


});  
 </script>
 
 </body>
 </html>