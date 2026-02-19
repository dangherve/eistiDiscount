<?php
$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');


$message= "INSERT INTO produit (id_categorie, image , nom ,
 description , prix , livraison , quantite , promo , info)
 Values"."('".$_POST['CATEGORIE']."','". $_POST['IMAGE']."','". $_POST['NOM']."','". $_POST['DESCRIPTION']."','". $_POST['PRIX']."','". $_POST['LIVRAISON']."','". $_POST['STOCKS']."','". $_POST['PROMO']."','". $_POST['INFO']."')" ;

mysql_query($message,$ma_connexion);

echo "article ajouter";
?> 

