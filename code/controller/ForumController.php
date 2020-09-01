<?php


require_once("ViewHelper.php");
require_once("model/UserDB.php");
require_once("model/ForumDB.php");
class ForumController{

    public static function index() {
        $posti = ForumDB::getPosts();

        if (isset($_GET["id"])) {
            $post = ForumDB::getPost($_GET["id"]);    
            ViewHelper::render("view/forum-detail.php",["data" => $post[0], "coments" => $post[1]]);
        } else {
            ViewHelper::render("view/forum-index.php",["posts" => $posti]);
        }

        
    }

    public static function login() {
       
            ViewHelper::render("view/forum-login.php");
        
        
        
    }
    
    

    public static function register() {
        
        ViewHelper::render("view/forum-register.php");
    }

    public static function newPost() {
        
        ViewHelper::render("view/forum-create.php");
    }
    

    public static function savePost() {
        
        //echo $_POST["email"]
        if (isset($_SESSION["id"]) and isset($_POST["type"]) and isset($_POST["title"])) {
            ForumDB::savePosts();
            #var_dump($_FILES["picture"]);
            if ( !($_FILES['picture']['size'] == 0 && $_FILES['picture']['error'] == 0) ) {
                $target_dir = "assets/postPictures/";
                $file = $_FILES["picture"]["name"];
                $path = pathinfo($file);
                $filename = $path['filename'];
                $ext = $path['extension'];
                $temp_name = $_FILES['picture']['tmp_name'];
                $path_filename_ext = $target_dir.$_POST["title"]."-".$_SESSION["id"].".".$ext;
                move_uploaded_file($temp_name,$path_filename_ext);

            }
           

        }
        #$result = ForumDB::savePosts();
        
        #var_dump($_FILES);
        ViewHelper::redirect(BASE_URL . "forum");
    }

    public static function searchVue() {
       
        ViewHelper::render("view/forum-vue-search.php");
    
    
    
    }
    public static function searchApi() {
        if (isset($_GET["query"]) && !empty($_GET["query"])) {
            $hits = ForumDB::search($_GET["query"]);
        } else {
            $hits = [];
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($hits);
        
    
    
    
    }

    public static function addComent() {
        
        if(!empty($_POST["coment"])){
        #    var_dump($_POST);
            ForumDB::addComent();

        }
        
        ViewHelper::redirect(BASE_URL . "forum?id=".$_POST["postId"]);
        
    
    
    
    }
    
    public static function removed() {
        
        ForumDB::delete();
        
        ViewHelper::redirect(BASE_URL . "forum/user");
        
    
    
    
    }


















}