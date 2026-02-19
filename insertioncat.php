<?php
$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');


echo"

<form method=\"post\" action=\"projet.php?page=ajoutcat.php\">


Categorie:
<input type=\"text\" name=\"nom\"/><br/>


<p><label><input type=\"submit\" name=\"ok\" value=\"Valider\"/></label></p>


</form>
";


mysql_close($ma_connexion);
?> 
