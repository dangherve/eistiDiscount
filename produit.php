<table class="tableauproduit" border="1">

<?php

$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');




if(isset($categorie)){


	$recherchecat="SELECT id_categorie FROM magasin WHERE nom=\"".$categorie."\";";

	$mes_resultats=mysql_query($recherchecat,$ma_connexion);

	while ( $row = mysql_fetch_assoc($mes_resultats))
		{
			$idresultat= $row['id_categorie'] ;
		}

	mysql_free_result($mes_resultats);

	$rechercherarticle="SELECT * FROM produit  WHERE id_categorie=".$idresultat.";";

	$affichage_produit=mysql_query($rechercherarticle,$ma_connexion) or die(mysql_error()) ;

 }else if (isset($_SESSION['recherche'])){


	$search=$_SESSION['recherche'];

 	$search=$_SESSION['recherche'];
 	$requete_recherche="SELECT * FROM produit WHERE nom LIKE '%$search%';";
 	$affichage_produit=mysql_query($requete_recherche,$ma_connexion)or die(mysql_error());

	unset($_SESSION['recherche']);


 }else{
		 $rechercherarticle="SELECT * FROM produit;";


		 $affichage_produit=mysql_query($rechercherarticle,$ma_connexion) or die(mysql_error()) ;

		 $rand=1;
 }


$i=0;
while (( $row = mysql_fetch_assoc($affichage_produit)) && $i !=3)
  {
		$image=$row['image'];
		$nom=$row['nom'];
		$description=$row['description'];
		$prix=$row['prix'];
		$livraison=$row['livraison'];
		$stocks=$row['quantite'];
 		$promo=$row['promo'];
		$info=$row['info'];

	 	$commande=$row['id_produit'];



		if (!($rand==1) || ((rand(0,1)== 1))){

		echo "

<tr class=\"pollux\">

<td>
<center>
<img alt=\"image\"src=\"../image/$image\" class=\"image\">
<!-- <img alt=\"image\"src=\"$image\" class=\"image\"> -->
</center>
</td>

<td>
<div class=\"article\">
<span class=\"nom\">$nom</span><br/>
";

		if ($description != NULL )
			{	echo "	<span class=\"descrition\">$description</span><br/>";
			};
		echo "
<span class=\"prix\">$prix €</span><br/>

";
		if ($livraison != NULL )
			{echo "<span class=\"livraison\">$livraison</span><br/>";
			};

		if ($stocks != NULL ){
			if (($_SESSION['type_utilisateur'] != 0) && ($stocks < 1)) {
				echo "<span class=\"stocks\">Rupture de stocks livraison dès que possibles</span><br/>";
			}else{
				echo "<span class=\"stocks\">$stocks disponibles</span><br/>";
			};
		};

		if ($promo != NULL ){
			echo "<span class=\"promo\">$promo</span><br/>";
			};


		if ($info != NULL )
			{echo "<span class=\"info\"><a href=projet.php?page=$info>Plus d'information</a></span><br/>";
			};

		?>

			<?php



						echo "
					<form method=\"post\" action=\"projet.php?page=$page\">

<p><label><input type=\"submit\" name=\"ok\" value=\"Ajouter au panier\"/></label></p>
					  <p><input type=\"hidden\" name=\"produit\" value=\"$commande\"/></p><br/>
			 <p><input type=\"hidden\" name=\"ajouter\" value=\"1\"/></p><br/>


	</form>
				";

		if(	$_SESSION['type_utilisateur'] ==0){
			echo "
			<form method=\"post\" action=\"projet.php?page=miseajour.php\">

<p><label><input type=\"submit\" name=\"ok\" value=\"metttre à jour l'article\"/></label></p>
					  <p><input type=\"hidden\" name=\"produit\" value=\"$commande\"/></p><br/>


	</form>
	";
		}
		echo"
			</div>
				</td>

				</tr>
";
		if($rand==1){
			$i=$i+1;
		}

		}

	}
$rand=0;



mysql_free_result($affichage_produit);

mysql_close($ma_connexion);

?>


</table>




