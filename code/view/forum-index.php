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
         
         <?php foreach ($posts as $post): ?>
            <div class="col-12 col-s-12">
               <div class="col-1 col-s-0"> </div>

               <div class = "col-10 col-s-12 post">
               
                  <h2><?= $post["type name"].": ".$post["title"]?></h2>
                  <br>
                  <h3>User: <?= $post["username"]?></h3>
                  <h3>Date: <?= $post["date"]?></h3>

                  <br>
                  <br>
                  <?php
                     if (!empty($post["pictureName"])) {
                        echo ('<img src="../assets/postPictures/'.$post["pictureName"].'" alt="Slika">');
                     }
                  
                  ?>
                  
                  <form action="<?= BASE_URL . "forum" ?>" method="get">
                     <input type="hidden" name="id" value="<?= $post["postId"] ?>" />    
                     
                     <button>View</button>
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
               echo '<form action="forum" method="post"> 
                  <input type="hidden" name="destroy">
                  <input type="submit" name="button1"
                  class="button" value="Log out" /> 
          
       
                  </form> ';
               
            
               
         }
         else{
            echo "Hello stranger";
            
               
         }
         
        
        

         ?>
      </div>
   </div>
</div>


