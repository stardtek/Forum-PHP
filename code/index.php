<?php
session_destroy();
session_start();

require_once("controller/ForumController.php");
require_once("controller/UserController.php");
//require_once("controller/StoreController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    # POST CRUD
    # Classic forum
    "forum" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST" and !isset($_POST["postId"]) ) {
            unset($_SESSION['id']);
            unset($_SESSION['username']);
            
            #var_dump ($_SESSION);
            ForumController::index();
        }
        else if(isset($_POST["postId"]) and isset($_SESSION["id"])){
            ForumController::addComent();



        }
        else if(isset($_POST["postId"]) and !isset($_SESSION["id"])){
            ForumController::login();



        }
        else{
            ForumController::index();
        }
        
    },
    "forum/login" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::loginUser();
        } else {
            ForumController::login();
        }
    },
    "forum/register" => function () {
        //echo ($_SERVER["REQUEST_METHOD"]); 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::newUser();
        } else {
            ForumController::register();
        }
    },
    "forum/create" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ForumController::savePost();
        }
        else{
            ForumController::newPost();
        }
        
    },
    "forum/search" => function () {
        ForumController::searchVue();
        
    },
    "api/forum/search" => function () {
        ForumController::searchApi();
        
    },
    "forum/user" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ForumController::removed();
        }
        else{
            UserController::userPosts();
        }
        
        
    },
    "" => function () {
        
        ViewHelper::redirect(BASE_URL . "forum");
    },
];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 
