<?php
/*
1) to receive the data from signup.php
2) if the data is valid then we need to store the data to database
3) if data is store then forward the user to LOGIN page
4) if data store is not successful then forward to Signup page
*/

if($_SERVER['REQUEST_METHOD']=="POST"){
    //we will give service
    //$_POST['uemail']
    //$_POST['upass']
    //$_POST['uname']
    //$_POST['uname1']
    
    //empty value check, valid index check
    
     if(
        isset($_POST['uemail']) &&
        isset($_POST['upass'])  &&
        isset($_POST['uname'])  &&
        isset($_POST['uname1']) &&
        
        !empty($_POST['uemail']) &&
        !empty($_POST['upass'])  &&
        !empty($_POST['uname'])  &&
        !empty($_POST['uname1']) 
    )
      { 
         
         //storing value to variables
        $email=$_POST['uemail'];
        $pass=$_POST['upass'];
        $fullname=$_POST['uname'];
        $username=$_POST['uname1'];
    
        // encoding password
        $enc_pass=md5($pass);
         
        ///tries to communicate with the database and store the data
        
        try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
      
            //database code execute, default : warning generate
           $sqlquerystring="INSERT INTO user(user_email,user_password,user_full_name,user_name)VALUES('$email','$enc_pass','$fullname','$username')";
            
            
            ///executing the mysql code
            // we used exec() as the database is not returning anything
           $conn->exec($sqlquerystring);
            
//             storing user id from user
             $sqlquerystring="SELECT user_id FROM user WHERE user_email='$email'";
            
            
           //  ///executing the mysql code
           $returnobj=$conn->query($sqlquerystring);
      
            $data= $returnobj->fetch();
            $id=$data['user_id'];
//              inserting default permision for user
            $sqlquerystring="INSERT INTO permission(can_download_meme,can_share_meme,can_re_edit_template,account_type,user_id)VALUES('0','0',0,'Silver','$id') ";
               $conn->exec($sqlquerystring);
            
            
            
//            inserting default balance for user
           
            ?>
<!--             As the signup is sucessful it will take user to the login page-->
            echo "<script>location.assign('login.php')</script>";
        <?php
            
        }
        catch (PDOException $ex){
           ?>
<!--              As the database throws an exception it will take the user to the signup page-->
          <script>location.assign('signup.php')</script>
            <?php
        }
     }
     else{
        //otherwise
        ?>
        <script>location.assign('signup.php')</script>
        <?php
    }
    }

else{
    //we won't provide service
    
   echo "<script>location.assign('signup.php')</script>";
}
?>