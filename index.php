<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once "controllers/UserController.php";
require_once "controllers/TaskController.php";

$url = isset($_GET['url']) ? $_GET['url'] : "home";

switch($url){
    case "register":
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = json_decode(file_get_contents("php://input"), true);
            $nom      = $data['nom'];
            $prenom   = $data['prenom'];
            $email    = $data['email'];
            $password = $data['password'];
            $user = new UserController($nom, $prenom, $email, $password);
            $user->register();
        }
        break;
    case "login":
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = json_decode(file_get_contents("php://input"), true);
            $email    = $data['email'];
            $password = $data['password'];
            UserController::login($email, $password);
        }
        break;
    case "add_task":
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = json_decode(file_get_contents("php://input"), true);
            $taskName    = $data['nom'];
            $description = $data['description'];
            $endDate     = $data['date'];
            $userId      = $data['id'];
            TaskController::addTask($taskName, $description, $endDate, $userId);
        }
        break;
    default:
        echo json_encode(["message" => "ca marche pas"]);
}