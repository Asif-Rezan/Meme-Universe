<?php
include 'navbar.php';

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
      
      <title>MemeUniverse-Home </title>
      
      <link href="icon12.jpg" rel="stylesheet" type="text/css">
         <link href="icon12.jpg" rel="icon">
<style>
body{
    
  background-image : url('memeuniverse.jpg');
  background-color : white;
  background-attachment : fixed;
  background-repeat : no-repeat;
  background-size : cover;
}

.title {
      margin-top:50px;
      color: black;
      text-align: center;
      text-shadow: 0 0 5px greenyellow;
      font-family:cursive;

    }

   .button-div
    {
      margin: auto;
      align-items: center;
      width: 300px;
      padding-top: 100px;
     

    }

</style>
  </head>
    
  <body> 
     
      <h1 class="title"> Meme Universe- A platform to share your creativity and humor to the world</h1> 
      
      <!--button handling, when we press logout it will call logout func which will be handled in the logout func and it will take to the logout.php file -->
      <div class="button-div">
         
<!--      <input class="rounded-pill mx-2 btn btn-primary" type="button"  value="Logout" onclick="logoutfn();">    -->
<!--      <input class="rounded-pill mx-2 btn btn-primary" type="button"  value="Profile" onclick="profilefn();">-->
      
      </div>-->
<!--
      <script>
       function logoutfn(){
            location.assign('logout.php');
       }
          function profilefn(){
              location.assign('profile.php');
          }
      
      </script>
-->
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