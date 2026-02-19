<form method="post" action="projet.php?page=confirmation">
<table>

<tr><td><b> Coordonnées bancaires </b></td></tr>
</table>

<hr>
	 <table>
<tr><td>Numéro de la carte : </td><td><input type="text" name="numeroCB"></td></tr>
<tr><td>Date de péremption de votre carte : </td><td><input type="text" name="datepremption"></td></tr>
<tr><td>Pictohramme visuel : </td><td><input type="text" name="pictohramme"></td></tr>
</table>


<hr>
	 <table>
<tr><td><b> Validation </b></td></tr>
</table>
<hr>
	 <table>
<tr><td></td><td><input type="submit" value="Validation de la commande"></td></tr>
</table>

<?php
echo "<p><input type=\"hidden\" name=\"mail\" value=\"".$_POST['mail']."\"></p>";
?>


</form>

