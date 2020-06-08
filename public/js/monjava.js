// JavaScript Document

$(document).ready(function()
{

        var $confirmation= $("#cin");
        
        $confirmation.keyup(function(){
            var cin = $(this).val();
            $.ajax({
            type:"POST",
            data:"cin="+cin,       
           
           url:"class/verifcin.php",
           success:function(result){
              $('#cin_error').html(result);
               }
           });
              
        }); 


        var $id_categorie_civil= $("#id_categorie_civil");
        
        $id_categorie_civil.change(function(){
            var id_categorie_civil = $(this).val();
                if (id_categorie_civil== 2 ) {
                    $('#matricule_error').html('ECD doit être sans matricule !');
                     
                }

                else if (id_categorie_civil == 3 || id_categorie_civil == 4) {
                     $('#matricule_error').html('Matricule doit être rempli !');  
                }else{
                     $('#matricule_error').html("");  

                }
        }); 
            
              

/*
        function slideImg(){
        var id_categorie_civil= $("#id_categorie_civil").val();
        var matricule= $('#matricule').val();
        var id_etsouservice= $('#id_etsouservice').val();
        var id_detache= $('#id_detache').val();
            setTimeout(function(){ // on utilise une fonction anonyme
                else if (id_categorie_civil == 4 && matricule == "") {
                     $('#matricule_error').html('Matricule doit être rempli !'); 
                } 

                else if (id_etsouservice > 1  && id_detache > 1 ) {
                     $('#id_detache_error').html(' Est ce vraiment détaché ?');
                }else{

                }
                slideImg(); // on oublie pas de relancer la fonction à la fin
                }, 1000); // on définit l'intervalle à 7000 millisecondes (7s)
                }
            slideImg(); // enfin, on lance la fonction une première fois
*/

        function attente(){
        $("#msgerreur").show();
        $("#msgerreur").delay(10000).hide(0);
        }
 
});
 
	 
 

//Enregistrement Personnel Civil
/*
$(document).on('submit','.personnel',function(e){

    e.preventDefault();


   var confirmer = confirm("ETES VOUS SUR ?");
    if (confirmer == true) {
    $form = $(this);

    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post','codeajoutperscivil.php');
    request.send(formdata);

        $.get('fichepersonnelcivil.php', {
            id_civil:id_civil},function(result){
            $('#centre').html(result);
        });

        gauche();
        gauche();
    }
else {

}

});
*/ 

function recherchecivilparnom(){

var critere= $('.critere').val();
if (critere=="") {

}
else{
$.post('class/listecivilerech.php',{
critere:critere
},function(data1){
$('#centre').html(data1);
																				 
});}
}


function rechconsultation()
{
    var choix = document.form2.choix.value;
    var selection = document.form2.selection.value;
    var categorie= $('.categorie').val();
    var critere= $('.moncritere').val();
    var anneesce= $('.anneesce').val();
    var etsouservice = $('.etsouservice').val();
    var id_dettache = $('.id_dettache').val();
    var variable = categorie+choix+selection;



        $.post('listingcivil.php',{
        critere:critere,
        categorie:categorie,
        anneesce:anneesce,
        choix:choix,
        selection:selection,
        etsouservice:etsouservice,
        id_dettache:id_dettache},function(data){
        $('#listingperscivil').html(data);

        });
 
}

$(document).delegate('.verspdf','click',function(){
var id_civil = $(this).data('id');
var Supprimer = "ok";

$.ajax({
	   url:"detailfichepersonnelcivilpdf.php",
	   methode:"POST",
	   data:{id_civil:id_civil},
	   dataType:"text",
	   
	   });


});


/*

$(document).on('submit','.monform',function(e){
e.preventDefault();
$form = $(this);
exportversexcel($form);
});

function exportversexcel($form){
var critere= $('.critere').val();
var categorie= document.form2.categorie.value;
var choix = document.form2.choix.value;
var selection = document.form2.selection.value;
var etsouservice = document.form2.etsouservice.value;
var id_dettache = document.form2.id_dettache.value;
var id_rattache = document.form2.id_rattache.value;

$.post('listingcivil.php',{
critere:critere,	   
categorie:categorie,
choix:choix,
selection:selection,
etsouservice:etsouservice,
id_dettache:id_dettache,
id_rattache:id_rattache});

var formdata = new FormData($form[0]);
var request = new XMLHttpRequest();
request.open('post','exportexcel.php');
request.send(formdata);

consultation();

}

*/

