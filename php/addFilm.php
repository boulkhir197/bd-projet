<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Up Heaven - Ajouter un film </title>
</head>

<body>
	<form action="#" method=POST>
		<h1> Ajouter un film </h1>
    	<table>
		    <tr>
		    	<td>Titre de film :</td>
		    	<td><input type="text" name="titre" /></td>
		    </tr>
		    <tr>
		    	<td>Date de sortie :</td>
		    	<td><input type="text" name="date_sortie" /></td>
		    </tr>
		    <tr>
		    	<td>La durée de film :</td>
		    	<td><input type="text" name="duree" /></td>
		    </tr>
		    <tr>
		    	<td>Resumé :</td>
		    	<td><input type="text" name="resume" /></td>
		    </tr>
		    <tr>
		    	<td>Catégorie :</td>
		    	<td><input type="text" name="categorie" /></td>
		    </tr>
		    <tr> <!-- là on va mettre un `select` -->
		    	<td>Série :</td>
		    	<td><input type="text" name="serie" /></td>
		    </tr>
		    <tr style="display: none">
		    	<td>Nom de nouvelle série :</td>
		    	<td><input type="text" name="nvserie" /></td>
		    </tr>
		    <tr>
		    	<td>Numéro d'épisode :</td>
		    	<td><input type="number" name="num_ep" /></td>
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
