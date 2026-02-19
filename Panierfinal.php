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
<td width="20%">
Produit
</td>
<td width="20%">
Prix unitaire
</td>
<td width="15%">
Quantité
</td>
<!--<td width="20%">
	 Modification
</td>-->

<td width="25%">
<?php
	 if (  $_SESSION['type_utilisateur']==1){
		 echo" Prix total";
	 }else{
			 echo" Prix total avec reduction privilège";
	 }
?>
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
	 $id_produit=$_SESSION['panier'][$i]['id_produit'];
	 $nom=$_SESSION['panier'][$i]['nom'];
	 $nombre=$_SESSION['panier'][$i]['nombre'];
	 $prix=$_SESSION['panier'][$i]['prix'];

	 if (  $_SESSION['type_utilisateur']==1){
		 $prixtotal =$prix*$nombre;
	 }else{
		 $prixtotal =$prix*$nombre*0.99;
	 }

	 $_SESSION['panier'][$i]['prixtotal']=$prixtotal ;

	 if ($nombre >0){
		 echo "
<tr>

 <td> $nom </td>
 <td> $prix € </td>

<td>
<form method=\"post\" action=\"projet.php?page=$page\">
	<center>
   <label>
    <input type=\"text\" name=\"quantite\" value=\"$nombre\" size=\"2\"/>
   </label>
<!--  </center>
</td>
<td>
<span class=\"modifier\">
  <center>-->

    <label>
     <input type=\"submit\" name=\"ok\" value=\"modifier\"/>
    </label>
  </center>

<!-- </span>-->


<input type=\"hidden\" name=\"produit\" value=\"$id_produit\"/>
<input type=\"hidden\" name=\"ajouter\" value=\"2\"/>
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
echo "<br/>";
echo "<span class=\"prixtotal\">";
echo "Prix final : ".additionpanier();
echo " € ";
echo "</span>";
echo "<br/><br/>";

?>



<form  method="post" action="projet.php?page=commande2.php">
	<span class="valider"><input value="Validation" type="submit"/></span>

</form>



