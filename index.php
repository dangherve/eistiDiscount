<?php session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Site de vente en ligne de l Eisti</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
		<meta name="author" content="Ancel Loic">
		<meta name="author" content=" Calmet Martial">
		<meta name="author" content="Dang Hervé">
		<meta name="keywords" content="vente, eisti, produit, marche">
		<meta name="description" content="Site de vente en ligne">
		<meta name="robots" content="all">
		<link rel="stylesheet" type="text/css" href="accueil.css">
</head>

<body>

<?php
function recherche ($produit, $nom, $prix){
	$trouve=FAUX;
	$test=$_SESSION['affichage'];
 	for ($i=1;$i<($test+1);$i++){
 		if (((strcmp (	$_SESSION['panier'][$i]['id_produit'],  $produit)) == 0) && ($trouve == FAUX)){

			if ($_SESSION['panier'][$i]['nombre'] == 0){
				$_SESSION['nb_produit'] = $_SESSION['nb_produit']+1;
			}


			$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

			mysql_select_db('%%DATABASE%%');
			

			$rechercherarticle="SELECT quantite FROM produit  WHERE id_produit=".$produit.";";

			$mes_resultats=mysql_query($rechercherarticle,$ma_connexion) or die(mysql_error()) ;

			while ( $row = mysql_fetch_assoc($mes_resultats))
				{
					$qtedispo=$row['quantite'];
				}

			$tmp=$_SESSION['panier'][$i]['nombre']+1;

			if ($tmp > $qtedispo){
				echo("<script language='Javascript'>alert('Quantité demandée non disponible');</script>");
			}else{
				$_SESSION['panier'][$i]['nombre']=$tmp;
			}

			mysql_free_result($mes_resultats);

			mysql_close($ma_connexion);



			$trouve=VRAI;

 		}
 	}

 	if ($trouve == FAUX){
 		$_SESSION['affichage'] = $_SESSION['affichage']+1;
		$_SESSION['nb_produit'] = $_SESSION['nb_produit']+1;
		$nb= $_SESSION['affichage'];
		$_SESSION['panier'][$nb]=array(
																	 "id_produit"=>$produit,
																	 "nom"=>$nom,
																	 "prix"=>$prix,
																	 "nombre"=>1);
	}
}
?>


<?php
function recherche2 ( $produit, $nombre){
	$test=$_SESSION['affichage'];
 	for ($i=1;$i<($test+1);$i++){
 		if ((strcmp (	$_SESSION['panier'][$i]['id_produit'],  $produit)) == 0){
			if ($nombre <0){
				$_SESSION['panier'][$i]['nombre']=0;
			}else{

				$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

				
				mysql_select_db('%%DATABASE%%');
			
				$rechercherarticle="SELECT quantite FROM produit  WHERE id_produit=".$produit.";";

							$mes_resultats=mysql_query($rechercherarticle,$ma_connexion) or die(mysql_error()) ;

			while ( $row = mysql_fetch_assoc($mes_resultats))
				{
					$qtedispo=$row['quantite'];
				}

			$tmp=$nombre;

			if ($tmp > $qtedispo){
				echo("<script language='Javascript'>alert('Quantité demandée non disponible');</script>");
			}else{
				$_SESSION['panier'][$i]['nombre']=$tmp;
			}

			mysql_free_result($mes_resultats);

			mysql_close($ma_connexion);


			}
		}
	}
}
?>


<?php
  if  (isset ($_POST['recherche']))
		$_SESSION['recherche']= $_POST['recherche'];
?>

<?php if (!isset ($_SESSION['nb_produit']))
		$_SESSION['nb_produit']=0;
?>

<?php
if ($_POST)
	{

		if ($_POST['enlever'] ==1 ){
			$test=$_SESSION['affichage'];
			for ($i=1;$i<($test+1);$i++){
				if ((strcmp (	$_SESSION['panier'][$i]['id_produit'],  $_POST['produit']) == 0)){
					$_SESSION['panier'][$i]['nombre']=$_SESSION['panier'][$i]['nombre']-1;
					if ($_SESSION['panier'][$i]['nombre'] == 0){
						$_SESSION['nb_produit']= $_SESSION['nb_produit']-1;
					}
				}
			}
		}

		if ($_POST['ajouter'] ==1 ){

			$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

			
			mysql_select_db('%%DATABASE%%');

			$produit=$_POST['produit'];

			$rechercheinfo="SELECT nom, prix FROM produit WHERE id_produit=\"".$produit."\";";
			//essai injection sql
			//	echo $rechercheinfo."<br/><br/>";

			$resultats_recherche_info=mysql_query($rechercheinfo,$ma_connexion) or die(mysql_error()) ;


			while ( $row = mysql_fetch_assoc($resultats_recherche_info)){
					$nom =$row['nom'] ;
					$prix= $row['prix'];
			}

			//mysql_free_result(resultats_recherche_info);

			mysql_close($ma_connexion);


			if ( ($_SESSION['nb_produit'])==0 ){
					$_SESSION['nb_produit']=1;
					$_SESSION['affichage']=1;
					$_SESSION['panier'][1]=array(
																			 "id_produit"=>$produit,
																			 "nom"=>$nom,
																			 "prix"=>$prix,
																			 "nombre"=>1
																			 );

		}else{
				recherche ($produit, $nom, $prix);
			}
		}


		if ($_POST['ajouter'] == 2 ){
			$produit=$_POST['produit'];
			$nombre=$_POST['quantite'];

			recherche2 ($produit,$nombre);
		}

		else {$produit="none";}
	}
?>


<?php
if  (isset ($_GET['page']))
  	 { $page=$_GET['page'];
 } else {
	 $page="produit.php";
 }

 ?>




<?php
include("acceuil.php");
?>


<div id="panier">
	<?php

 if($SESSION['nbrConnect'] != 1){
	include("login2.php");
 }

include("panier2.php");

?>


</div>

<div id="menu1">
	<?php include("menu.php");?>
</div>


<div id="interieur">

<?php

$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');

$recherchecat="SELECT nom FROM magasin;";

$mes_resultats_cat=mysql_query($recherchecat,$ma_connexion)or die(mysql_error());

while ( $row = mysql_fetch_assoc($mes_resultats_cat))
	{
		$resultat= $row['nom'] ;

 		if ($page == $resultat)
 			{
				$categorie=$resultat;
				include ("produit.php");
 			}

	}


mysql_free_result($mes_resultats_cat);

//mysql_close($ma_connexion);

$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

mysql_select_db('%%DATABASE%%');


$recherchepagearticle="SELECT * FROM produit;";


$mes_resultats_page_article=mysql_query($recherchepagearticle,$ma_connexion)or die(mysql_error()) ;



 while ( $row = mysql_fetch_assoc($mes_resultats_page_article))
    {
      $resultat= $row['info'] ;

 		if ($page == $resultat)
 			{
				include ($resultat);
			}
   }

mysql_free_result($mes_resultats_page_article);

//$ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');

//mysql_select_db('%%DATABASE%%');

$recherchepageadmin="SELECT * FROM page_admin;";


$mes_resultats_page_admin=mysql_query($recherchepageadmin,$ma_connexion)or die(mysql_error()) ;



 while ( $row = mysql_fetch_assoc($mes_resultats_page_admin))
    {
      $resultat= $row['nompage'] ;

			if ($page == $resultat)
 			{
				include ($resultat);
			}
   }

mysql_free_result($mes_resultats_page_admin);

?>

<p>Venez tester tous nos avantages clients</p>

</div>

</body>
</html>
