<?php
$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');



if ($_POST)
	{


$rechercheinfo="SELECT * FROM produit WHERE id_produit=\"".$_POST['produit']."\";";

$resultats_recherche_info=mysql_query($rechercheinfo,$ma_connexion) or die(mysql_error()) ;

 
while ( $row = mysql_fetch_assoc($resultats_recherche_info))
	{
		$id_produit=$row['id_produit'];
		$nom=$row['nom'];
		$description=$row['description'];
		$prix= $row['prix'];
		$quantite=$row['quantite'];
		$livraison=$row['livraison'];
		$promo=$row['promo'];
		$info=$row['info'];

 
}


echo"
<form method=\"post\" action=\"projet.php?page=update.php\">
<tr>

</select>
</td></tr><br/>


<!--<td>Image: </td>
<td><input type=\"text\" name=\"IMAGE\"/></td></tr><br/>-->

<td>nom: </td>
<td><input type=\"text\" name=\"NOM\" value=\"".$nom."\"/></td></tr><br/>


<td>Description</td>
<textarea name=\"DESCRIPTION\" rows=\"2\" cols=\"50\" />
$description
</textarea>
</br>

<td>prix: </td>
<td><input type=\"text\" name=\"PRIX\" value=\"".$prix."\"/></td></tr>
<br/>

<td>Livraison: </td>
<td><input type=\"text\" name=\"LIVRAISON\" value=\"".$livraison."\" \"/></td></tr>
<br/>

<td>Stocks: </td>
<td><input type=\"text\" name=\"STOCKS\" value=\"".$quantite."\"   /></td></tr>
<br/>

<td>Promo: </td>
<textarea name=\"PROMO\" rows=\"2\" cols=\"50\" />
$promo
</textarea>
</br>

<td>Info: </td>
<td><input type=\"text\" name=\"INFO\" value=\"".$info."\"  /></td></tr>
<br/>
<p><input type=\"hidden\" name=\"id_produit\" value=\"".$id_produit."\"/></p><br/>

<p><label><input type=\"submit\" name=\"ok\" value=\"Valider\"/></label></p>

<form/>


";
	}

?>