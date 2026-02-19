<form method=post action="projet.php">
    Veuillez vous inscrire :
<p><label>Login:<input type="text" name="login" maxlength="8" value="user"></label></p>
<p><label>Pass:<input type="password" name="mdp" maxlength="8" value="********"></label></p>
<?php //$_SESSION['nbrConnect']=1
?>
<p><label><input type="submit" name="ok" value="valider"></label></p>
<input type="hidden" name="test" value="1">
</form>