$('#load').click(function(event){
	event.preventDefault();
	$.ajax({
		   url:"exportexcel.php",
		   methode:"post", 
		   })
	
});

$(document).delegate('.voirlapersonne','click',function(){
var id = $(this).data('id');
$.post('detailfichepersonnelcivil.php',{

id_civil:id },function(data){
$('#centre').html(data);
													 
});
});

$(document).delegate('.editconsultcivil','click',function(){



        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
		var id_civil = $(this).data('id');
        xmlhttp.open("POST","class/fichepersonnelcivil.php?id_civil="+id_civil,true);
        xmlhttp.send();
													 
});


		

/*function enregmodifETcivil(){
var id_civil= $('.id_civil').val();
var nomprenom= $('.nomprenom').val();
var jour= $('.jour').val();
var mois = $('.mois').val();
var annee = $('.annee').val();
var lieudenaiss= $('.lieudenaiss').val();
var cin= $('.cin').val();
var delivrele= $('.delivrele').val();
var a= $('.a').val();
var sexe= $('.sexe').val();
var adresseactuelle= $('.adresseactuelle').val();
var mail= $('.mail').val();
var situationmatrimonial= $('.situationmatrimonial').val();
var groupesanguin= $('.groupesanguin').val();
var groupeethnique= $('.groupeethnique').val();
var religion= $('.religion').val();
var id_categorie_civil= $('.id_categorie_civil').val();
var id_etsouservice= $('.id_etsouservice').val();
var telephone= $('.telephone').val();
var retraite=$('.retraite').val();
var Enregistrer="ok";
var ajoutpers="";
 

$.post('codemodifetatcivilcivil.php',{
id_civil:id_civil,
nomprenom:nomprenom,
sexe:sexe,
jour:jour,
mois:mois,
annee:annee,
lieudenaiss:lieudenaiss,
cin:cin,
delivrele:delivrele,
a:a,
adresseactuelle:adresseactuelle,
mail:mail,
situationmatrimonial:situationmatrimonial,
groupesanguin:groupesanguin,
groupeethnique:groupeethnique,
religion:religion,
id_categorie_civil:id_categorie_civil,
id_etsouservice:id_etsouservice,
telephone:telephone,
retraite:retraite,
Enregistrer:Enregistrer});


$.post('fichepersonnelcivil.php',{
id_civil:id_civil,
ajoutpers:ajoutpers},function(data){
$('#centre').html(data);
													 
});
}
*/

function affichemodifetatdeservicecivil(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","modifetatdeservicecivil.php",true);
        xmlhttp.send();
}


$(document).on('submit','.etatdeservice',function(e) {
    e.preventDefault();
    var confirmer = confirm("ETES VOUS SUR ?");
    if(confirmer==true){
        $form = $(this);
        var formdata = new FormData($form[0]);
        var request = new XMLHttpRequest();
        request.open('post', 'codeetatdeservice.php');
        request.send(formdata);

        affichefichepersonnelcivil();
        affichefichepersonnelcivil();
	}
});


function affichemodifaffectationsuccessivescivil() {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","modifaffectationsuccessivescivil.php",true);
        xmlhttp.send();
  
}

/*function affichemodifaffectationsuccessivescivil(){
	var id_civil = $('.id_civil').val();
	$.post('modifaffectationsuccessivescivil.php',{
idcivil:id_civil},function(donnees){
$('#centre').html(donnees);
																				 
});
}
*/

$(document).delegate('.Editeffectsucccivil','click',function(){
var id = $(this).data('id');

$.post('modifaffectsucc01civil.php',{
numaffectciv:id},function(data){
$('#miseajour').html(data);
													 
}); });

function ajoutmodifaffectationsuccessivescivil(){    //dans chargercategorie on met la fonction charger produits
	var Enregistrer = "";
	$.post("affectationsuccessivescivil.php",{
		   Enregistrer:Enregistrer},	
	
	function(rep)
	{
				$("#miseajour").html(rep);


	});}


