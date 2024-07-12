<?php
require_once "includes/dbConnexion.php";
class UserModel{
    public static function inscription($firstName, $lastName, $email, $password){
        // etablir la connxion avec la base de donnee
        $dbConnection = DbConnexion::dbLog();
        // preparer la requete
        $request = $dbConnection->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:prenom, :nom, :mail, :mdp)");
        $request->bindParam('prenom', $firstName);
        $request->bindParam('nom', $lastName);
        $request->bindParam('mail', $email);
        $request->bindParam('mdp', $password);

        try{
            $request->execute();
            return true;
        }catch(PDOException $e){
            return $e;
        }
    }
}