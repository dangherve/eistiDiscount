<?php

$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');

if ($_POST['STOCKS'] < 0)
	$_POST['STOCKS']=0;


$message="UPDATE produit SET nom='".$_POST['NOM']."', description='".$_POST['DESCRIPTION']."', prix='". $_POST['PRIX']."', livraison='".$_POST['LIVRAISON']."', quantite='".$_POST['STOCKS']."', promo='".$_POST['PROMO']."', info ='".$_POST['INFO']."' WHERE id_produit=\"".$_POST['id_produit']."\";";



mysql_query($message,$ma_connexion)or die(mysql_error()) ;



 mysql_close($ma_connexion);

echo "produit mis à jour";
?>
