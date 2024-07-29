<?php
require_once "includes/dbConnexion.php";
class TaskModel{
    // ajouter une tache
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

    // pour supprimer une tache
    public static function remove($id){
        // etablir la connxion avec la base de donnee
        $dbConnection = DbConnexion::dbLog();
        $request = $dbConnection->prepare("DELETE FROM tasks WHERE id = :id");
        $request->bindParam(':id', $id);
        try{
            $request->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // obtenir la liste des tache d'un utilisateur
    public static function getUserTask($userId){
        // etablir la connxion avec la base de donnee
        $dbConnection = DbConnexion::dbLog();
        $request = $dbConnection->prepare("SELECT * FROM tasks WHERE user_id = :id");
        $request->bindParam(':id', $userId);
        $request->execute();
        $taskList = $request->fetchAll(PDO::FETCH_ASSOC);
        return $taskList;
    }

    // modifier une tache
    public static function endTask($id){
        $dbConnect = DbConnexion::dbLog();
        $request = $dbConnect->prepare("UPDATE tasks SET statut = ? WHERE id = ?");
        try{
            $request->execute(array('expired', $id));
            return true;
        }catch(PDOException $e){
            return $e;
        }
    }

     // modifier une tache
     public static function update($taskName, $description, $endDate, $id){
        $dbConnect = DbConnexion::dbLog();
        $request = $dbConnect->prepare("UPDATE tasks SET task_name = ?, description = ?, end_date = ? WHERE id = ?");
        try{
            $request->execute(array($taskName, $description, $endDate, $id));
            return true;
        }catch(PDOException $e){
            return $e;
        }
    }
}