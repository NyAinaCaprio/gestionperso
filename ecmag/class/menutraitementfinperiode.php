<?php session_start(); 
include('connexion.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script type="text/javascript" > 
</script>
</head>

<body>

<form name="formtraitement" method="post" enctype="multipart/form-data" action="exportversexcel.php">
 
<!------------------------------------>
 <div class="panel panel-primary">
 
<div class="panel-heading"><a class="btn btn-success" onclick="consulinventaire()">CONSULTATION</a>
 
</div>      

 
</form>
</body>
</html>
