<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>forum</title>
<header class="col-12 col-s-12">
   <h1>Forum</h1>   
</header>

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
        <form action="<?= BASE_URL . "forum/register" ?>" method="post">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="email"><b>Email </b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <br>

            <label for="username"><b>Username </b></label>
            <input type="text" placeholder="Enter username" name="username" required>
            <br>
            <label for="psw"><b>Password </b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            
            <br>

            <label for="psw-repeat"><b>Repeat Password </b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <button type="submit" class="registerbtn">Register</button>
            <div class="container signin">
                <p>Already have an account? <a href="<?= BASE_URL . "forum/login" ?>">Sign in</a>.</p>
            </div>

        </form>
    </div>

    <div class="col-2 col-s-12 rob user">
      
      <?php
        
         if(isset($_SESSION["id"])){
               echo "Hello ".$_SESSION["username"];     
        
         }
         else{
            echo "Hello stranger";   

         }

         ?>
      </div>
    
    
    

    
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>



