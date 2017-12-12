<?php

require_once('Database.class.php');

function loginAlreadyExits($login){
    $base = Database::getConnection();
    $requeteSQL = "SELECT login,actif FROM Utilisateur WHERE login='$login'";
    $resultat=pg_exec($base, $requeteSQL) 
          or die("Erreur SQL !<br />$requeteSQL<br />".pg_last_error()) ;
    $nblignes=pg_numrows($resultat) ;
    if ($nblignes==0)
	    return 0;
	else return -1;
}


function mailAlreadyExits($mail){
    $base = Database::getConnection();
    $requeteSQL = "SELECT adresse_mail,actif FROM Utilisateur WHERE adresse_mail='$mail'";
    $resultat=pg_exec($base, $requeteSQL) 
          or die("Erreur SQL !<br />$requeteSQL<br />".pg_last_error()) ;
    $nblignes=pg_numrows($resultat) ;
    if ($nblignes==0)
	    return 0;
	else {
		if (pg_result($resultat,0,"actif"))
			return 1;
		else
			return -1;
	}
}

function afficheTabOpt($tab,$url,$nom="choice",$info=FALSE){
    if (!$info) {
        foreach ($tab as $key => $value) {
            echo "<a href=".$url."?".$nom."=".$key."'>$key</a><br/>";
        }
    }
    else{
        foreach ($tab as $key => $value) {
            echo "<a href='$url?choice=$key'>$value</a><br/>";
        }
    }
}


function filmSearch($wordkey=""){
    $base = Database::getConnection();
    $films=array();
    $wordkey = strtoupper($wordkey);
    $requeteSQL = "SELECT DISTINCT f.id_f,f.titre,f.date_sortie,f.duree,f.serie AS id_s,s.nom AS serie 
                    FROM (film f JOIN (distribution d JOIN acteur a ON d.acteur=a.id_a) ON d.film=f.id_f)
                    FULL JOIN serie s ON f.serie=s.id_s
                    WHERE UPPER(titre) LIKE '%$wordkey%' OR UPPER(a.nom) LIKE '%$wordkey%' OR UPPER(a.prenom)
                    LIKE '%$wordkey%' OR UPPER(s.nom) LIKE '%$wordkey%' OR UPPER(f.resume) LIKE '%$wordkey%' OR UPPER(f.categorie)
                    LIKE '%$wordkey%';";
    $resultat = pg_exec($base, $requeteSQL)
        or die("Erreur SQL !<br />$requeteSQL<br />".pg_last_error());
    $nblignes=pg_numrows($resultat);
    for ($i=0; $i < $nblignes ; $i++) {
        $films[pg_result($resultat,$i,"id_f")]=array(
            "titre"=>pg_result($resultat,$i,"titre"),
            "date_sortie"=>pg_result($resultat,$i,"date_sortie"),
            "duree"=>pg_result($resultat,$i,"duree"),
            "serie"=>pg_result($resultat,$i,"serie")==NULL?"":pg_result($resultat,$i,"serie")
        );
    }
    return $films;
}

?>
