<table class="tableauproduit" border="1">

<?php

//  $fic=fopen("informatique.txt",r);

$fic=fopen($fichier,"r");

while (!feof($fic)) {
    $image=fgets($fic,255);
    $nom=fgets($fic,255);
    $description=fgets($fic,255);
    $prix=fgets($fic,255);
    $livraison=fgets($fic,255);
    $stocks=fgets($fic,255);
    $promo=fgets($fic,255);
    $info=fgets($fic,255);
    $commande=fgets($fic,255);
    fgets($fic,255);

    echo "

        <tr class=\"pollux\">

        <td>
        <center>
        <img alt=\"image\"src=\"image/$image\" class=\"image\">
        <!-- <img alt=\"image\"src=\"$image\" class=\"image\"> -->
        </center>
        </td>

        <td>
        <div class=\"article\">
        <span class=\"nom\">$nom</span><br>
        ";

    if ($description != "none\n" ){
        echo "<span class=\"descrition\">$description</span><br>";
    };
    echo "
    <span class=\"prix\">$prix &euro;</span><br>

    ";

    if ($livraison != "none\n" ){
        echo "<span class=\"livraison\">$livraison</span><br>";
    };

    if ($stocks != "none\n" ){
        echo "<span class=\"stocks\">$stocks</span><br>";
    };

    if ($promo != "none\n" ){
        echo "<span class=\"promo\">$promo</span><br>";
    };

    if ($info != "none\n" ){
        echo "<span class=\"info\"><a href=\"$info\">Plus d'information</a></span><br>";
    };

    echo "
    <!--<a href=\"projet.php?produit=$commande\">
    Ajouter au panier
    </a>
    -->

    <form method=\"post\" action=\"projet.php?page=$page\">

    <p><label><input type=\"submit\" name=\"ok\" value=\"Ajouter au panier\"></label></p>
     <p><input type=\"hidden\" name=\"produit\" value=\"$commande\"></p><br>
     <p><input type=\"hidden\" name=\"prix\" value=\"$prix\"></p><br>
     <p><input type=\"hidden\" name=\"ajouter\" value=\"1\"></p><br>
    </form>

    </div>
    </td>

    </tr>

    ";
}

?>
</table>