$(document).on('submit','.affectation',function(e) {
    e.preventDefault();
    $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codeaffectation.php');
    request.send(formdata);

    affichemodifaffectationsuccessivescivil();
    affichemodifaffectationsuccessivescivil();
    affichemodifaffectationsuccessivescivil();
});


$(document).delegate('.deleteaffectation','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer == true) {
var id = $(this).data('id');
var supprimer = "ok";
var id_civil= $('.id_civil').val();

$.post('codeaffectation.php',{
numaffectciv:id,
supprimer:supprimer});
	affichemodifaffectationsuccessivescivil();
	affichemodifaffectationsuccessivescivil();
}
else
{
//affichemodifaffectationsuccessivescivil();

}

});

/*$(document).delegate('.supprtout','click',function(){
var confirmer = confirm("ETES VOUS SUR?");
if (confirmer==true){
var message = "Vous avez pas le droit";
alert(message);
}
else
{

}
gauche();
});
*/
$(document).delegate('.supprtout','click',function(){
var confirmer = confirm("ETES VOUS SUR?");

if (confirmer==true){
	//alert("VOUS N'AVEZ PAS LE DROIT ! ");
	//exit();
var id = $(this).data('id');
var Supprimer = "ok";

		$.post('supprtout.php',{
				id_civil:id,
				Supprimer:Supprimer}
				);
		var critere="";
			$.post('listecivilerech.php',{
			critere:critere
			},function(data1){
			$('#centre').html(data1);

			});

		var msgerreur = "Suppression en cours ...";
		$("#msgerreur").html(msgerreur).css( "background", "green").css( "color", "white");
		attente();
}
else
{

}

});



function affichemodifetatdeservicecivil(){
	var id_civil = $('.id_civil').val();
	
	$.post('modifetatdeservicecivil.php',{
id_civil:id_civil},function(donnees){
$('#centre').html(donnees);
																				 
});
}
<!---------------------Conjoint (e)-->
function affichemodifconkointcivil()
{
    $.post("modifconjoint_civil.php",
		function(rep)
        {
            $("#centre").html(rep);
        })

}

function enregconjoint_civil(){
var id_civil= $('.id_civil').val();
var nomprenom= $('.nomprenom').val();
var datenaissance= $('.datenaissance').val();
var lieunaissance= $('.lieunaissance').val();
var datemarriage= $('.datemarriage').val();
var Enregistrer="ok";

$.post('conjoint_civil.php',{
id_civil:id_civil,
nomprenom:nomprenom,
datenaissance:datenaissance,
lieunaissance:lieunaissance,
datemarriage:datemarriage,
Enregistrer:Enregistrer});

affichemodifconkointcivil();
}




$(document).delegate('.editconjointcivil','click',function(){
	 var id = $(this).data('id');

$.post("modifconjoint_civil01civil.php",{
	   numconjoint:id
	},
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	
});


$(document).delegate('.addconjointcivil','click',function(){
$.post("conjoint_civil.php",
	function(rep)
	{
 		$("#miseajour").html(rep);
	});	
	
});


   $(document).on('submit','.conjoint',function(data) {
    data.preventDefault();
        $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codeconjoint.php');
    request.send(formdata);

    affichemodifconkointcivil()
    affichemodifconkointcivil()
    affichemodifconkointcivil()

    gauche();
    gauche();

});
$(document).delegate('.deleteconjointcivil','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var  supprimer="ok";
		var id = $(this).data('id');

		$.post('codeconjoint.php',{
		numconjoint:id,
		supprimer:supprimer});
affichemodifconkointcivil();
affichemodifconkointcivil();
		gauche();
	}
else
	{
	
	}
});
/*Enfant*/

function affichemodifenfant_civil(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","modifenfant_civil.php",true);
        xmlhttp.send();
}

 $(document).delegate('.editmodifenfant_civil01civil','click',function(){
	var numenfant = $(this).data('id');
	var supprimer = "ok";

$.post("modifenfant_civil01civil.php",{
	   	numenfant:numenfant,
		supprimer:supprimer},
	function(rep)
	{
				$("#miseajour").html(rep);
	});	
});

