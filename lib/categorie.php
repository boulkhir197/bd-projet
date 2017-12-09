<?php
require('util.php');
$categorie = array();
$base = Database::getConnection();
$query = "SELECT * FROM Categorie ORDER BY label";
$resquery = pg_query($base, $query); 
while ($line = pg_fetch_assoc($resquery)) {
    $categorie[$line['label']]=$line['description'];
}
?>