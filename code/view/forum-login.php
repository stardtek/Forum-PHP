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
            <form action="<?= BASE_URL . "forum/login" ?>" method="POST">
                <h1>Login</h1>
            
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>


                <button type="submit" class="loginbtn">Login</button>
                <br>

                <?php
                if ($_SERVER["REQUEST_METHOD"] != "GET") {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        echo "<h3>Wrong password or username</h3>";
                    } else {
                        echo "okek";
                    }
                }

                ?>
                

                <div class="container signin">
                    <p>Don't have an account? <a href="<?= BASE_URL . "forum/register" ?>">Register</a>.</p>
                </div>
        </form>
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

