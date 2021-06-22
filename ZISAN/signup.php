<?php
include 'navbar.php';

?>
<!DOCTYPE html>

<html>
  <head>
      <meta charset="utf-8">
      
<!--      setting page title-->
     <title>MemeUniverse-Sign Up</title>
      

      <link href="icon12.jpg" rel="stylesheet" type="text/css">
      <link href="icon12.jpg" rel="icon">


     
      
<style>
body{
    
  background-image : url('aesthetic-wallpapers-1920x1080-for-mobile.jpg'); 
  background-color : white;
  background-color: #fcfcfc;
  background-attachment : fixed;
  background-repeat : no-repeat;
  background-size : cover;
}
  
.form-div{

  text-align: center;
  color: wheat;
  background-color: #fff;
  width: 40%;
  margin: auto;
  border-radius: 10px;
  padding: 20px;
  
}
label{
  color: white;
  margin: 10px;
}

.title
{
    
  margin-top:50px;
  color: white;
  text-align: center;
  text-shadow: 0 0 5px greenyellow;
  font-family:cursive;
  
    
   
   
}
.sign-up-txt
{
  text-align: center;
  font-family: 'Courier New', Courier, monospace;
  margin-top: 50px;
  text-shadow: 0 0 5px greenyellow;  
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

.submit-button {
      background-color: green;
      color: white;
    }

.submit-button:hover
{
  background-color: red;
  color: white;
}




</style>

      

  </head>

  <body> 
        
  <h1 class="title text-dark">You can earn with each smile you bring on people’s faces </h1> 
  <h2 class="sign-up-txt">Sign Up</h2>


      <div class="form-div text-center mb-5 shadow-lg">
          
<!-- As the signup is submit type so have to pass the value by post method(as the information is secured type)and when we click the signup it will take the user to the signupprocess.php page-->
      <form  action="signupprocess.php" method="POST"> 
        
          <!-- <label for="uemail">Email:</label> -->
          <input class="form-control" type="email" id="uemail" name="uemail"placeholder="Enter your email"/>
         
          <br>
          <!-- <label for="uname">Full Name:</label> -->
          <input class="form-control" type="text" id="uname" name="uname" placeholder="Enter your full name" />
          <br>
          
           <!-- <label for="uname1">User Name:</label> -->
          <input class="form-control" type="text" id="uname1" name="uname1" placeholder="Enter your user name"/>
          <br>
          
        <!-- <label for="upass">Password:</label> -->
        
        <input class="form-control" type="password" id="upass" name="upass" placeholder="Enter your Password" />
     
     
          <br>
          <input class="my-auto submit-button  rounded-pill" type="submit" value="Sign Up" />   
         

      </form>

       <a href="login.php" class="text-dark mt-5 text-muted"> Have an account? Log In </a>
     
       
      </div>
     
  </body>

</html>