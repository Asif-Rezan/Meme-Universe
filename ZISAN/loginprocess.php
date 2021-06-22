<?php
/*
1) to receive the data from login.php
2) if the data is valid then we need to store the data to database
3) if data is store then forward the user to home page
4) if data store is not successful then forward to Log In page
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
        isset($_POST['upass']) &&
        
         !empty($_POST['uemail']) &&
         !empty($_POST['upass'])
    )
    {
         //storing values to variables
        $email=$_POST['uemail'];
        $pass=$_POST['upass'];
       
       
    
        // encoding password
        $enc_pass=md5($pass);
        
        ///tries to communicate with the database and store the data
        
        try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
      
            //database code execute, default : warning generate
           $sqlquerystring="SELECT * From user WHERE user_email='$email'and user_password='$enc_pass'";
            
            
            //executing the mysql code
            // used query function as it is returning value
            //$returnobj storing the object data that is returing
          $returnobj=$conn->query($sqlquerystring);
            if($returnobj->rowCount()==1){
                //login successful
                session_start();
  // returning an associative array
                $user_details=$returnobj->fetchAll();
        
//  we used for each loop as the associative array returning multiple columns so to print we need for each loop            
                foreach ($user_details as $user)
                {
                    $_SESSION['useremail']=$user['user_email'];
                    $_SESSION['fullname']=$user['user_full_name'];
                    $_SESSION['username']=$user['user_name'];
                    $_SESSION['balance']=$user['user_balance'];
                    $_SESSION['phone_num']=$user['user_phone_number'];
                    $_SESSION['userid']=$user['user_id'];
                   

                }
            
                
            ?>
               
<!--              As the log in is sucessful it will take the user to the home.php page-->
                <script>location.assign('../index.php')</script>;
           <?php
                
            }
            else{
                //login unsucessful so it will take the user to the login.php page
                 ?>
          <script>location.assign('login.php')</script>
            <?php
            }
           
            
            
        }
        catch (PDOException $ex){
           ?>
<!--              As the database throws an exception it will take the user to the login page-->
          <script>location.assign('login.php')</script>
            <?php
        }
}
    else{
        //otherwise
        ?>
        <script>location.assign('login.php')</script>
        <?php
    }
    }

else{
    //we won't provide service
    
   echo "<script>location.assign('login.php')</script>";
}
?>