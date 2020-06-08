// JavaScript Document


function effacemessage(){
$("#msgerreur").delay(10000).hide(0);
var msgerreur = '';
$("#msgerreur").show();
}
 

 
function affichefenajoutarticle(){
	$.post("fenentreenouveauarticles.php",	
	
	function(repo1)
	{
				$(".entetedepage").html(repo1);
	});
	}

function addfournisseur(){
    $.post("fenentreajoutfournisseur.php",

        function(repo1)
        {
            $("#contenu").html(repo1);
        });
}


function affichelistearticles(){
	$.post("listearticles.php",	
	
	function(repo2)
	{
				$(".contenu").html(repo2);
	});
		
	}
	
function enregistrernouveauarticle()
{

	var reference  = $('#reference').val();
	var libelleproduit  = $('#libelleproduit').val();
	var description= $('#description').val();
	var id_categorie= $('#id_categorie').val();
	var id_unite= $('#id_unite').val();
	var photo= $('#photo').val();
	var codebarrefournisseur=$('#codebarrefournisseur').val();
	var codebarreinterne=$('#codebarreinterne').val();
	var stockalerte=$('#stockalerte').val();
	var saisipar=$('#saisipar').val();
	var saisile=$('#saisile').val();
 
alert(reference+" "+libelleproduit+" "+id_categorie+" "+id_unite+" "+saisipar)
if (reference=="" || libelleproduit=="" ||id_categorie=="" || id_unite=="" || saisipar=="")
{
var msgerreur = "Completez les champs obligatoires";
$("#msgerreur").html(msgerreur);
effacemessage();
}

else {
    $.post('codeajoutarticle.php',{
        bmouv:bmouv,
        id_categorie:id_categorie,
        designation:designation,
        unite:unite,
        quantite_initiale:quantite_initiale,
        observation:observation,
        id_fournisseurs:id_fournisseurs,
        enregistrer:enregistrer    },function(data1){
        $('#msgerreur').html(result);

    });
	effacemessage();
    affichefenajoutarticle();
    affichelistearticles();
}

}

function affichelistesortiearticlesbon(){
	$.post("fenentrelistesortiearticlesbon.php",	
	
	function(repo4)
	{
				$(".contenu").html(repo4);
	});
	
}


function enregistrersortiearticle(){
var code_article  = $('.code_article').val();
var date_sortie= $('.date_sortie').val();
var nombenef= $('.nombenef').val();
var bmouv= $('.bmouv').val();
var quantite_sortie= $('.quantite_sortie').val();
var typesortie = document.form2.typesortie.value;
var etsouserviceoucorps= $('.etsouserviceoucorps').val();
var observation= $('.observation').val();


if ( (code_article=="") || (nombenef=="") || (date_sortie=="") || (bmouv=="") || (quantite_sortie==""))
{
    var msgerreur = "Completez les champs obligatoires";
 $("#msgerreur").html(msgerreur);
effacemessage();
}
else{
	
if(typesortie=="Bon"){
$.ajax({
type:"POST",
data:"code_article="+code_article+"&date_sortie="+date_sortie+"&quantite_sortie="+quantite_sortie+"&nombenef="+nombenef+"&bmouv="+bmouv+"&observation="+observation+"&typesortie="+typesortie+"&etsouserviceoucorps="+etsouserviceoucorps,
		url:"codesortiearticlebon.php",
success:function(result){
			$('#msgerreur').html(result).css( "background", "green").css( "color", "white");
			effacemessage();
			affichelistesortiearticlesbon();
}
		   
	   });
	
	}else{
		alert(nombenef)
$.ajax({
type:"POST",
data:"code_article="+code_article+"&date_sortie="+date_sortie+"&quantite_sortie="+quantite_sortie+"&nombenef="+nombenef+"&bmouv="+bmouv+"&observation="+observation+"&typesortie="+typesortie+"&etsouserviceoucorps="+etsouserviceoucorps,
		url:"codesortiearticle.php",
success:function(result){
			$('#msgerreur').html(result).css( "background", "green").css( "color", "white");
			effacemessage();
			affichesortiearticles();
}
		   
	   });
		}	
	}
}

function demarragesortie(){
	afficheajoutsortiearticles();
	affichesortiearticles();
	}

