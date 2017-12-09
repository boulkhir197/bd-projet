<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Up Heaven - connexion </title>
    <!--<link type="text/css" rel="stylesheet" media="all" title="CSS" href="../style/inscription.css" />-->
</head>

<body>
	
    <form action="../lib/authentifier.php" method=POST>
		<h1> Connexion </h1>
    	<table>
		    <tr>
		    	<td>Login ou adresse mail :</td>
		    	<td><input type="text" name="log_mail" /></td>
		    </tr>
		    <tr>
		    	<td>Mot de passe :</td>
		    	<td><input type="password" name="password" /></td>
		    </tr>
		    <tr>
				<td>
				</td>
				<td><input type="submit" value="Se connecter" /></td>
			</tr>
		</table>

    </form>	

</body>
</html>
