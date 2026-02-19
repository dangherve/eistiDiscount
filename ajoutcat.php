<?php
$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');


$message= "INSERT INTO magasin (nom)  Values"."('".$_POST['nom']."')";

mysql_query($message,$ma_connexion);



 mysql_close($ma_connexion);

echo "article ajouter";
?> 