function addenfant(){
var Enregistrer ="";
$.post("enfant_civil.php",{Enregistrer:Enregistrer},	
	
	function(rep)
	{
				$("#miseajour").html(rep);


	});	
}

<!--Ajout enfant-->
$(document).on('submit','.enfant',function(e) {
    e.preventDefault();
    $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codeenfant.php');
    request.send(formdata);

    affichemodifenfant_civil();
    affichemodifenfant_civil();
});

<!--Suppr enfant-->	
 $(document).delegate('.deletemodifenfant_civil01civil','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var numenfant = $(this).data('id');
		var supprimer = "ok";

		$.post("codeenfant.php",{numenfant:numenfant,supprimer:supprimer});

		affichemodifenfant_civil();
		affichemodifenfant_civil();
	}
else
	{
		
	}
});
 <!--Avancement successive-->
function affichemodifavancementsuccessifscivil(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else
            {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","modifavancementsuccessifscivil.php",true);
        xmlhttp.send();
}

function avancementsuccessifscivil(){
	var Enregistrer="";
$.post("avancementsuccessifscivil.php",{Enregistrer:Enregistrer},
	
	function(rep)
	{
				$("#miseajour").html(rep);


	});	
}

$(document).delegate('.Editavancsucc','click',function(){
		var numavancementsucc = $(this).data('id');
		$.post("modifavancementsuccessifs01civil.php",{
	   numavancementsucc:numavancementsucc},

	function(rep)
	{
				$("#miseajour").html(rep);

	});	
});


$(document).on('submit','.avancement',function(e) {
    e.preventDefault();
    $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codeavancement.php');
    request.send(formdata);

    affichemodifavancementsuccessifscivil();
    affichemodifavancementsuccessifscivil();
gauche();

});




/*Suppr avancement successifs*/


$(document).delegate('.Deleteavancsucc','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var id = $(this).data('id');
		var supprimer = "ok";
	
		$.post('codeavancement.php',{
		numavancementsucc:id,
		supprimer:supprimer});
		affichemodifavancementsuccessifscivil();
		affichemodifavancementsuccessifscivil();
		gauche()
	}
});

/* Suppr ECOLE - FORMATION - STAGE MODIFICATION */

$(document).on('submit','.ecole',function(e) {
    e.preventDefault();
    $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codeecole.php');
    request.send(formdata);

    affichemodifecoleformationstagecivil();
    affichemodifecoleformationstagecivil();
    gauche();

});

function affichemodifecoleformationstagecivil(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","modifecoleformationstagecivil.php",true);
        xmlhttp.send();

}

function ecoleformationstagecivil(){
	var id_civil = $('.id_civil').val();
$.post("ecoleformationstagecivil.php",{
	   id_civil:id_civil},
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

}



$(document).delegate('.editecole','click',function(){
	var numecole= $(this).data('id');
$.post("modifecoleformationstage01civil.php",{
	   numecole:numecole},

    function(rep)
    {
        $("#miseajour").html(rep);

    });

gauche();
});



$(document).delegate('.deleteecole','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var id = $(this).data('id');
		var supprimer = "ok";
	
		$.post('codeecole.php',{
		numecole:id,
		supprimer:supprimer});
		affichemodifecoleformationstagecivil();
		affichemodifecoleformationstagecivil();
	gauche();
	}
else
	{
	
	}
});

/* Aptitude */

$(document).on('submit','.linguistique',function(e) {
    e.preventDefault();
    $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codelinguistique.php');
    request.send(formdata);

    affichemodifaptitudelinguistiquecivil();
    affichemodifaptitudelinguistiquecivil();
    gauche();

});
function affichemodifaptitudelinguistiquecivil(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","modifaptitudelinguistiquecivil.php",true);
        xmlhttp.send();
}

