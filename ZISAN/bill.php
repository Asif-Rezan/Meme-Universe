<?php
include 'navbar.php';



if(
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){
         //logged in user
            $email=$_SESSION['useremail'];
            $userfullname=$_SESSION['fullname'];
          
    ?>
<!DOCTYPE html>

<html>
  <head>
      <meta charset="utf-8">
      
      <title>MemeUniverse-Update_profile </title>
      
      <link href="icon12.jpg" rel="stylesheet" type="text/css">
         <link href="icon12.jpg" rel="icon">
<style>
body{
    
/*  background-image : url('uhhh.jpg');*/
  background-color : white;
  background-attachment : fixed;
  background-repeat : no-repeat;
  background-size : cover;
}
label{
  color: white;
  margin: 10px;
}

.title
{
    
  margin-top:20px;
  color: black;
  text-align: center;
  text-shadow: 5px 5px 5px green;
  font-family:cursive;
    
   
   
}
input{
  margin-top: 15px;
  width: 30%;
  height: 30px;
    background: white;
}

a{
  text-decoration: none;
  color: white;
}
.submit-button
{
  background-color: green;
  color: white;
}
.submit-button:hover
{
  background-color: red;
}
.form-div
{
  text-align: center;
  color: wheat;
  background-color: #fff;
  width: 40%;
  margin: auto;
  border-radius: 10px;
  padding: 20px;
  margin-top: 80px;
  

}


    
</style>
  </head>
    
  <body> 
      
       
      
      <!--button handling, when we press logout it will call logout func which will be handled in the logout func and it will take to the logout.php file -->
      <!-- As the update is submit type so have to pass the value by post method(as the information is secured type)and when we click the update it will take the user to the signupprocess.php page-->
      <div class="form-div">
      <form action="billprocess.php" method="POST">
      <!-- <input type="button"  value="Profile" onclick="profilefn();"> -->
      <h1 class="title">Withdraw</h1>
       <br>

      <input class="form-control" type="number" id="amount" name="amount" placeholder="Enter Withdraw amount" required >
      <br>
      <input class="form-control" type="password" id="upass" name="upass" placeholder="Enter your password" required>
      <br>

       
      <input class="submit-button" type="submit" value="Withdraw" > 
      </form>
      </div>
      <script>
       function profilefn(){
           location.assign("profile.php");
       }
      
      
      </script>
      
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