function afficheajoutsortiearticles(){
	$.post("fenentresortiearticles.php",	
	
	function(donnee2)
	{
				$(".entetedepage").html(donnee2);
	});
	}

function affichesortiearticles(){
	afficheajoutsortiearticles();
	
	$.post("listesortiearticles.php",	
	
	function(donnee2)
	{
				$(".contenu").html(donnee2);
	});
}

function affichefenetrenouveau(){
	demarrage();
	}
	
function affichefenetredetailentree(){
		$.post("fenentredetailentreearticle.php",	
	
	function(repo1)
	{
				$(".entetedepage").html(repo1);
	});
		affichelistedetailentreearticle();
	}	
	
function affichelistedetailentreearticle(){
		$.post("listesdetailentreearticles.php",	
	
	function(repo1)
	{
				$(".contenu").html(repo1);
	});
	}	
		

function consultationentree(){
	$.post("consultationentree.php",	
	
	function(repo1)
	{
				$(".entetedepage").html(repo1);
	});
	
	effacemessage();
	var msgerreur = ' ';
	$(".contenu").html(msgerreur);
	
	}
	
function afficheconsultationentree(){
		
var choix= document.form2.choix.value;
var id_categorie= $('.id_categorie').val();
var code_article= $('.code_article').val();

$.post('listingarticlesentree.php',{
id_categorie:id_categorie,	   
code_article:code_article,
choix:choix},function(data){
$('.contenu').html(data);
													 
});
		
}

function consultationdetailsortie(){
	$.post("consultationdetailssortie.php",	
	
	function(repo1)
	{
				$(".entetedepage").html(repo1);
	});
 
	}


function afficheconsultationsortie(){
		
var choix= window.document.form2.choix.value;
var typesortie= $('.typesortie').val();
var code_article= $('.code_article').val();
var id_etsouservice= $('.id_etsouservice').val();
var id_categorie= $('.id_categorie').val();

$.post('listingdetailsortie.php',{
choix:choix,
code_article:code_article,
typesortie:typesortie,
id_etsouservice:id_etsouservice,
id_categorie:id_categorie},function(data3){
$('.contenu').html(data3);

});		
		
}
		


function demarrageetatdestock(){
	affichemenuconsultation();
	
	}
	
function affichemenuconsultation(){
	$.post("consultationetatdestock.php",	
	
	function(repo1)
	{
				$(".entetedepage").html(repo1);
	});
	
	}
	
function listingetatdestock(){
	
var choix= window.document.form2.choix.value;
var reference= $('.reference').val();
var id_categorie= $('.id_categorie').val();
if (choix==""){
    var msgerreur = "Choisissez votre option ! ";
	$("#msgerreur").html(msgerreur);
	effacemessage();
	}else{


$.post('listingetatdestock.php',{
choix:choix,	   
id_categorie:id_categorie,
reference:reference},function(data3){
$('.contenu').html(data3);

message();
});		
	
	}
}


function demarragefichedestock(){
	affichemenufichedestock();
	}
	
function affichemenufichedestock(){
	$.post("consultationfichedestock.php",	
	
	function(repo1)
	{
				$(".entetedepage").html(repo1);
	});
	
	}
	
	
function listingfichedestock(){

var reference= $('.reference').val();


if (reference==" ") {
    var msgerreur = "Option non parametré";
 	$("#msgerreur").html(msgerreur);
	
	effacemessage();
	}else{


$.post('listingfichedestock.php',{
reference:reference},function(data5){
$('.contenu').html(data5);


});		
	
	}
	}
	
function demarragefournisseur(){
	 
affichelistefournisseur();	
	}	
	
 

