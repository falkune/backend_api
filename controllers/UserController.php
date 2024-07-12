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

    // methode pour connexter un user
    public static function login($email, $password){
        $user = UserModel::connexion($email);
        if(empty($user)){ // l'email n'existe pas
            echo json_encode([
                "status"  => 404,
                "message" => "cet utilisateur n'existe pas"
            ]);
        }else{ // l'eamil existe
            if(password_verify($password, $user['password'])){ // verifier le mot de passe
                uset($user['password']);
            }else{
                echo json_encode([
                    "status"  => 404,
                    "message" => "cet utilisateur n'existe pas"
                ]);
            }
        }
    }
}