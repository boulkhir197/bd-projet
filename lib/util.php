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

function afficheTabOption($tab,$info=FALSE){
    if (!$info) {
        echo "<select name='choice'  size=".sizeof($tab)." >";
        foreach ($tab as $key => $value) {
            echo "<option value='$key'>$key</option>";
        }
        echo "</selcet>";
        echo "<input type='submit'>";
    }
    else{
        echo "<select name='choice'  size=".sizeof($tab)." >";
        foreach ($tab as $key => $value) {
            echo "<option value='$key'>$value</option>";
        }
        echo "</selcet>";
        echo "<input type='submit'>";
    }
    
}

?>
