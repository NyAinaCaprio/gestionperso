<?php 

require_once ("function.php");
connexiondb();
?>
<div class="col-md-12">
    <div class="col-md-6">        
        <?php 

            if (array_key_exists('message',$_SESSION)) {
            echo '<p class="btn btn-primary">'. var_dump($_SESSION['message']).'</p>';
            }
            unset($_SESSION['message']);
        ?> 
    </div>
</div>
<form  action='class/codeAjoutMouvement.php' enctype="multipart/form-data" method='POST' >
  <div class="col-md-12">

                        <div class="col-md-4">
                            <label for="id_type">Type : </label>
                            <select class='form-control' name='type'>
                                <option value=''></option>
                                <option value='1'>ENTREE</option>
                                <option value='2'>SORTIE</option>
                                 
                            </select>   
                        </div>

                        <div class="col-md-4">
                            <label for="source">Source ou Destination </label>
                            <input name="source" class="form-control" type="text">
                        </div>

                        <div class="col-md-4">
                            <label for="date">Date : </label>
                            <input name="date" class="form-control" required value=' <?php echo date('Y:m:d H/m/s') ?> ' type="datetime" >
                        </div>

                        <div class="col-md-4">
                            <label for="numerodelapj">N° de la PJ : </label>
                            <input name="numerodelapj" class="form-control" required type="text" >
                        </div>

                        <div class="col-md-4">
                            <label for="bloubms">BL  ou BMS : </label>
                            <input name="bloubms" class="form-control" required type="text" >
                        </div>

                        <div class="col-md-4">
                            <label for="saisipar">Saisi par : </label>
                            <input name="saisipar" class="form-control" required type="text" value="<?php echo $_SESSION['login'] ?>" >
                        </div>


                        <div class="col-md-4">
                            <label for="saisile">Saisi le : </label>
                            <input name="saisile" class="form-control" required type="text" value="<?php echo date("Y-m-d") ?>" >
                        </div>

                    </div>

                     <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="add_detail_mouv">
                            <thead>
                            <tr><th scope="col" colspan="6" >Detail Mouvement</th>  </tr>
                            <tr>
                            <th scope="col">Référence</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Etat</th>
                            <th scope="col">Observation</th>
                            <th scope="col"><button type="button" id="add" id="add" class="btn btn-success btn-xs add">+</button></th>
                            <th scope="col"></th>

                            </tr>
                            </thead>
                            
                        </table>
                    </div>
                <div class="col-md-12">
                        <input type="submit" id="enregistrer" name="enregistrer"  class="btn btn-info" value="Enregistrer" >
                    </div>
                </form>


 <script type="text/javascript">

 function redirect(){
    $.post("index.php?p=DON");    
}
 
$(document).ready(function () {
    
   function fetch_data() {
        $.ajax({
            url:"select.php",
            method:"POST",
            success:function (data) {
                $("#live_data").html(data);

            }
        });
    } 
        var count = 1;
    $(document).on('click','.add',function(){
        count = count + 1; 
            var html='';
            html += "<tr id='row"+count+"'>";
            html += "<td><select name='reference[]' class='form-control reference'> <option value=''></option> <?php echo utf8_encode(SelectBox()); ?> </select></td>";
            html += "<td><input name='quantite[]' class='form-control'></td>";
            html += "<td><input name='etat[]' class='form-control'></td>";
            html += "<td><input name='observation[]' class='form-control'></td>";
            html += "<td scope='col'><button type='button' class='remove' class='btn btn-primary remove'>-</button></td>";
            html +="</tr>";

    $('#add_detail_mouv').append(html);


        $(document).on('click','.remove',function(){
            $(this).closest('tr').remove();
        });

    });

   /* $('#enregistrer').click(function(){

        var type  = $('#type').val();
        var source  = $('#source').val();
        var dati = $('#date').val();
        var numerodelapj= $('#numerodelapj').val();
        var bloubms= $('#bloubms').val();
        var saisipar= $('#saisipar').val();
        var saisile= $('#saisile').val();
        
    

        var reference = [];
        var quantite = [];
        var etat = [];
        var observation = [];

        $('.reference').each(function(){
          reference.push($(this).text());
        });


        $('.quantite').each(function(){
            quantite.push($(this).text());
        });

        $('.etat').each(function(){
            etat.push($(this).text());
        });

        $('.observation').each(function(){
            observation.push($(this).text());
        }); 

        $.ajax({
            url:'codeAjoutMouvement.php',
            method:"POST",
            data:{type:type, source:source, dati:dati, bloubms:bloubms, saisipar:saisipar, saisile:saisile, reference:reference, quantite:quantite, etat:etat, observation:observation},
            success:function(data) {
                redirect();
            }


        });
    });*/

});
 </script>
             