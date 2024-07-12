<?php
require_once "models/UserModel.php";
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
        if(UserModel::inscription($this->prenom, $this->nom, $this->email, $this->password)){
            echo json_encode([
                "status"  => 201,
                "message" => "utilisateur crée!",
            ]);
        }else{
            echo json_encode([
                "status"  => 500,
                "message" => "erreur serveur!",
            ]);
        }
    }
}