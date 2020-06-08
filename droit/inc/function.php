<?php
$db;

function connexiondb()
{
    global $db;
    $db = new PDO('mysql:host=localhost;dbname=dia', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
 }