function enregistrefournisseur(){
var societe  = $('#societe').val();
var civilite  = $('#civilite').val();
var nomprenom  = $('#nomprenom').val();
var adresse= $('#adresse').val();
var codepostal= $('#codepostal').val();
var ville= $('#ville').val();
var telephone= $('#telephone').val();
var mail= $('#mail').val();
var observation= $('#observation').val();
var enregistrer = "ok";
//alert(societe+" "+civilite+" "+nomprenom+" "+adresse+" " +codepostal+" "+ville+" "+telephone+" "+mail+" "+observation)
if ( nomprenom  =="" || adresse=="")
{
    var msgerreur = "Completez les champs obligatoires";
$("#msgerreur").html(msgerreur);

	effacemessage();
}
else{

    $.ajax({
        type:"POST",
        data:"societe="+societe+"&civilite="+civilite+"&nomprenom="+nomprenom+"&adresse="+adresse+"&codepostal="+codepostal+"&ville="+ville+"&telephone="+telephone+"&mail="+mail+"&observation="+observation,
        url:"codeajoutfournisseur.php",
        success:function(result){
            $('.contenu').html(result);
        }});
	effacemessage();
demarragefournisseur();
	}
	
}

function affichelistefournisseur(){

	$.post("listefournisseur.php",	
	
	function(repo5)
	{
				$(".entetedepage").html(repo5);
	});

}

$(document).delegate('.detailfournisseur','click',function(){
	 var id_fournisseurs = $(this).data('id_fournisseurs');
 
$.ajax({
type:"POST",
data:"id_fournisseurs="+id_fournisseurs,
url:"listearticlesassocies.php",
success:function(result){
	$('.contenu').html(result);
	}});
	  })

function demarragetraitement(){
affichemenutrait();
	}

function affichemenutrait(){
		$.post("consultationinventaire.php",	
	
	function(repo5)
	{
				$(".entetedepage").html(repo5);
	});

	
	}
	
	
function validertraitement(){
var categorie= window.document.formtraitement.categorie.value;
 
	if ( categorie !=7)
{
    var msgerreur = "Opion non parametré";
 $("#msgerreur").html(msgerreur);
	effacemessage();
}
else{

$.ajax({
type:"POST",
data:"categorie="+categorie,
url:"codevalidetraitement.php",
success:function(result){
		   $('#msgerreur').html(result);
}
		   
	   });
}
}

$(document).delegate('.modifetatbon','click',function(){
	var id_sortie = $(this).data('id');
 
$.ajax({
type:"POST",
data:"id_sortie="+id_sortie,
url:"coderetourarticle.php",
success:function(result){
		   $('#msgerreur').html(result).css( "background", "green").css( "color", "white");
		   	effacemessage();
}
		   
	   });
consultationdetailsortie();

	});

$(document).delegate('.retourbonarticle','click',function(){
	var id_sortie = $(this).data('id_sortie');													  
 //alert(id_sortie)
$.ajax({
type:"POST",
data:"id_sortie="+id_sortie,
url:"codemiseajourbonarticle.php",
success:function(result){
		   $('#msgerreur').html(result).css( "background", "green").css( "color", "white");
		   	affichelistesortiearticlesbon();
			effacemessage();
				}
		   });
});

function demarrageetsouservice(){
fenetreajoutetsouservice();
fenetrelisteetsouservice();
	
	}

function fenetreajoutetsouservice(){
	$.post("fenetreajoutetsouservice.php",	
	
	function(repo4)
	{
				$(".entetedepage").html(repo4);
	});
	}
function fenetrelisteetsouservice(){
	$.post("fenetrelisteetsouservice.php",	
	
	function(repo6)
	{
				$(".contenu").html(repo6);
	});
	
	}
	
function enregetsouservice(){
	
	var etsouservice = $('.etsouservice').val();
	$.ajax({
type:"POST",
data:"etsouservice="+etsouservice,
url:"codeajoutetsouservice.php",
success:function(result){
		   $('#msgerreur').html(result).css( "background", "green").css( "color", "white");
		   	demarrageetsouservice()
				}
		   });
	
	}	

	function consulinventaire(){
		$.post("consultationinventaire.php",	
	
	function(repo1)
	{
				$("#msgerreur").html(repo1);
	});
}


$(document).delegate('.consultinventaire','click',function(){
	var id_titre_inventaire = $(this).data('id_titre_inventaire');													  
 //alert(id_sortie)
$.ajax({
type:"POST",
data:"id_titre_inventaire="+id_titre_inventaire,
url:"listeinventaire.php",
success:function(result){
		   $('.contenu').html(result) ;
				}
		   });
});


function mouvement()
{
    $.post("mouvement.php",

        function(repo1)
        {
            $(".entetedepage").html(repo1);
        });
}





