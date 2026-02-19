

<?php

if(isset($_POST['paye'])){
     $ma_connexion=mysql_connect('%%HOTE%%','%%LOGIN%%','%%PASS%%');
     mysql_select_db('%%DATABASE%%');
     






     for ($i=1;$i<($_SESSION['affichage']+1);$i++){
       $nom=$_SESSION['panier'][$i]['nom'];
       $nombre=$_SESSION['panier'][$i]['nombre'];
       //echo $nombre.$nom;
       $ma_requete = "SELECT id_produit,quantite FROM produit WHERE nom=\"".$nom."\";";
       $mes_resultats=mysql_query($ma_requete,$ma_connexion);
       while( $row = mysql_fetch_assoc($mes_resultats ) ){
				 $id_produit=$row['id_produit'];
				 $quantite=$row['quantite'];
       }


			 $quantite=$quantite - $nombre;

			 $ma_requete="UPDATE produit SET quantite='".$quantite."' WHERE id_produit=\"".$id_produit."\";";
       //$ma_requete = "INSERT INTO produit (quantite) Values"."('".$quantite."');";
       mysql_query($ma_requete,$ma_connexion)or die(mysql_error()) ;

       $ma_requete = "SELECT idu FROM utilisateur WHERE login=\"".$_SESSION['login']."\";";
       $mes_resultats = mysql_query($ma_requete,$ma_connexion)or die(mysql_error()) ;
       while( $row = mysql_fetch_assoc($mes_resultats ) ){
				 $idu=$row['idu'];
       }
       //echo $idu." ".$id_produit;


       $jour = date('d');
       $mois = date('m');
       $annee = date('Y');

       $ma_requete= "INSERT INTO achete (idu,id_produit,quantite,jj,mm,aaaa) Values ('".$idu."','".$id_produit."','".$nombre."','".$jour."','".$mois."','".$annee."');";

       mysql_query($ma_requete,$ma_connexion)or die(mysql_error()) ;




       //while( $row = mysql_fetch_assoc($mes_resultats ) ){
       //  $compteur=1;
       //}
     }
   }



?>



<?php
function message(){
	$message= "Nous vous remercions de voter confiance. Voici un récapitulatif de votre commande :
";
	$total=0;
	for ($i=1;$i<($_SESSION['affichage']+1);$i++){
		$nom=$_SESSION['panier'][$i]['nom'];
		$nombre=$_SESSION['panier'][$i]['nombre'];
		$prix=$_SESSION['panier'][$i]['prix'];
		$prixtotal=$_SESSION['panier'][$i]['prixtotal'];

		$total=$prixtotal+$total;

		if ($nombre > 0){

			$message.="produit:".$nom . ", Nombre d'unité(s): " . $nombre .", prix:".$prixtotal."  euros
";
		}
	}
	$message.="Total :".$total."
";

	$message.="En vous remerciant de votre visite";
	return $message;
}

$to=$_POST['mail'];
$sujet="Commande EIsTI";
$message=message();
$headers="From: EISTI<eistidiscount@eisti.fr>";
//MAIL DISABLE
//mail($to,$sujet,$message,$headers);
?>

Paiement effectué



<?php

	for ($i=1;$i<($_SESSION['affichage']+1);$i++){

		$_SESSION['panier'][$i]['nombre']=0;
	}

?>
