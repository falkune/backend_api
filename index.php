<?php
header("Content-Type: application/json");

require_once "controllers/UserController.php";

$url = isset($_GET['url']) ? $_GET['url'] : "home";

switch($url){
    case "register":
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $nom      = $_POST['nom'];
            $prenom   = $_POST['prenom'];
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $user = new UserController($nom, $prenom, $email, $password);
            $user->register();
        }
        break;
    case "login":
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $email    = $_POST['email'];
            $password = $_POST['password'];
            UserController::login($email, $password);
        }
        break;
    case "add_task":
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $taskName    = $_POST['nom'];
            $descriprion = $_POST['description'];
            $endDate     = $_POST['date'];
            $userId      = $_POST['id'];
            
        }
    default:
        echo json_encode(["message" => "ca marche pas"]);
}