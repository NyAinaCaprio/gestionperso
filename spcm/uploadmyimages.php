<?php
if($_FILES['file']['size']>0){
if(move_uploaded_file($_FILES['file']['tmp_name'], 'mesimages/'.$_FILES['file']['name'])){
?>
<script type="text/javascript" >

parent.document.getElementById("message").innerHTML="";
parent.document.getElementById("file").value="";
window.parent.updatepicture("<?php echo 'mesimages/.'.$_FILES['file']['name'] ?>");
parent.document.getElementById("message").innerHTML="<font color='#ff0000'>Succesfull</font>";
function updatepicture(pic){
document.getElementById("image").setAttribute("src",pic);
}
<?php ?>
</script>
<?php

}else{
?>
<script type="text/javascript">
parent.document.getElementById("message").innerHTML="<font color='#ff0000'>There was an Error Uploading image. Try Again</font>";
</script>
<?php

}
}
?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
</body>
</html>
