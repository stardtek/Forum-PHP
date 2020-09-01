<?php

require_once "DBInit.php";

class UserDB {
    public static function AddUser($email, $username, $pass){
        $db = DBInit::getInstance();
        $statment = $db->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$pass')");
        $statment->execute();
        //return "uredu";

    }
    public static function CheckUser( $username, $pass){
        $db = DBInit::getInstance();
        $statment = $db->prepare("SELECT id, username FROM users WHERE username like :na and password like :ps");
        $statment->bindValue(":na",$username);
        $statment->bindValue(":ps",$pass);
        //$statment->bind_param(":psw",$pass,PDO::PARAM_STR,strlen($pass));
        $statment->execute();
        $result = $statment->fetchAll();
        //var_dump($result);
        return $result;

    }
    public static function getUserData( $id){
        $db = DBInit::getInstance();
        $statment = $db->prepare("SELECT * FROM post WHERE posterId = :id");
        $statment->bindValue(":id",$id);
        $statment->execute();
        $result = $statment->fetchAll();
        //var_dump($result);
        
        $statment = $db->prepare("SELECT * FROM coments WHERE posterId = :id");
        $statment->bindValue(":id",$id);
        $statment->execute();
        $result1 = $statment->fetchAll();

        return Array($result, $result1);

    }
    







}

?>
