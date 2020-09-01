<?php


require_once("ViewHelper.php");
require_once("model/UserDB.php");
require_once("model/ForumDB.php");
class UserController{
    
    public static function loginUser() {
        $posti = ForumDB::getPosts();

        
        $validData = isset($_POST["username"]) && !empty($_POST["username"]) && 
                isset($_POST["psw"]) && !empty($_POST["psw"]);

        $id = UserDB::CheckUser($_POST["username"],md5($_POST["psw"]));
        if(isset($id[0]["id"])){
            $_SESSION["id"] = $id[0]["id"];
            $_SESSION["username"] = $id[0]["username"];
            #var_dump($_FILES);
            ViewHelper::redirect(BASE_URL . "forum");
        }
        else
        {
            $_SESSION["id"] = -1;
            ViewHelper::render("view/forum-login.php");
        }
        #var_dump($posti);
        
                
        
    }

    public static function newUser() {
        
        //echo $_POST["email"]
        if (!empty($_POST["email"]) and !empty($_POST["username"]) and !empty($_POST["psw"])) {
            UserDB::AddUser($_POST["email"],$_POST["username"],md5($_POST["psw"]));
            ViewHelper::redirect(BASE_URL . "forum/login");
        }
        else{
            
            ViewHelper::redirect(BASE_URL . "forum/register");
        }
        
    }

    public static function userPosts() {
        
        //echo $_POST["email"]
        $data = UserDB::getUserData($_SESSION["id"]);
        #var_dump($data)
        ViewHelper::render("view/forum-user.php", ["data" => $data[0], "coments" => $data[1]]);
    }



}