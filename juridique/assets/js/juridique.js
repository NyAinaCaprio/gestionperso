function attente(){
$(".msgerreur").delay(4000).hide(0);
var msgerreur = '';
$(".msgerreur").show();
}

function demarrageconsultation(){
$.post("fenetreconsultation.php",	
	
	function(rep)
	{
				$(".contenu").html(rep);
    });
}


$(document).delegate('.deleteimage','click',function(){
    var id = $(this).data('id');
    var confirmer = confirm("ETES VOUS SUR ?");
    if (confirmer == true) {
        var id = $(this).data('id');
        var supprimer = "ok";
        $.post('codemodifcontenu.php',{
            id:id,
            supprimer:supprimer});

        $.post('codemodifcontenu.php',{
            id:id,
            supprimer:supprimer});
    }
});