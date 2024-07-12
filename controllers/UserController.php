<?php
class UserController{
    // attributs 
    private $nom;
    private $prenom;
    private $email;
    private $password;

    // constructeur
    public function __construct($lastName, $firstName, $mail, $mdp){
        $this->nom      = $lastName;
        $this->prenom   = $firstName;
        $this->email    = $mail;
        $this->password = password_hash($mdp, PASSWORD_DEFAULT);
    }

    // fonction pour s'inscrire
    public function register(){
        
    }
}