function addaptitudelinguistiquecivil(){
var id_civil = $('.id_civil').val();
$.post("aptitudelinguistiquecivil.php",{
	   id_civil:id_civil},
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

}

function enregaptitudelinguistiquecivil(){
var id_civil= $('.id_civil').val();
var francais= $('.francais').val();
var anglais= $('.anglais').val();
var autres= $('.autres').val();
var Enregistrer="ok";

$.post('aptitudelinguistiquecivil.php',{
id_civil:id_civil, 
francais:francais,
anglais:anglais,
autres:autres,
Enregistrer:Enregistrer});

affichemodifaptitudelinguistiquecivil();
}	 

$(document).delegate('.modiflinguistique','click',function(){
	var numaptiling= $(this).data('id');
	var Modifier="";
	var Supprimer="";
$.post("modifaptitudelinguistique01civil.php",{
	   numaptiling:numaptiling,
	   Modifier:Modifier,
	   Supprimer:Supprimer},	
	
	function(rep)
	{
				$("#miseajour").html(rep);


	});	
});	


function enregmodifmodifaptitudelinguistique01civil(){
var numaptiling= $('.numaptiling1').val();
var id_civil= $('.id_civil').val();
var francais= $('.francais').val();
var anglais= $('.anglais').val();
var autres= $('.autres').val();
var Modifier="ok";

$.post('modifaptitudelinguistique01civil.php',{
numaptiling:numaptiling,
id_civil:id_civil, 
francais:francais,
anglais:anglais,
autres:autres,
Modifier:Modifier});

affichemodifaptitudelinguistiquecivil();
}	 



$(document).delegate('.deletelinguistique','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var id = $(this).data('id');
		var supprimer = "ok";
	
		$.post('codelinguistique.php',{
		numaptiling:id,
		supprimer:supprimer});
	affichemodifaptitudelinguistiquecivil();
	affichemodifaptitudelinguistiquecivil();
	gauche();
	}
});


$(document).on('submit','.informatique',function(e) {
    e.preventDefault();
    $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codeinformatique.php');
    request.send(formdata);

    afficheaptitudeinfocivil();
    afficheaptitudeinfocivil();
    gauche();

});
function afficheaptitudeinfocivil(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","modifaptitudeinfocivil.php",true);
        xmlhttp.send();
}

function ajoutaptitudeinfocivil(){

	$.post("aptitudeinfocivil.php",
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

}


$(document).delegate('.modifinfo','click',function(){
var id = $(this).data('id');
$.post("modifaptitudeinfo01civil.php",{
	   numaptitudeinfo:id},
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

});



$(document).delegate('.deleteinfo','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var id = $(this).data('id');
		var supprimer = "ok";
	
		$.post('codeinformatique.php',{
		numaptitudeinfo:id,
		supprimer:supprimer});
afficheaptitudeinfocivil();
	}
else
	{
	
	}
});

<!--------------decoration civil------------------------EFFACERRRRRRRRRRRRRRRRRRRRRRR----->

function affichemodifdecoration(){

	$.post("modifdecoration.php",
	
	function(rep)
	{
				$("#centre").html(rep);

	});	

}

function affichemodifdecorationcivil(){

	$.post("decoration.php",
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

}

function enregdecorationcivil(){
var numdecoration= $('.numdecoration').val();
var id_civil= $('.id_civil').val();
var intituledecoration= $('.intituledecoration').val();
var decretouarrete= $('.decretouarrete').val();
var annee= $('.annee').val();
var Enregistrer="ok";

$.post('decoration.php',{
numdecoration:numdecoration,
id_civil:id_civil, 
intituledecoration:intituledecoration,
decretouarrete:decretouarrete,
annee:annee,
Enregistrer:Enregistrer});

affichemodifdecoration();
}	 

/*$(document).delegate('.editdecorationcivil','click',function(){
var id = $(this).data('id');
$.post("modifdecoration01civilXX.php",{numdecoration:id},
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

});
*/
function enregmodifdecoration(){
var numdecoration= $('.numdecoration').val();
var id_civil= $('.id_civil').val();
var intituledecoration= $('.intituledecoration').val();
var decretouarrete= $('.decretouarrete').val();
var annee= $('.annee').val();
var Modifier="ok";

$.post('modifdecoration01civil.php',{
numdecoration:numdecoration,
id_civil:id_civil, 
intituledecoration:intituledecoration,
decretouarrete:decretouarrete,
annee:annee,
Modifier:Modifier});

affichemodifdecoration();
}	 

$(document).delegate('.deletedecorationcivil','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var id = $(this).data('id');
		var Supprimer = "ok";
	
		$.post('modifdecoration01civil.php',{
		numdecoration:id,
		Supprimer:Supprimer});
affichemodifdecoration();
	}
else
	{
	
	}
});

