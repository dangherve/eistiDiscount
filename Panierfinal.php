
     <table>
     <tr>
<td>
<b>
Votre panier
</b>
</td>
</tr>
</table>
<hr id="ligne">
<table class="tableaupanier" border="1">
     <tr>
<td width="15%">
Produit
</td>
<td width="23%">
Prix unitaire
</td>
<td width="15%">
Quantité
</td>
<td width="20%">
     Modification
</td>

<td width="40%">
Prix total
</td>
</tr>


<?php
function additionpanier(){
     $resultat=0;
     for ($i=1;$i<($_SESSION['affichage']+1);$i++){
         $resultat = $resultat + $_SESSION['panier'][$i]['prixtotal'];
     }
     return $resultat;
 }
     ?>

     <?php
         for ($i=1;$i<($_SESSION['affichage']+1);$i++){
             $nom=$_SESSION['panier'][$i]['nom'];
             $nombre=$_SESSION['panier'][$i]['nombre'];
             $prix=$_SESSION['panier'][$i]['prix'];
             $prixtotal =$prix*$nombre;
             $_SESSION['panier'][$i]['prixtotal']=$prixtotal ;

             if ($nombre >0){
                 echo "
<tr>
<td>
$nom
</td>
<td>
$prix &euro
</td>
<td>

<form method=\"post\" action=\"projet.php?page=$page\">
    <p><label><input type=\"text\" name=\"quantite\" value=\"$nombre\" size=\"2\"></label></p>


<td>
<span class=\"modifier\">
<center><p><label><input type=\"submit\" name=\"ok\" value=\"modifier\"></label></p></center>
</span>
</td>

<p><input type=\"hidden\" name=\"produit\" value=\"$nom\"></p>
<p><input type=\"hidden\" name=\"ajouter\" value=\"2\"></p>
</form>

</td>
<td>
$prixtotal €
</td>
</tr>


";
}
}
     echo "</table>";
     echo "<br>";
echo "<span class=\"prixtotal\">";
echo "  Prix final : ".additionpanier();
echo " € ";
echo "</span>";
echo "<br><br>";
?>



 <form  method="post" action="projet.php?page=utilisateur">
<span class="valider"><input value="Validation" type="submit"></span>

 </form>


