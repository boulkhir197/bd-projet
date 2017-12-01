<?php

// connexion à une base
$base= pg_connect("host=houplin user=mboulkhi password=postgres dbname=upheaven") 
       or die('Erreur de Connection !<br />'.pg_last_error()) ;

?>