<?php

require_once "DBInit.php";

class ForumDB {
    public static function getPost($id){

        $db = DBInit::getInstance();
        $statment = $db->prepare("SELECT postId, posterId,title,idType, postContent,date, username, pictureName , `type name` FROM post join users on posterId = id join type on post.idType = type.id  WHERE postId = :ps");
        $statment->bindParam(":ps",$id);
        $statment->execute();
        $result = $statment->fetchAll();

        $statment = $db->prepare("SELECT comentId, posterId, postId, coment, username FROM coments join users on posterId = id WHERE postId = :ps");
        $statment->bindParam(":ps",$id);
        $statment->execute();
        $resultComent = $statment->fetchAll();

        #var_dump($result);
        return Array($result, $resultComent);



    }
    public static function getPosts(){
        $db = DBInit::getInstance();

        $statment = $db->prepare("SELECT postId, posterId,title,idType, postContent,date, username, pictureName , `type name` FROM post join users on posterId = id join type on post.idType = type.id ORDER BY date desc");
        $statment->execute();

        $result = $statment->fetchAll();
        #var_dump($result);
        return $result;

        
        
    }

    public static function savePosts(){
        $db = DBInit::getInstance();
        
        
        if (!($_FILES['picture']['size'] == 0) ) {
            $file = $_FILES["picture"]["name"];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            
            $statment = $db->prepare("INSERT INTO `post`(`posterId`, `title`, `idType`, `postContent`, `date`, `pictureName`) VALUES (:pid,:ttl, :typ, :cnt, :dat, :pnm)");
            $statment->bindValue(":pid", $_SESSION["id"]);
            $statment->bindValue(":ttl", $_POST["title"]);
            $statment->bindValue(":typ", $_POST["type"]);
            $statment->bindValue(":cnt", $_POST["description"]);
            $statment->bindValue(":dat", date("Y-m-d"));
            $statment->bindValue(":pnm", $_POST["title"]."-".$_SESSION["id"].".".$ext);
            $statment->execute();
        }
        else{
            $statment = $db->prepare("INSERT INTO `post`(`posterId`, `title`, `idType`, `postContent`, `date`) VALUES (:pid,:ttl, :typ, :cnt, :dat)");
            $statment->bindValue(":pid", $_SESSION["id"]);
            $statment->bindValue(":ttl", $_POST["title"]);
            $statment->bindValue(":typ", $_POST["type"]);
            $statment->bindValue(":cnt", $_POST["description"]);
            $statment->bindValue(":dat", date("Y-m-d"));
            $statment->execute();

        }

        #$result = $statment->fetch();
        #var_dump($statment);
        return  "done";

        
        
    }
    public static function search($query){
        $db = DBInit::getInstance();
        
        $statment = $db->prepare("SELECT postId, posterId,title,idType, postContent,date, username FROM post join users on posterId = id  WHERE title LIKE :que OR username LIKE :que");
        $statment->bindValue(":que", "%".$query."%");
        $statment->execute();

        $result = $statment->fetchAll();
        //var_dump($result);
        return  $result;

        
        
    }

    public static function addComent(){
        $db = DBInit::getInstance();
        
        $statment = $db->prepare("INSERT INTO `coments`(`posterId`, `postId`, `coment`) VALUES (:ps, :pst, :cmnt)");
        $statment->bindValue(":ps", $_SESSION["id"]);
        $statment->bindValue(":pst", $_POST["postId"]);
        $statment->bindValue(":cmnt", $_POST["coment"]);
        $statment->execute();

        #$result = $statment->fetchAll();
        //var_dump($result);
        return  "done";

        
        
    }
    public static function delete(){
        $db = DBInit::getInstance();
        if($_POST["tabl"] == "post"){
            $statment = $db->prepare("DELETE FROM post WHERE postId = :pst");
            $statment->bindValue(":pst", $_POST["postId"]);
            $statment->execute();
            
            $statment = $db->prepare("DELETE FROM coments WHERE postId = :pst");
            $statment->bindValue(":pst", $_POST["postId"]);
            $statment->execute();
        }
        else{
            $statment = $db->prepare("DELETE FROM coments WHERE comentId = :pst");
            $statment->bindValue(":pst", $_POST["comentId"]);
            $statment->execute();
        }
        
        #$statment->bindValue(":ta", $_POST["tabl"]);
        
        
        

        #$result = $statment->fetch();
        #var_dump($statment);
        return  "done";

        
        
    }
    







}

?>
