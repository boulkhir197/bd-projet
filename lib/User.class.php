<?php


class User
{
    public $login;
    public $nom;
    public $prenom;
    public $email;

    function __construct($login, $nom, $prenom, $email){
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

}

?>