$(document).delegate('.affichedetailconge','click',function(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
    	var id_civil = $(this).data('id');
        xmlhttp.open("GET","Conge/view.php?id_civil="+id_civil,true);
        xmlhttp.send();

});

function affichcongecivil(){
var Enregistrer="";
	$.post("conge.php",{Enregistrer:Enregistrer},
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

}

function enregcongecivil(){
var id_civil= $('.id_civil').val();
var annee= $('.annee').val();
var reliquat= $('.reliquat').val();
var droit= $('.droit').val();
var total= $('.total').val();
var datedeb= $('.datedeb').val();
var datefin= $('.datefin').val();
var Enregistrer="ok";

$.post('conge.php',{
id_civil:id_civil, 
annee:annee,
reliquat:reliquat,
droit:droit,
total:total,
datedeb:datedeb,
datefin:datefin,
Enregistrer:Enregistrer});

affichemodifconge();

}	 

$(document).delegate('.editmodifconge','click',function(){
var id = $(this).data('id');
var Modifier="";
var Supprimer="";
$.post("modifconge01civil.php",{
	   numconge:id,
	   Modifier:Modifier,
	   Supprimer:Supprimer},
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

});

function enregmodifcongecivil(){
var numconge= $('.numconge').val();
var id_civil= $('.id_civil').val();
var annee= $('.annee').val();
var reliquat= $('.reliquat').val();
var droit= $('.droit').val();
var total= $('.total').val();
var datedeb= $('.datedeb').val();
var datefin= $('.datefin').val();
var Modifier="ok";

$.post('modifconge01civil.php',{
numconge:numconge,
id_civil:id_civil, 
annee:annee,
reliquat:reliquat,
droit:droit,
total:total,
datedeb:datedeb,
datefin:datefin,
Modifier:Modifier});
affichemodifconge();
}	 

$(document).delegate('.deletemodifconge','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var id = $(this).data('id');
		var Supprimer = "ok";
	
		$.post('modifconge01civil.php',{
		numconge:id,
		Supprimer:Supprimer});
		affichemodifconge();
	}
else
	{
	
	}
});

<!------------------------------->
$(document).on('submit','.particulier',function(e) {
    e.preventDefault();
    $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codeparticulier.php');
    request.send(formdata);

    afficheaptitudeparticulier();
    afficheaptitudeparticulier();
    gauche();

});
function afficheaptitudeparticulier(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","modifaptitudeparticulier.php",true);
        xmlhttp.send();
}


function ajoutaptitudeparticuliercivil(){
var Enregistrer="";
	$.post("aptitudeparticulier.php",
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

}

 $(document).delegate('.editpart','click',function(){
var id = $(this).data('id');

$.post("modifaptitudeparticulier01civil.php",{
	   numaptitudeparticulier:id
	   },
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

});

$(document).delegate('.deletepart','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer==true)
	{
		var id = $(this).data('id');
		var supprimer = "ok";
	
		$.post('codeparticulier.php',{
		numaptitudeparticulier:id,
		supprimer:supprimer});

		afficheaptitudeparticulier();
        afficheaptitudeparticulier();
gauche();
	}
else
	{
	
	}
});

$(document).on('submit','.decoration',function(e) {
    e.preventDefault();
    $form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'codedeco.php');
    request.send(formdata);
    afficheordredemerite();
    afficheordredemerite();

    gauche();

});
function afficheordredemerite(){
	
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","ordredemerite.php",true);
        xmlhttp.send();
}

$(document).delegate('.editdeco','click',function(){

var id = $(this).data('id');
$.post("modifordredemeritecivil.php",{
	   numdecoration:id},
	
	function(rep)
	{
				$("#miseajour").html(rep);

	});	

});

function contact(){

    $.post("decorationgauche.php",

        function(rep)
        {
            $("#gauche").html(rep);
        });

}



