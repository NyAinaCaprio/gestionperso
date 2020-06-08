$(document).ready(function () {

/*    var $confirmation= $("#cin");
        
        $confirmation.keyup(function(){
            var cin = $(this).val();
        $.ajax({
            type:"POST",
            data:"cin="+cin,       
           
           url:"verifcin.php",
           success:function(result){
              $('#cin_error').html(result);
               }
               
           });
              
        }); */
})
function showUser1(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","class/nompersonnel.php?id_etsouservice="+str,true);
        xmlhttp.send();
        
    }
 
}   

function showUser2(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","class/nompersonnel.php?id_dettache="+str,true);
        
        xmlhttp.send();
        
    }
 
} 


    function attente(){
        $("#message").delay(20000).hide(0);
        var msgerreur = '';
        $("#message").show();
    }
    function ajoutconge(){
        $.post("addconge.php",
            function(repo)
            {
                $("#container").html(repo);
            });
    }

    function consultation(){
        $.post("consultation.php",
            function(repo)
            {
                $("#container").html(repo);
            });
    }

function enregistrerconge()
{
    var chefdiv;
    var chefservice;
    var chefspcm;

    var typeconge = document.enregistrer.type.value;

    if(document.enregistrer.chefdiv.checked)
    {
        var chefdiv = 1;
    }else
    {
        var chefdiv =0;
    }

    if(document.enregistrer.chefservice.checked)
    {
        var chefservice = 1;
    }else
    {
        var chefservice =0;
    }

    if(document.enregistrer.chefspcm.checked)
    {
        var chefspcm = 1;
    }else
    {
        var chefspcm = 0;
    }


    var id_civil= $('#id_civil').val();
    var nbrjour= $('#nbrjour').val();
    var datededepart= $('#datededepart').val();
    var motif = $('#motif').val();
    var adresse = $('#adresse').val();
    var chefdiv = chefdiv;
    var chefspcm = chefspcm;
    var chefservice = chefservice;

    var addReliquat = 0;
    var typeconge = typeconge;

    if(id_civil=="" || nbrjour =="" || datededepart=="" || typeconge==""  )
    {

        alert ("Completez les champs obligatoires ! ")
    }
    else
    {
        var confirmer = confirm("Etes vous sûr de vouloir enregistrer ?");
        if (confirmer == true) {

            alert("Donnée du personnel N° " + id_civil + " Sera modifié");

            $.post('code.php',{
                id_civil:id_civil,
                nbrjour:nbrjour,
                motif:motif,
                datededepart:datededepart,
                adresse:adresse,
                typeconge:typeconge,
                chefdiv:chefdiv,
                chefservice:chefservice,
                chefspcm:chefspcm,
                addReliquat:addReliquat},function(result){
                $('#message').html(result);

                attente();
            });

            ajoutconge();

        }
    }



}



function addreliquat()
{
      $.post("addreliquat.php",

        function(repo)
        {
            $("#container").html(repo);
        });
    
}



function recherchecivilparnom(){

    var critere= $('#critere').val();
    if (critere=="") {

    }
    else{
        <!-- $.post('listecivilerech.php',{ critere:critere },function(data){ $('#donnees').html(data); }); -->
        $.post('listepersonnel.php',{
            critere:critere
        },function(data1){
            $('#container').html(data1);

        });}
}
 
