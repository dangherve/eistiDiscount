	 <?php

 
$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');

$utilisateur="SELECT idu, nom, prenom, type_utilisateur FROM utilisateur;";

	

$resultats_utilisateur=mysql_query($utilisateur,$ma_connexion) or die(mysql_error()) ;


while ($row =mysql_fetch_assoc($resultats_utilisateur))
	{
		$nom=$row['nom'];
		$prenom=$row['nom'];
		$id=$row['idu'];
		$type=$row['type_utilisateur'];
		
		
		echo"
nom: ".$nom."<br/>
prenom: ".$nom."<br/>
type d'utilisateur actuel: ";

		if ($type==0){
			echo "administrateur";
		}else if ($type==2){
			echo "client privilege";
		}else{
			echo "client";
		}
	
				echo"	<br/>	

<form method=\"post\" action=\"projet.php?page=update_u.php\">


<select name=\"TYPE\">
 <option value=0>administrateur </option>
 <option value=2>client privilege </option>
 <option value=1>client </option>
</select>

 <p><input type=\"hidden\" name=\"idu\" value=\"".$id."\"/></p>

<p><label><input type=\"submit\" name=\"ok\" value=\"Valider\"/></label></p>
</form>


<br/>";
}
?>