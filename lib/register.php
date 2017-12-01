<?php

require_once('Database.class.php');
require_once('util.php');



function addToDatabase(){
    extract($_POST) ;
    $base = Database::getConnection();
    $requeteSQL = "INSERT INTO Utilisateur(login,adresse_mail,nom,prenom,mot2passe) VALUES($login,$mail,$nom,$prenom,".crypt($password, randomSalt()).")";
    pg_exec($base, $requeteSQL) 
          or die("Erreur SQL !<br />$requeteSQL<br />".pg_last_error()) ;

}


function condition(){
    return isset($_POST['login'],$_POST['mail'], $_POST['nom'],$_POST['prenom'], $_POST['password']) && !empty($_POST['login'])
    && !empty($_POST['mail']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password']);
}


function notActif($param){
    echo "<script type=\"javascript/text\">
            if(confirm('Ce mail ".$param." est un compte désactivé. Voulez vous vous réabonner ?')){window.location.replace(\"reabonnement.php\");}</script>";
}


function init(){
    if(condition()){
        switch (loginAlreadyExits($_POST['login'])) {
        	case 0:
                switch (loginAlreadyExits($_POST['mail'])) {
                    case 0:
                    addToDatabase();
                    break;
                case 1:
                    notActif($_POST['mail']);
                    break;
                case -1:
                    echo "Ce mail <b>".$_POST['mail']."</b> existe déjà , choisissez un autre adresse mail ou essayez de vous connecter si vous êtes déjà inscrit";
                    break;
                }
            case -1:
                echo "Ce nom d'utilisateur <b>".$_POST['login']."</b> existe déjà , choisissez un autre nom d'utilisateur de vous connecter si vous êtes déjà inscrit";
                break;
        }
    } else{
        echo "Wrong inputs ! ";
        echo "<br /><a href=\"../index.php\">Click here to retry or Sign up</a>";

    }
}

<<<<<<< HEAD
=======
header("Location: ../php/inscription.php");
>>>>>>> d088c26135a215aa419d2f97c784286ffd8773db
init();
header("Location: ../php/inscription.php");
exit;

?>
