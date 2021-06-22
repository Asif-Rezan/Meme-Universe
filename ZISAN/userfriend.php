<?php
session_start();

if(
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){
         //logged in user
         // session start so let the user to see the homepage
    ?>
        <!DOCTYPE html>

<html>
  <head>
      <meta charset="utf-8">
      
      <title>MemeUniverse-Profile </title>
      
      <link href="icon12.jpg" rel="stylesheet" type="text/css">
         <link href="icon12.jpg" rel="icon">
<style>
body{
    
  background-image : url("2AY4J51.jpg");
  background-color : white;
  background-attachment : fixed;
  background-repeat : no-repeat;
  background-size : cover;
}
</style>
  </head>
    
  <body> 
     <div class="form-div">
           <h1 class="title">Friend Profile  </h1> 
           
             Welcome <?php echo $name=$data[0];
                echo $name['user_name']; ?>
         
      
     
     
    
      
    
        
      
      
    
            </div>
     </body>
    
      </html>

   <?php 
}
else{
    
    // session not start so  user will take back to the log in page
    ?>
  <script>location.assign('login.php')</script>

<?php
    
}

?>