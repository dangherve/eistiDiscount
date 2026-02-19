<?php
$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');


$rechechepageadmin="SELECT * FROM page_admin;";


$resultat_page_admin=mysql_query($rechechepageadmin,$ma_connexion)or die(mysql_error()) ;


while ( $row = mysql_fetch_assoc($resultat_page_admin))
    {
			$page= $row['nompage'];
			echo "
			<form method=\"post\" action=\"projet.php?page=modifpage.php\">
<tr>
			<td>nom de la page: </td>
				<td><input type=\"text\" name=\"nom_page\" value=\"".$page."\"\"/></td></tr>

<label><input type=\"submit\" name=\"ok\" value=\"modifier\"/></label>
<br/>
<form/>
";
	}

mysql_close($ma_connexion);

?> 




&
<form method="post" action="projet.php?page=ajoutpage.php">
	<tr>
<td>nom de la page: </td>
<td><input type="text" name="nom_page" /></td></tr>

<label><input type="submit" name="ok" value="ajout"/></label>
<br/>
<form/>