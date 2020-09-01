<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>forum</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<header class="col-12 col-s-12">
   <h1>Forum</h1>   
</header>


<div id="main">

   <div class = "row">
      <div class="col-2 col-s-3 rob">
      <?php include("view/menu.php"); ?>
      
      </div>

      <div class="col-8 col-s-9 main">
        <?php
            if(!isset($_SESSION["id"])){
                echo "<h1>You need to log in to create a post!</h1>";
            }

        ?>

        <h3>Create a post</h3>
        <form action=<?= BASE_URL ."forum/create"?> method="POST" enctype="multipart/form-data">
            <label for="title">Insert title</label>    
            <br>
            <input type="text" name="title" required>
            
            <br>
            <br>
            <input type="radio" name="type"  value="1" required>
            <label for="vehicle1"> Funny</label>
            
            <input type="radio" name="type"  value="2">
            <label for="vehicle2"> NSFW</label>
            
            <input type="radio" name="type" value="3">
            <label for="vehicle3"> Smart</label>

            <input type="radio" name="type" value="4">
            <label for="vehicle3"> Tech</label>

            <input type="radio" name="type" value="5">
            <label for="vehicle3"> Animal</label>

            <input type="radio" name="type" value="6">
            <label for="vehicle3"> Car</label>

            <input type="radio" name="type" value="7">
            <label for="vehicle3"> Anime</label>

            <input type="radio" name="type" value="8">
            <label for="vehicle3"> Games</label>

            <input type="radio" name="type" value="9">
            <label for="vehicle3"> Dark humor</label><br>
            <br>

            <label for="content">Insert content</label>
            <br>
            

            <textarea rows = "40" cols = "60" name = "description"></textarea>
            <br>
            <input name="picture" type="file" id="file-selector" accept=".png,.jpg,.jpeg,.webp,.svg,.tiff">
            
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>

        <img id="nalozena"> </img>
        
    <script>
        $('document').ready(function () {
        $("#file-selector").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#nalozena').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        });

    
    
    </script>        

        

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
</div>



