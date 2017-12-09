<?php
require_once('Database.class.php');
require('User.class.php');


function correctPassword($input, $password){
    return $input == $password;
}

function controleAuthentification() {
    extract($_POST);
    $nblignes=0 ;
    if (strpos($log_mail,'@')) {
        $base = Database::getConnection();
        $requeteSQL = "SELECT DISTINCT login,nom,prenom,adresse_mail,mot2passe FROM utilisateur WHERE adresse_mail='$log_mail'";
        $resultat = pg_exec($base, $requeteSQL) 
            or die("Erreur SQL !<br />$requeteSQL<br />".pg_last_error()) ;
        $nblignes=pg_numrows($resultat) ;
    }
    if ($nblignes==0){
        $base = Database::getConnection();
        $requeteSQL = "SELECT DISTINCT login,nom,prenom,adresse_mail,mot2passe FROM utilisateur WHERE login='$log_mail'";
        $resultat = pg_exec($base, $requeteSQL) 
            or die("Erreur SQL !<br />$requeteSQL<br />".pg_last_error()) ;
        $nblignes=pg_numrows($resultat) ;
    } 
    if ($nblignes!=0) {
        $pass = pg_result($resultat,0,"mot2passe");
        if (correctPassword($password,$pass)){
            $_SESSION['user']= new User(pg_result($resultat,0,"login"),pg_result($resultat,0,"nom"),pg_result($resultat,0,"prenom"),pg_result($resultat,0,"adresse_mail"));
            echo " Génial ! Vous nous avez manqué.";
            header("refresh:2;url=../php/index.php");
        }
        else {
            echo "Mot de passe erroné, veuillez réessayer.";
            header("refresh:2;url=../php/connexion.php");
        }
    }
    else{
        header('Content-Type: text/html; charset=utf-8');
        echo "Ce login/mail n'existe pas.";
        header("refresh:2;url=../php/connexion.php");
        //throw new Exception("Vous n'êtes pas connecté!");
    }
}

header('Content-Type: text/html; charset=utf-8');
controleAuthentification();

?>
