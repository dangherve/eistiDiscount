<?php

$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');


$message="UPDATE utilisateur SET type_utilisateur='".$_POST['TYPE']."' WHERE idu=\"".$_POST['idu']."\";";




mysql_query($message,$ma_connexion)or die(mysql_error()) ;


 mysql_close($ma_connexion);

echo "utilisateur mis à jour";
?>
