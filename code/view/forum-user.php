<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Forum</title>
<header class="col-12 col-s-12">
   <h1>Forum</h1>   
</header>


<div id="main">
    <div class = "row">
        <div class="col-2 col-s-3 rob">
            <?php 
                if(isset($_SESSION["id"])){
                    include("view/menu.php"); 
                }
                else{
                    include("view/menu_not_loged.php"); 
                }





            ?>
        </div>

    
        
        <div class="col-8 col-s-9 main">
            

        <?php foreach ($data as $post): ?>
                <div class="col-12 col-s-12">
                    <div class="col-1 col-s-0"> </div>

                    <div class = "col-10 col-s-12 post">
                    
                        <h3>Post</h3>
                        <?php
                                if (!empty($post["pictureName"])) {
                                    
                                    echo ('<img src="../../assets/postPictures/'.$post["pictureName"].'" alt="Slika">');
                                    
                                }
                  
                            ?>
                            
                        <form action="<?= BASE_URL . "forum/user"?>" method="POST" >
                            <input type="hidden" name = "postId" value="<?= $post["postId"]?>">
                            <input type="hidden" name = "tabl" value="post">
                            
                            <h4><?= $post["title"]?></h4>
                            
                            
                            
                            <button>Remove</button>


                        </form>




                    </div>
                    <div class="col-1 col-s-0"> </div>
                    <br>
                </div>

            <?php endforeach ?>

            <?php foreach ($coments as $post): ?>
                <div class="col-12 col-s-12">
                    <div class="col-1 col-s-0"> </div>

                    <div class = "col-10 col-s-12 post">
                    
                        <h3>Comment</h3>
                        <form action="<?= BASE_URL . "forum/user"?>" method="POST" >
                            <input type="hidden" name = "comentId" value="<?= $post["comentId"]?>">
                            <input type="hidden" name = "tabl" value="coments">
                            
                            <h4><?= $post["coment"]?></h4>
                            
                            
                            <button>Remove</button>


                        </form>




                    </div>
                    <div class="col-1 col-s-0"> </div>
                    <br>
                </div>

            <?php endforeach ?>
            
            
            
            
                
           
            
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

