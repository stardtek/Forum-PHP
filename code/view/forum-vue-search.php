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
            
            <div id="app" class="col-12 col-s-12 post">
                <label>Search:
                    <!-- Binds keyup event to search function (see below) -->
                    <input id="search-field" type="text" name="query" autocomplete="off" v-on:keyup="search" autofocus />
                </label>
                <ol>
                    <!-- Vue template for displaying a list of books -->
                    <li v-for="po in posts">
                        <a :href="'<?= BASE_URL . "forum?id=" ?>' + po.postId">{{ po.title }}: {{ po.username }}</a>
                    </li>
                </ol>
            </div>
                        
            

            
                
           
            
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

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
const app = new Vue({
    el: '#app',     // Vue app will live in the context of the #app element
    data: {         // contains vue App data
        posts: []   // intitially the list of books is empty
    },
    methods: {
        search(event) { // method to be invoked on ever keyup event
            const query = event.target.value
            if (query == "") { // abort if parameter is empty
                app.posts = []
                return
            }
            // Axios is library for making HTTP requests from browsers (and node.js).
            // It is an alternative to jQuery's $.ajax
            axios.get(
                "<?= BASE_URL . "api/forum/search/" ?>",
                { params: { query } }
            // handle successful response
            // all we have to do is to set received data into our books variable, vue will
            // render elements as specified in the template above
            ).then(response => app.posts = response.data 
            // handle error
            ).catch(error => console.log(error))
        }
    }
});
</script>





<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

