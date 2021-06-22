<?php
include 'navbar.php';



if(
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){
         //logged in user
            $email=$_SESSION['useremail'];
            $userfullname=$_SESSION['fullname'];
            $phonenumber=$_SESSION['phone_num'];
          
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
    
/*  background-image : url('updateprofile.jpg');*/
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

.profile-pic-form
{
  margin-left: 20px;
  margin-right: 20px;
  height: 38px;
}


    
</style>
  </head>
    
  <body> 
      
       
      
      <!--button handling, when we press logout it will call logout func which will be handled in the logout func and it will take to the logout.php file -->
      <!-- As the update is submit type so have to pass the value by post method(as the information is secured type)and when we click the update it will take the user to the signupprocess.php page-->
      <div class="form-div">
      <form action="updateprofileprocess.php" method="POST">
      <!-- <input type="button"  value="Profile" onclick="profilefn();"> -->
      <h1 class="title">Update your profile </h1>
       <br>

      <input class="form-control" type="text" id="fullname" name="fullname" value="<?php echo $userfullname ?>">
      
      <br>
      <input class="form-control" type="email" id="uemail" name="uemail" value = "<?php echo $email ?> ">
      <br>
      <input class="form-control" type="password" id="upass1" name="upass1" placeholder="Enter your old password" required>
      <br>
      <input class="form-control" type="password" id="upass2" name="upass2" placeholder="Enter your new password" >
      <br>
      <input class="form-control" type="text" id="unumber" name="unumber" value=" <?php echo $phonenumber?>">
      <br> 
       
      <input class="submit-button" type="submit" value="Update" > 
      </form>
        <form action="uploadprofilepictureprocess.php" method="POST"enctype="multipart/form-data">
           <label for="cash">Upload profile picture:</label>
          <input class="form-control  profile-pic-form" type="file" id="image" name="image">
              <br>
           <input class="submit-button" id="cash" name="cash"type="submit"  value="upload picture">
          
          
          
          
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