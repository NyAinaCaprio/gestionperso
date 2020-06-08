<?php session_start(); 
include('connexion.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<h4>Nouveau ETS ou Service ou Corps...</h4>

                        <div class="panel panel-primary">
<div class="panel-heading">
                                Formulaire d'ajout
                            </div>
                            <div class="panel-body">

<table width="100%" border="0">
  <tr>
    <td>ETS ou Service ou Corps :</td>
    <td><input type="text" class="etsouservice" name="etsouservice"     required="" id="form-control" /></td>
  </tr>
</table>


</div>
<div class="panel-footer">
<div>      
 <button  type="button" onClick="enregetsouservice()" class="btn btn-primary" >Enregistrer</button>
</div>
</div>
</div>      
</body>
</html>
