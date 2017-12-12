<?php
require_once('util.php');

$base = Database::getConnection();
$films=array();
if(isset($_GET['categorie'])){
    $label = $_GET['categorie'];
    $requeteSQL = "SELECT id_f, titre
                FROM film 
                JOIN categorie 
                ON film.categorie = categorie.label
                WHERE film.categorie = ('$label')
                ORDER BY titre";
    $resultat = pg_query($base, $requeteSQL); 
    $nblignes=pg_numrows($resultat);
    for($i=0;$i<$nblignes;$i++) $films[pg_result($resultat,$i,"id_f")]=pg_result($resultat,$i,"titre");
}
elseif(isset($_POST['motcle']) || isset($_GET['motcle'])){
    $wordkey=isset($_GET['motcle'])?$_GET['motcle']:$_POST['motcle'];
    /*$file="search.php/?motcle=".$wordkey;
    $fp = fopen($file, "r");
    $json = json_decode(fgets($fp));
    $json = json_decode(file_get_contents($fp));
    fclose($fp);*/
    $res = filmSearch($wordkey);
    foreach ($res as $key => $value) {
        $films[$key] = $value["titre"]; 
    }
}

include("../php/films.php");
?>
