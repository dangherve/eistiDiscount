<form method="post" action="projet.php?page=Paiement.php">


<table>
	      <tr><td><b> Civilité </b></td></tr>
	  </table>
	  <hr>
	  <table>
<?php


$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');
mysql_select_db('%%DATABASE%%');

$ma_requete = "SELECT * FROM utilisateur WHERE utilisateur.nom=\"".$_SESSION['nom']."\";";
$mes_resultats=mysql_query($ma_requete,$ma_connexion)or die(mysql_error()) ;
while( $row = mysql_fetch_assoc($mes_resultats ) ){
  //echo $row['login'];
  $nom = $row['nom'];
  $prenom = $row['prenom'];
  $jj = $row['jj'];
  $mm = $row['mm'];
  $aaaa = $row['aaaa'];
  $adresse = $row['adresse'];
  $ville = $row['ville'];
  $cp = $row['cp'];
  $email = $row['email'];
 }

echo      "<tr><td>Nom : </td><td><input type=\"text\" name=\"nom\" value=\"".$_SESSION['nom']."\"/></td></tr>";
echo      "<tr><td>Prénom : </td><td><input type=\"text\" name=\"prenom\" value=\"".$prenom."\"/></td></tr>

 <tr><td>Jour de naissance : </td>
                  <td><input type=\"text\" size=2name=\"mm\" value=\"".$jj."\"/></td></tr>

	      <tr><td>Mois de naissance : </td>
                  <td><input type=\"text\" size=2 name=\"mm\" value=\"".$mm."\"/></td></tr>

	      <tr><td>Année de naissance : </td>
                  <td><input type=\"text\" size=4 name=\"mm\" value=\"".$aaaa."\"/></td></tr>


	      ";
?>

<br/>
</td></tr>
</table>
<hr/>
<table><?php
echo      "<tr><td>Adresse : </td><td><input type=\"text\" name=\"adresse\" value=\"".$adresse."\"/></td></tr>
<tr><td>Ville : </td><td><input type=\"text\" name=\"ville\" value=\"".$adresse."\"/></td></tr>
<tr><td>Code postal : </td><td><input type=\"text\" name=\"cp\" value=\"".$cp."\"/></td></tr>
";?>



</table>
<hr/>
<table><?php
echo      "<tr><td>Adresse e-mail : </td><td><input type=\"text\" name=\"adresse\" value=\"".$email."\"/></td></tr>
";?>



</table>






	  <hr/>
	  <table>
	      <tr><td><b> Validation </b></td></tr>
	  </table>
	  <hr/>
	  <table>
	      <tr><td></td><td><input type="submit" value="Etape suivante"></td></tr>
	  </table>
      </form>
