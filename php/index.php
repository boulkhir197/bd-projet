<?php
session_start();
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
		<img src="../images/logo.png" alt="UpHeaven">
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
                   <input type="text" placeholder="Entrez un film, un acteur, une catégorie ..." name="motcle" class="form-control">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-inverse right-rounded">Chercher</button>
                    </div>
                    </form>
                </div>
            </div>
        <p><a href="#">Tous les films disponibles</a></p>
        <form action="films.php" method=POST>
            <?php
            afficheTabOption($categorie);
            ?>
        </form>
        </div>
        <div class="col-sm-9 text-left"> 
       
        <h1 id="titre"> Films à l'affiche </h1>
        
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		      <div class="item active">
		        <img src="../images/bladerunner.jpeg" alt="Blade Runner 2049">
		      </div>

		      <div class="item">
		        <img src="../images/Justice_League.jpg" alt="Justice League">
		      </div>
		    
		      <div class="item">
		        <img src="../images/lamontahneentrenous.jpg" alt="La montagne entre nous">
		      </div>
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Précédent</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Suivant</span>
		    </a>
		</div>
        
        </div>
    	</div>
    </div>

    <footer class="container-fluid text-center">
    <p>Footer Text</p>
    </footer>

</body>
</html>
