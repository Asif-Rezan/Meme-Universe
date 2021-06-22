<?php
session_start();

if(
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){
        
         try{
           $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
             
             $email=$_SESSION['useremail'];
             $sqlquerystring="SELECT * FROM USER WHERE user_email='$email' ";
             
           $returnobj=$conn->query($sqlquerystring);
            
           
            $data= $returnobj->fetch();
             $path=$data['profile_pic_path'];
            
            $email=$_SESSION['useremail']; //storing the user email
           $sqlquerystring="DELETE From user WHERE user_email='$email'"; //deletes from database
           
             
              unlink($path);
              $conn->exec($sqlquerystring);
              session_destroy();
            
            
//             ?>
<!--                  user deleted sucessfully and it will take the user to the signup page-->
              <script>location.assign('signup.php')</script>;
         <?php
                
            }
           
        catch (PDOException $ex){
           
           ?>
<!--              As the database throws an exception it will take the user to the profile.php page-->

          <script>location.assign('profile.php')</script>
            <?php
        }
    ?>


   <?php 
}
else{
    
    // session not start so  user will take back to the log in page
    ?>
  <script>location.assign('login.php')</script>

<?php
    
}

?>