$(document).delegate('.contactdespersenservice','click',function(){
var id_etsouservice = $(this).data('id');
var service = $(this).data('servi');

$.post('listecontactcivil.php',{
id_etsouservice:id_etsouservice,
service:service},function(data){
$('#resultat').html(data);
													 
});
});



$(document).delegate('.contactdespersendettache','click',function(){
var id_etsouservice = $(this).data('id');

var service= $(this).data('dettachee');
$.post('listecontactcivil.php',{
id_etsouservice:id_etsouservice,
service:service},function(data){
$('#resultat').html(data);
													 
});
});


function formcontactcivil(){
var variablenom= $('#macritere').val();

$.post('class/listecontactcivil.php',{
variablenom:variablenom},function(data){
$('#contenu').html(data);
													 
});}

$(document).delegate('.affichedetailcivil','click',function(){
var id_civil= $(this).data('id');

$.post('contactcivil.php',{
id_civil:id_civil});
});

$(document).on('submit','.monformulaire',function(e) {
    e.preventDefault();
	$form = $(this);
    var formdata = new FormData($form[0]);
    var request = new XMLHttpRequest();
    request.open('post', 'server.php');
    request.send(formdata);
    var id_civil= $('.id_civil').val();
    $.get('fichepersonnelcivil.php',{
        id_civil:id_civil},function(result){
        $('#centre').html(result);

    });
    $.get('fichepersonnelcivil.php',{
        id_civil:id_civil},function(result){
        $('#centre').html(result);

    });
     gauche();
    gauche();


    //insertPersonnel();

});

$(document).delegate('.listeparrattache','click',function(){
var id = $(this).data('id');
var service= $(this).data('service');

$.post('afficheageparservicerattachedettache.php',{
id:id,
service:service},function(data){
$('#centre').html(data);
													 
});
});


$(document).delegate('.listepardettache','click',function(){
var id = $(this).data('id');
var service= $(this).data('service');

$.post('afficheageparservicerattachedettache.php',{
id:id,
service:service},function(data){
$('#centre').html(data);
													 
});
});


$(document).delegate('.listeparservice','click',function(){
var id = $(this).data('id');
var service= $(this).data('service');

$.post('afficheageparservicerattachedettache.php',{
id:id,
service:service},function(data){
$('#listingpardetail').html(data);
													 
});
});
<!------------------------->

function decorationcivil(){ 
	
	$.post("decorationcivil.php",
		function(rep){
			$("#centre").html(rep);
			});
		
	//gauche();
		}

function decorationproposition(){

var numdeco = document.formdecoration.mychoix.value;
//alert(numdeco);

if(numdeco==2)
	{var ages =25; var anneesce= 10;}
else if(numdeco==3)
	{var ages =25; var anneesce= 15;}
else if(numdeco==4)
	{var ages =25; var anneesce= 16;}
else if(numdeco==5)
	{var ages =40; var anneesce= 20;}
else if(numdeco==6)
	{var ages =40; var anneesce= 25;}
else if(numdeco==7)
    {var ages =40; var anneesce= 30;}
else if(numdeco==8)
    {var ages =45; var anneesce= 20;}
else if(numdeco==9)
    {var ages =45; var anneesce= 25;}
else if(numdeco==10)
    {var ages =45; var anneesce= 29;}
else if(numdeco==11)
    {var ages =45; var anneesce= 32;}
else if(numdeco==12)
    {var ages =45; var anneesce= 37;}



if (anneesce == ""){
	var msgerreur = "<section>Veuillez choisir une option de d&eacute;coration</section>";
	$("#msgerreur").html(msgerreur);
}
else
{
	
	$.post("decorationcode.php",{anneedeservice:anneesce,ages:ages},
	
	function(rep){$("#myheader1").html(rep);});
	
	}
}


