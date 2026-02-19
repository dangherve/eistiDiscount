<hr>
<?php
if(!isset($_SESSION['login']))
    $_SESSION['login']="";

if(!isset($_SESSION['nb_produit']))
    $_SESSION['nb_produit']=0;
?>


Bonjour <?php echo $_SESSION['login'] ?><br>
Vous avez <?php echo $_SESSION['nb_produit'] ;?> achat(s) actuellement dans votre panier.<br>

<?php
if(isset($_SESSION['panier'])){
    for ($i=1;$i<($_SESSION['affichage']+1);$i++){
        $nom=$_SESSION['panier'][$i]['nom'];
        $nombre=$_SESSION['panier'][$i]['nombre'];
        $prix=$_SESSION['panier'][$i]['prix'];

        if ($nombre > 0){
            echo "nom:".$nom . "<br /> " . "Nombre d'unité(s): " . $nombre . "<br />";

            echo "
                <form method=\"post\" action=\"projet.php?page=$page\">
                <p><label><input type=\"submit\" name=\"ok\" value=\"enlever article\"></label></p>
                <p><input type=\"hidden\" name=\"produit\" value=\"$nom\"></p>
                <p><input type=\"hidden\" name=\"enlever\" value=\"1\"></p>
                </form>
            ";
        }
    }
}
?>
Choisissez un produit à ajouter :

<form method="post" action="projet.php?page=panier">
<p><label><input type="submit" name="ok" value="Valider le panier"></label></p>
</form>

<hr>

<form name="toto" method="post" action="deco.php">
<input type="submit" value="Deconnection" name="deco">
</form>

