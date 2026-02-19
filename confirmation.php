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

			$message.="produit:".$nom . ", Nombre d'unité(s): " . $nombre .", prix:".$prixtotal."  euros";
		}
	}
	$message.="Total :".$total;

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
