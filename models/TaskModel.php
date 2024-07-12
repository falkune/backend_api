<?php
require_once "includes/dbConnexion.php";
class TaskModel{
    public static function saveTask($taskName, $description, $endDate, $userId){
        $dbConnect = DbConnexion::dbLog();
        $request = $dbConnect->prepare("INSERT INTO tasks (task_name, description, end_date, user_id) VALUES (:nom, :description, :end_date, :user)");
        $request->bindParam(':nom', $taskName);
        $request->bindParam(':description', $description);
        $request->bindParam(':end_date', $endDate);
        $request->bindParam(':user', $userId);
        try{
            $request->execute();
            return true;
        }catch(PDOException $e){
            return $e;
        }
    }
}