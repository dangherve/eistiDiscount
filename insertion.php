<?php
$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');


echo"

<form method=\"post\" action=\"projet.php?page=ajout.php\">



Categorie: 

 <select name=\"CATEGORIE\">
";

$recherchecat="SELECT id_categorie,nom FROM magasin;";

$mes_resultats=mysql_query($recherchecat,$ma_connexion);

while ( $row = mysql_fetch_assoc($mes_resultats))
  {
		echo"
    <option value=\"". $row['id_categorie']."\">".$row['nom']."</option>";
	}

	echo"
</select>
<br/>


Image: 
<input type=\"text\" name=\"IMAGE\"/><br/>

Nom: 
<input type=\"text\" name=\"NOM\"/><br/>


Description:
<textarea name=\"DESCRIPTION\" rows=\"2\" cols=\"50\">
</textarea>
</br>

Prix: 
<input type=\"text\" name=\"PRIX\"/><br/>

Livraison:
<input type=\"text\" name=\"LIVRAISON\"/>
<br/>

Stocks:
<input type=\"text\" name=\"STOCKS\"/>
<br/>

Promo:
<textarea name=\"PROMO\" rows=\"2\" cols=\"50\">
</textarea>
<br/>

Info:
<input type=\"text\" name=\"INFO\"/>
<br/>


<p><input type=\"hidden\" name=\"insersion\" value=\"1\"/></p><br/>


<p><label><input type=\"submit\" name=\"ok\" value=\"Valider\"/></label></p>

</form>
";




mysql_close($ma_connexion);
?> 

