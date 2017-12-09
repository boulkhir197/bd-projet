<?php
session_start();
require("../lib/categorie.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Up Heaven - Le paradis du téléchargement </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css" url="../style/index.css"></style>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<center><img src="../images/logo.png" alt="UpHeaven"></center>
	</header>

    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="index.php">Accueil</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Se connecter </a></li>
        	<li><a href="inscription.php"><span class="glyphicon glyphicon-plus-sign"></span> S'inscrire </a></li>
        </ul>
        </div>
    </div>
    </nav>
    

    <div class="container-fluid text-center">    
    <div class="row content">
 
        <div class="col-sm-3 sidenav">
            <div class="form-group">
            <div class="input-group">
                   <form action="../lib/recherche.php" method = POST>
                   <input type="text" placeholder="Entrez un film, un acteur ..." name="motcle" class="form-control">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-inverse right-rounded">Chercher</button>
                    </div>
                    </form>
                </div>
            </div>
        <p><a href="affiche_films.php">Tous les films disponibles</a></p>
        
        <form action="films.php" method=POST>
          <?php
          afficheTabOption($categorie);
          ?>
        </form>
        </div>
        
        
      <div class="col-sm-9 "> 
        
            <h3> <center> Tous les films disponibles </center> </h3>
            
            
            <form action="" method=GET>
        
                    <?php 
                        extract($_GET);
                        $base = pg_connect("host=houplin user= sbenni password = postgres dbname = upheaven") or die('Erreur de connection ! <br/>'. pg_last_error());
                        
                        $query = "SELECT id_f, titre FROM film ORDER BY titre";
                        $resquery = pg_query($base, $query); 
                        echo("<table>");
                        while ($line = pg_fetch_assoc($resquery)) {
                             echo '<tr> <a href="films.php?id_f=', $line['id_f'],'"/>';
                             echo "</tr>";
                             echo "</td>";
                             echo $line['titre'] ;
                             echo "<br/>";
                             
                        }
                        echo("</table>");
                    ?>
            </form>
            <footer class="container-fluid text-center">
                <p> 2017 - UpHeaven. Tous droits réservés. </p>
            </footer>
      <div>



</body>
</html>
