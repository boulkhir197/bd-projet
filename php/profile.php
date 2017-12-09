<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Up Heaven - profile </title>
</head>

<body>
	<form action="#" method=POST>
		<h1> Changer mes informations </h1>
    	<table>
		    <tr>
		    	<td>Adresse mail :</td>
		    	<td><input type="text" name="mail" /></td>
		    </tr>
		    <tr>
		    	<td>Nom :</td>
		    	<td><input type="text" name="nom" /></td>
		    </tr>
		    <tr>
		    	<td>Prénom :</td>
		    	<td><input type="text" name="prenom" /></td>
		    </tr>
		    <tr>
		    	<td>Nouveau mot de passe :</td>
		    	<td><input type="password" name="nvpassword" /></td>
		    </tr>
		    <tr>
		    	<td>Retapez votre nouveau mot de passe :</td>
		    	<td><input type="password" name="checknvpassword" /></td>
		    </tr>
		    <tr>
		    	<td>Mot de passe actuel :</td>
		    	<td><input type="password" name="password" /></td>
		    </tr>
		    <tr>
				<td>
				</td>
				<td><input type="submit" value="Valider" /></td>
			</tr>
		</table>
	</form>

</body>
</html>
