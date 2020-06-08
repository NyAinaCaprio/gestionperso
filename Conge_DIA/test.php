<?php

require_once ('function.php');
connexiondb();

function getRelikAAA( )
{
    global $db;
    $var = $db->query("SELECT
  `personnelcivil`.`anneereliquat`, `personnelcivil`.`id_civil`
FROM
  `personnelcivil`
WHERE
  `personnelcivil`.`id_civil` = 45")->fetch();
    return $var["anneereliquat"];
}

if(  getRelikAAA()=="")
{
    echo "Elle est nulle";
}