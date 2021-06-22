<?php
session_start();

if(
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){
         //logged in user
         // session start so let the user to see the homepage
         
    //deleting the value
        unset($_SESSION['useremail']);
        session_destroy();
     ?>
  <script>location.assign('login.php')</script>

<?php
      
}
else{
    
    // session not start so  user will take back to the log in page
    ?>
  <script>location.assign('login.php')</script>

<?php
    
}

?>