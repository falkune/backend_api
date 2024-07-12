<?php
require_once "models/TaskModel.php";
class TaskController{
    public static function addTask($taskName, $description, $endDate, $userId){
        if(TaskModel::saveTask($taskName, $description, $endDate, $userId)){
            echo json_encode([
                "status"  => 201,
                "message" => "tache crée...",
            ]);
        }else{
            echo json_encode([
                "status"  => 500,
                "message" => "erreur serveur...",
            ]);
        }
    }
}