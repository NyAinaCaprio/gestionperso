Et vous pouvez ensuite faire ceci pour chaque type d'input !

ex: $('input:button');

text (Texte) input:text
password (Mot de passe) input:password
file (Fichier) input:file
checkbox (Case à cocher) input:checkbox
radio (Bouton radio) input:radio
button (Bouton normal) input:button
submit (Bouton d'envoi) input:submit

Ainsi, vous pouvez vérifier qu'une case est cochée, ou qu'un élément est activé/désactivé, grâce aux sélecteurs suivants :

:checked vérifie qu'une case est cochée ;
:disabled cible les éléments désactivés ;
:enabled fait le contraire, il sélectionne les éléments activés.

le mot-clé this représente l'objet courant

EX: 
$('p').each(function(){
$(this).html('Hello World !'); // $(this) représente le paragraphe courant
});

Les fonctions 

Clic :  click()
Double-clic:  dblclick()
Passage de la souris:  hover()
Rentrer dans un élément : mouseenter()
Quitter un élément : mouseleave()
Presser un bouton de la souris : mousedown()
Relâcher un bouton de la souris:  mouseup()
Scroller (utiliser la roulette) : scroll()

Ecoute sur le clavier

keydown(), qui se lance lorsqu'une touche du clavier est enfoncée ;
keypress(), qui se lance lorsqu'on maintient une touche enfoncée ;
keyup(), qui se lance lorsqu'on relâche une touche préalablement enfoncée.


EX :
$(document).keyup(function(touche){ // on écoute l'évènement keyup()
var appui = touche.which || touche.keyCode; // le code est compatible tous navigateurs grâce à ces deux propriétés
if(appui == 13){ // si le code de la touche est égal à 13
(Entrée)
alert('Vous venez d\'appuyer sur la touche Entrée !'); // on
affiche une alerte

CAS DES FORMULAIRE

Focalisation focus()
Sélection (p.e. dans une liste) select()
Changement de valeur change()
Envoi du formulaire submit()

// déclenche l'action au chargement du script

$('p').click(function(){
alert('Cliqué !');
});
$('p').trigger('click'); 

//on declenche 2 Methodes en une seule fois
$('#add').on({
    click : function(){
    alert('Vous avez cliqué !');
},
    mouseup : function(){
    alert('Vous avez relâché le clic !');
}
});


// annule l'action du lien

$('a').click(function(e){
e.preventDefault(); 
});

la méthode live(), pour déléguer un évènement à un élément créé dynamiquement
contrairement à on(), qui cible directement un élément
La fonction delegate() est presque autant utilisée que live()

/*le type d'évènement ;
l'élément sur lequel on veut faire une délégation ;
et la fonction de retour.*/

$('div').on('click', 'p', function(){
	alert('Les paragraphes créés peuvent être cliqués !');
});

offset(), qui définit la position d'un élément par rapport au document, c'est donc une position absolue ;
position(), qui définit la position d'un élément par rapport à son parent, c'est donc une position relative.


$('p').css({
color : 'red', // couleur rouge
width : '300px', // largeur de 300px
height : '200px' // hauteur de 200px
});


$('p').css({
borderColor : 'red', // bordure rouge
paddingRight : '30px', // marge intérieure de 30px
'margin-left' : '10px' // marge extérieure de 10px
});

$('p').offset().left; // retourne la valeur "left" de l'élément
(position absolue)
$('p').position().top; // retourne la valeur "top" de l'élément
(position relative)

$('p').height(); // retourne la hauteur stricte du paragraphe
$('p').innerWidth(); // retourne la largeur (avec marges
intérieures) du paragraphe
$('p').outerWidth(); // retourne la largeur (avec marges intérieures
+ bordures) du paragraphe
$('p').outerHeight(true); // retourne la hauteur (avec marges
intérieures + bordures + marges extérieures) du paragraphe

vous pourriez vérifier le format de l'adresse e-mail, 
grâce à une expression régulière, faite avec l'objet Regex de JavaScript

duration : le temps de déroulement de l'animation, toujours en millisecondes ;
easing : la façon d'accélerer de l'animation, c'est-à-dire comment va-t-elle évoluer au cours du temps ;
complete : et enfin une fonction de callback, qui est l'action appelée lorsque l'animation est terminée.

slow, qui équivaut à une durée de 600 millisecondes ;
normal, la valeur par défaut, qui est égale à 400 millisecondes ;
et fast, qui représente une durée de 200 millisecondes seulement.

	$('p').animate({
	width : '150px'
	}, 'fast'); // premier exemple avec la valeur fast (200ms)
	$('p').animate({
	width : '150px'
	}, 1000); // second exemple avec 1000ms (= 1s)


	$('p').animate({
	width : '500px'
	}, 'linear'); // l'animation se déroulera de façon linéaire

	$('p').animate({
	width : '150px'
	}, function(){
		alert('Animation terminée !');
	});

		$('p').animate({
	width : '150px'
	}, function(){
	alert('Animation terminée !');
	});


	$('p').animate({
	width : '150px'
	}, 1000, 'linear', function(){
	alert('Animation terminée !');
	});


	function maBoucle(){
		setTimeout(function(){
			alert('Bonjour !'); // affichera "Bonjour !" toutes les secondes
		maBoucle(); // relance la fonction
		}, 3000);
	}
	maBoucle(); // on oublie pas de lancer la fonction une première fois
//Animé vos elements et les pérsonnalisés



















