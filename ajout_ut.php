<?php
$affiche=0;

$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');
mysql_select_db('%%DATABASE%%');


if (isset($_POST['login'])){
  $ma_requete = "SELECT nom FROM utilisateur where login=\"".$_POST['login']."\";";
  $mes_resultats=mysql_query($ma_requete,$ma_connexion)or die(mysql_error()) ;
  $compteur=0;

  while( $row = mysql_fetch_assoc($mes_resultats ) ){
    $compteur=1;
  }













  if($compteur != 1){

  $message="INSERT INTO utilisateur (nom, prenom , login, mdp , jj , mm , aaaa , adresse , ville, cp , email) Values ('".$_POST['nom']."','". $_POST['prenom']."','". $_POST['login']."','".$_POST['mdp']."','".$_POST['jj']."','".$_POST['mm']."','".$_POST['aaaa']."','".$_POST['adresse']."','".$_POST['ville']."','".$_POST['cp']."','".$_POST['email']."');";

  mysql_query($message,$ma_connexion) or die(mysql_error()) ;



  mysql_close($ma_connexion);
  echo "Votre compte a bien été créé.<br>";
	$affiche=1;


  }else{
    echo "Ce login est déjà utilisé, veuillez en choisir un autre.<br>";
  }
 }

if ($affiche==0){
echo "Veuillez saisir vos coordonnées :
<form method=\"post\" action=\"projet.php?page=ajout_ut.php\">
<table>
<tr><td>Nom : </td><td>
<input type=\"text\" name=\"nom\"/>
</td></tr><tr><td>Prenom : </td><td>
<input type=\"text\" name=\"prenom\"/>
</td></tr><tr><td>Login : </td><td>
<input type=\"text\" name=\"login\"/>
</td></tr><tr><td>Mot de passe : </td><td>
<input type=\"text\" name=\"mdp\"/>
</td></tr><tr><td>Jour de naissance : </td><td>
<input type=\"text\" name=\"jj\"/>
</td></tr><tr><td>Mois de naissance : </td><td>
<input type=\"text\" name=\"mm\"/>
</td></tr><tr><td>Année de naissance : </td><td>
<input type=\"text\" name=\"aaaa\"/>
</td></tr><tr><td>Adresse : </td><td>
<input type=\"text\" name=\"adresse\"/>
</td></tr><tr><td>Ville : </td><td>
<input type=\"text\" name=\"ville\"/>
</td></tr><tr><td>Code postal: </td><td>
<input type=\"text\" name=\"cp\"/>
</td></tr><tr><td>Adresse mail : </td><td>
<input type=\"text\" name=\"email\"/>
</td></tr>
</table>";

echo "<input type=\"submit\" name=\"ooo\" value=\"valider\"/>";

echo"</form>";
 }else{
	$categorie="rand";
	include ("produit.php");
 }
	?>
