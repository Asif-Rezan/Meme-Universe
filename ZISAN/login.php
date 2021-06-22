<?php
include 'navbar.php';

?>
<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  
<!--    setting page title -->
  <title>MemeUniverse-Sign Up</title>

  <link href="icon12.jpg" rel="stylesheet" type="text/css">
  <link href="icon12.jpg" rel="icon">



  <style>
    body {

background-image : url('aesthetic-wallpapers-1920x1080-for-mobile.jpg');
      background-color: white;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .form-div {

      text-align: center;
      color: wheat;
      background-color: #fff;
      width: 40%;
      margin: auto;
      border-radius: 10px;
      padding: 20px;

    }

    label {
      color: white;
      margin: 10px;
    }

    .title {
      margin-top:50px;
      color: white;
      text-align: center;
      text-shadow: 0 0 5px greenyellow;
      font-family:cursive;

    }
    .sign-in-txt
    {
      text-align: center;
      font-family: 'Courier New', Courier, monospace;
      margin-top: 50px;

    }

    input {
      margin-top: 15px;
      width: 30%;
      height: 30px;
      background: white;
    }

    a {
      text-decoration: none;
      color: white;
    }

    .submit-button {
      background-color: green;
      color: white;
    }

    .submit-button:hover {
      background-color: red;
    }
  </style>



</head>

<body>





  <h1 class="title text-dark">Place to explore new memes and soothe your souls </h1>

  <h2 class="sign-in-txt">Sign In</h2>
  <div class="form-div shadow-lg p-5">
    
      <!-- As the login is submit type so have to pass the value by post method(as the information is secured type)and when we click the login it will take the user to the loginprocess.php page-->
    <form action="loginprocess.php" method="POST">
      <!-- <label for="uemail">Email:</label> -->
      <input class="form-control" type="email" id="uemail" name="uemail" placeholder="Enter your email" >

      <br>

      <!-- <label for="upass">Password:</label> -->
      <input class="form-control" type="password" id="upass" name="upass" placeholder="Enter your Password">

      <br>
      <input class="my-auto submit-button  rounded-pill" type="submit" value="Log In">

    </form>

    <a class="text-dark" href="signup.php"> Don't have an account? Sign UP </a>


  </div>

</body>

</html>