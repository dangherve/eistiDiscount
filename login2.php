<?php
$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');
mysql_select_db('%%DATABASE%%');


//nom, prenom, type_utilisateu


if (isset($_POST['mdp'])){


  $ma_requete = "SELECT * FROM utilisateur where login=\"".$_POST['login']."\" and mdp=\"".$_POST['mdp']."\";";
  $mes_resultats=mysql_query($ma_requete,$ma_connexion)or die(mysql_error()) ;
  $compteur=0;

  //echo $mes_resultats;
  while( $row = mysql_fetch_assoc($mes_resultats ) ){

    $nom = $row['nom'];
    $prenom = $row['prenom'];
    //echo  "row prenom : ".$row['prenom']."<br/><br/>";
    $compteur=1;
    $_SESSION['type_utilisateur'] = $row['type_utilisateur'];
    $_SESSION['nom'] = $nom;
    //echo "prenom : ".$prenom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['login'] = $_POST['login'];
    //echo "=====".$_SESSION['nom'].$_SESSION['prenom'].$_SESSION['login'];
  }
  if($compteur == 0){
    echo "Login ou mdp incorrect";
  }
  
}

if (isset($_SESSION['nom'])){
  //  echo "jbhidusgkh".$_SESSION['prenom'];
  echo "Bienvenue"." ".$_SESSION['nom']." ".$_SESSION['prenom'];
  echo "<br/>Votre historique<br/>";
  $ma_requete = "SELECT produit.nom 
 FROM utilisateur, produit, achete 
 WHERE produit.id_produit = achete.id_produit 
   AND utilisateur.idu=achete.idu
   AND utilisateur.login=\"".$_SESSION['login']."\" ;";
  $mes_resultats=mysql_query($ma_requete,$ma_connexion)or die(mysql_error()) ;
  while( $row = mysql_fetch_assoc($mes_resultats ) ){
    $nom1 = $row['nom'];
    echo $nom1."<br/>";
  }
 }















?>
<?php
if(!isset($_SESSION['login'])){?>
<form method=post action="projet.php">
	 Veuillez vous inscrire : 
<p><label>Login:<input type="text" name="login" maxlength="90" value="user"/></label></p>
<p><label>Pass:<input type="password" name="mdp" maxlength="10" value="********"/></label></p> 
<p><label><input type="submit" name="ok" value="valider"/></label></p>
<input type="hidden" name="test" value="1">
</form>

<form method=post action="projet.php?page=ajout_ut.php">
<p><label><input type="submit" name="ok" value="S'inscrire"/></label></p>
</form>
      <?php 
}?>
