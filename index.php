<?php session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
    <head>
        <title>Site de vente en ligne de l Eisti</title>
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
function verif_user($a,$b){
    $tableau=file("utilisateur.txt");
    $var=1;
    for($i=0;$i<3;$i=$i+1){
        $tab=explode("+",$tableau[$i]);
        if ($tab[0]==$a){
            if ($tab[1]==$b){
                $var=0;
            }
        }
    }
        return ($var);
}

function recherche ( $produit,$prix){
    $trouve=FAUX;
    $test=$_SESSION['affichage'];
    for ($i=1;$i<($test+1);$i++){
        if (((strcmp ( $_SESSION['panier'][$i]['nom'],  $produit)) == 0) && ($trouve == FAUX)){

            if ($_SESSION['panier'][$i]['nombre'] == 0){
                $_SESSION['nb_produit'] = $_SESSION['nb_produit']+1;
            }

            $_SESSION['panier'][$i]['nombre']=$_SESSION['panier'][$i]['nombre']+1;
            $trouve=VRAI;
         }
     }

    if ($trouve == FAUX){
        $_SESSION['affichage'] = $_SESSION['affichage']+1;
        $_SESSION['nb_produit'] = $_SESSION['nb_produit']+1;
        $nb= $_SESSION['affichage'];
        $_SESSION['panier'][$nb]=array(
            "nom"=>$produit,
            "prix"=>$prix,
            "nombre"=>1);
    }
}
function recherche2 ( $produit, $nombre){
    $test=$_SESSION['affichage'];
    for ($i=1;$i<($test+1);$i++){
        if ((strcmp ( $_SESSION['panier'][$i]['nom'],  $produit)) == 0){
            $_SESSION['panier'][$i]['nombre']=$nombre;
        }
    }
}
if (!isset ($_SESSION['nb_produit']))
        $_SESSION['nb_produit']=0;

if ($_POST){

    if ($_POST['enlever'] ==1 ){
        $test=$_SESSION['affichage'];
        for ($i=1;$i<($test+1);$i++){
            if ((strcmp ($_SESSION['panier'][$i]['nom'],  $_POST['produit']) == 0)){
                $_SESSION['panier'][$i]['nombre']=$_SESSION['panier'][$i]['nombre']-1;
                if ($_SESSION['panier'][$i]['nombre'] == 0){
                    $_SESSION['nb_produit']= $_SESSION['nb_produit']-1;
                }
            }
        }
    }

    if ($_POST['ajouter'] ==1 ){
        $produit=$_POST['produit'];
        $prix=$_POST['prix'];
        recherche ($produit,$prix);
    }


    if ($_POST['ajouter'] == 2 ){
        $produit=$_POST['produit'];
        $nombre=$_POST['quantite'];

        recherche2 ($produit,$nombre);
    }else {
        $produit="none";
    }
}
if (isset ($_GET['page'])){
    $page=$_GET['page'];
}else {
    $page="p0";
}

include("acceuil.php");
?>

<div id="menu1">
    <?php include("menu.php");?>
</div>

<div id="panier">
    <?php

if(isset($_POST['test']) && $_POST['test'] ==1){

        $_SESSION['login']=$_POST['login'];
        $_SESSION['pass']=$_POST['mdp'];
        $_SESSION['nbrConnect']=0;

        if(verif_user($_SESSION['login'],$_SESSION['pass'])==0)
            {
                $_SESSION['nbrConnect']=1;
            }
        else if ($_SESSION['login']=="user")
            {
                echo("<script language='Javascript'>alert('Veuillez rentrer un nom d\'utilisateur et un mot de passe valide');</script>");

            }
        else
            {
                echo("Vous n'etes pas inscrit");
            }

    }

if(!isset($_SESSION['nbrConnect'] )){
    include("login.php");
}

include("panier2.php");

?>

</div>

<div id="interieur">

<?php
if ($page == "p0"){
    $fichier="avion.txt"; //fichier a changer
    include ("produit.php");
}

if ($page == "p1"){
    $fichier="informatique.txt";
    include ("produit.php");
}

if ($page == "p2"){
    $fichier="avion.txt";
    include ("produit.php");
}
if ($page == "p3"){
    $fichier="robot.txt";
    include ("produit.php");
}

if ($page == "p4"){
    $fichier="drone.txt";
    include ("produit.php");
}

if ($page == "roomba"){
    include ("roomba.html");
}

if ($page == "cleaner"){
    include ("cleaner.html");
}

if ($page == "electrolux"){
    include ("electrolux.html");
}

if ($page == "lego"){
    include ("lego.html");
}

if( $page == "panier"){
    include ("Panierfinal.php");
}

if( $page == "utilisateur"){
    include ("commande.php");
}

if( $page == "paiement"){
    include ("Paiement.php");
    }

if( $page == "confirmation"){
    include ("confirmation.php");
    }

?>




<p>Venez tester tous nos avantages clients</p>
</div>

</body>
</html>
