<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../bootstrap/js/jquery-3.1.0.js" type="text/javascript"></script>
</head>

<body>

<form   action="#" method="post" enctype="multipart/form-data">

<input type="file" name="image"  />
<button  type="submit" >Télécharger</button>
<button type="button"> Annuler</button>
</form>
<script>
$(document).on('submit','form',function(e){
e.preventDefault();
$form = $(this);
uploadImage($form);
});

function uploadImage($form){
var formdata = new FormData($form[0]);
var request = new XMLHttpRequest();
request.open('post','server.php');
request.send(formdata);




}
</script>
</body>
</html>
<!--<script>
$(document).ready(function(){
$('#uploadForm').on('submit',function(e){
e.preventDefault();
$.ajax({
url:"upload.php",
type:"POST",
data:new FormData(this),
contentType:false,
processData:false,
success:function (data){
$("#galery").html(data);
alert("images télécharger");
}
})
})
})
</script>
-->