function decorationconsulter(){

var numdeco = document.formdecoration.mychoix.value;


    if(numdeco==2)
    {var ages =25; var anneesce= 10;}
    else if(numdeco==3)
    {var ages =25; var anneesce= 15;}
    else if(numdeco==4)
    {var ages =25; var anneesce= 16;}
    else if(numdeco==5)
    {var ages =40; var anneesce= 20;}
    else if(numdeco==6)
    {var ages =40; var anneesce= 25;}
    else if(numdeco==7)
    {var ages =40; var anneesce= 30;}
    else if(numdeco==8)
    {var ages =45; var anneesce= 20;}
    else if(numdeco==9)
    {var ages =45; var anneesce= 25;}
    else if(numdeco==10)
    {var ages =45; var anneesce= 29;}
    else if(numdeco==11)
    {var ages =45; var anneesce= 32;}
    else if(numdeco==12)
    {var ages =45; var anneesce= 37;}

if (numdeco == ""){
	var msgerreur = "<section>Veuillez choisir une option de d&eacute;coration</section>";
	$("#msgerreur").html(msgerreur);
}
	
else
{
	//$age,$anneesce,$numdecocivil
	$.post("decorationconsultecode.php",{numdeco:numdeco,
            ages:ages,
            anneesce:anneesce},
	
	function(rep){$("#myheader1").html(rep);});
	
	}
}


$(document).delegate('.retour','click',function(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("centre").innerHTML = xmlhttp.responseText;
            }
        };
		var id_civil = $(".id_civil").val();
        xmlhttp.open("GET","fichepersonnelcivil.php?id_civil="+id_civil,true);
        xmlhttp.send();
			});

function detaileffectif(){
$.post("detailparserviceets.php",
function(rep)
	{
				$("#centre").html(rep);
	});

gauche();
	}


	
function enregcompte(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer == true) {
codeajoutcompte();
}
else{
}

}


function codeajoutcompte(){
	var cin= $('#cin').val();
	var pseudo= $('#pseudo').val();
	var categorie= $('#categorie').val();
	var adressemail= $('#adressemail').val();
	var passe1= $('#passe1').val();
	var passe2= $('#passe2').val();
	var Enregistrer="ok";
if(passe1!=passe2){
	var msgerreur = "votre mot de passe est different ";
	$("#msgerreur").html(msgerreur).css("background","#CC0000").css("text-align","center").css("padding","10px").css("color","white");
	attente();}	
else if((categorie=="-")||(etsouservice=="")||(cin=="")){
	var msgerreur = "Veullez remplir les champs";
	$("#msgerreur").html(msgerreur).css("background","#CC0000").css("text-align","center").css("padding","10px").css("color","white");
	attente();
	}
else{

$.ajax({
type:"POST",
data:"cin="+cin+"&pseudo="+pseudo+"&categorie="+categorie+"&adressemail="+adressemail+"&passe1="+passe1+"&Enregistrer="+Enregistrer,	   
	   
	   url:"codeajoutcompte.php",
	   success:function(result){
		  var message =  $('#msgerreur').html(result).css("background","#CC0000").css("text-align","center").css("padding","10px").css("color","white");
		   attente();
		   document.formcreationcompte.cin.value="";
		   document.formcreationcompte.pseudo.value="";
		   document.formcreationcompte.categorie.value="";
		   document.formcreationcompte.etsouservice.value="";
		   document.formcreationcompte.passe1.value="";
		   document.formcreationcompte.passe2.value="";

		   }
		   
	   });

	}
}
function changeforme(form2){
	
var choix1 = document.getElementById('radio1');
var choix2 = document.getElementById('radio2');
var choix3 = document.getElementById('radio3');
var choix4 = document.getElementById('radio4');
var choix5 = document.getElementById('radio5');
var choix6 = document.getElementById('radio6');

choix1.checked = false;
choix2.checked = false;
choix3.checked = false;
choix4.checked = false;
choix5.checked = false;
choix6.checked = false;

var form = document.form2;
	form.critere.value = "";
	form.anneesce.value = "";

}

/*$(document).delegate('.detailretraite','click',function(){
var dateretraite = $(this).data('retraite');

$.post('listedateretraitecivil.php',{
dateretraite:dateretraite},function(data){
$('#centre').html(data);
													 
});
	});
*/
/*$(document).delegate('.envoyearchive','click',function(){
var confirmer = confirm("ETES VOUS SUR ?");
if (confirmer == true) {

$.post('codemiseajourretraite.php',function(mydata){
$('#centre').html(mydata);
					});

	}else{
		
		}

 */