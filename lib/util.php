<?php

require_once('baseConnection.php');

function random64String($n){
    static $charset =  "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789./";
    $res ="";
    for ($i=0; $i<$n; $i++){
        $res .= $charset{rand(0,strlen($charset)-1)};
    }
    return $res;
}

function randomSalt(){
    return '$2a$10$'.random64String(22);
}


function loginAlreadyExits($login){
    $requeteSQL = "SELECT login,actif FROM Utilisateur WHERE adresse_mail='$login'";
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


function mailAlreadyExits($mail){
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

?>