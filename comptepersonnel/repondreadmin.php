<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form name="formanswer">
  <div class="panel panel-primary">
 
 <div class="panel-heading">

    </div>         

  <div class="pull-left">Repondre</div> 
 
<input  type="text" value="<?php echo $_POST['id'] ?>" id="repmess" />
<textarea class="textarea" id="monmessage" placeholder="Votre reponse..."></textarea>
<input onclick="repondremessagepersonnel()" class="btn btn-danger" value="Envoyé" type="button">
<!---<button class="btn btn-red" onclick="repondremessagepersonnel()"><i class="fa fa-comment fa-2x"></i> Envoyé</button>---->
</div>
</form>
</body>
</html>
