<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>forum</title>
<header class="col-12 col-s-12">
   <h1>Forum</h1>   
</header>


<div id="main">
    <div class = "row">
        <div class="col-2 col-s-3 rob">

        <?php if(isset($_SESSION["id"])){
                    include("view/menu.php"); 
                }
                else{
                    include("view/menu_not_loged.php"); 
                } ?>
        </div>

    
        
        <div class="col-8 col-s-9 main">
            <?php

                #var_dump( $data);
                #echo "<br>";
                #var_dump( $coments);

            ?>
            
            <h4>User: <?=$data[0]["username"]?></h4>
            <h4>Date: <?=$data[0]["date"]?></h4>
            <div class="col-12 col-s-12 post">
                <h2><?=$data[0]["type name"].": ". $data[0]["title"]?></h2>
                <p><?=$data[0]["postContent"]?></p>
                <?php
                     if (!empty($data[0]["pictureName"])) {
                        echo ('<img src="../assets/postPictures/'.$data[0]["pictureName"].'" alt="Slika">');
                     }
                  
                  ?>
            </div>
            <br>
            <div class="col-12 col-s-12 coment">
                <?php foreach ($coments as $coment): ?>
                            
                            <div class="col-10 col-s-12 coment">
                                <h5><?= $coment["username"] ?></h5>
                                <h4><?= $coment["coment"] ?></h4>

                            
                            
                            
                            </div><br>
                            



                        
                <?php endforeach ?>
                <div class="col-10 col-s-12 coment">
                    <form action=<?= BASE_URL ."forum"  ?> method="POST">
                        <input type="hidden" value="<?= $data[0]["postId"] ?>" name="postId" >
                        <label for="content">Coment</label>
                        <br>
                        

                        <textarea rows = "5" cols = "60" name = "coment" required></textarea><br>

                        <input type="submit" value="Submit">
                    </form>
                </div>

            </div>


            
                
           
            
        </div>

            
        
        
        
        <div class="col-2 col-s-12 rob user">
      
      <?php
         //var_dump($data);
         //echo "<br>dataaaaa<br>";
         //echo(isset($_SESSION["usr"])."<br>");
         //echo "<br>sessionset<br>";
         //var_dump($_SESSION);
         //echo "<br>sesionnnn<br>";
         
         if(isset($_SESSION["id"])){
               
               echo "Hello ".$_SESSION["username"];
               
            
               
         }
         else{
            echo "Hello stranger";
            
               
         }

         ?>




      </div>

    
</div>







</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

