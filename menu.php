
<div id="menu">
		<span class="Menuu" >
		Menu
		</span>




<div class="liens">

<?php


$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');

$requete_menu="SELECT nom FROM magasin";


$resultat_menu=mysql_query($requete_menu,$ma_connexion)or die(mysql_error()) ;

 while ( $row = mysql_fetch_assoc($resultat_menu))
   {
     $resultat= $row['nom'] ;

		 //		 echo $resultat."\n";

	 	 echo "<a href=\"projet.php?page=".$resultat."\">".$resultat."</a><br/><hr/>";
   }


mysql_free_result($resultat_menu);



if (!isset ($_SESSION['type_utilisateur']))
		$_SESSION['type_utilisateur']=1;

$rechercherarticle="SELECT * FROM produit;";//  WHERE id_categorie=".$idresultat.";";


$mes_resultats2=mysql_query($rechercherarticle,$ma_connexion) or die(mysql_error()) ;





$i=0;


if(	$_SESSION['type_utilisateur'] ==0){
	echo	"<a href=\"projet.php?page=insertion.php\">
		Insertion d'un article
		</a><br/><hr/>";

	echo	"<a href=\"projet.php?page=insertioncat.php\">
		Insertion d'une categorie
		</a><br/><hr/>";

	//	echo	"<a href=\"projet.php?page=admin.php\">
	//gerer les pages admins
	//		</a><br/><hr/>";


	echo	"<a href=\"projet.php?page=utilisateur.php\">
	Gestion des clients
			</a><br/><hr/>";

 }

?>

</div>
</div>

<form  method=post action="projet.php?page=produit.php">
<input type="submit" name="oo" value="Votre recherche">
<input type="text" name="recherche" value="" size="15">

</form>


