<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
if(
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){ 
        //storing values to the variables
        $newemail=$_POST['uemail'];
        $email=$_SESSION['useremail'];
        $fullname=$_POST['fullname'];
        $pass1=$_POST['upass1'];
        $enc_newpass=md5($pass1);
        $newpass=$_POST['upass2'];
        $phonenumber=$_POST['unumber'];
        $enc_newpass2=md5($newpass);
    
     try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
      
            //database code execute, default : warning generate
           $sqlquerystring="SELECT * From user WHERE user_email='$email' and user_password='$enc_newpass'";
            
         $returnobj=$conn->query($sqlquerystring);
         
         
         
         if(($returnobj->rowCount()==1)){
               // if the new password field empty then this if will be execute 
               if(empty($newpass)){
               $query= "Update user SET user_phone_number='$phonenumber',user_full_name='$fullname' where user_email='$email' and user_password='$enc_newpass' ";
            $conn->exec($query);
                    
                    $_SESSION['useremail']=$email;
                    $_SESSION['fullname']=$fullname;
                    $_SESSION['phone_num']=$phonenumber;
         ?>
          <script>location.assign('profile.php')</script>
            <?php   
                   
                }
             
            else{ 
                // if the new password field is not empty then else will be execute
            $query= "Update user SET user_password='$enc_newpass2',user_phone_number='$phonenumber',user_full_name='$fullname' where user_email='$email' and user_password='$enc_newpass' ";
            $conn->exec($query);
                
                    $_SESSION['useremail']=$email;
                    $_SESSION['fullname']=$fullname;
                    $_SESSION['phone_num']=$phonenumber;
                

             ?>
          <script>location.assign('profile.php')</script>
            <?php
            }
             
           }
            
       
        }
     
    
    
    
         catch (PDOException $ex){
           ?>
          <script>location.assign('login.php')</script>
            <?php
        }
    
}


}
else{
    
    // session not start so  user will take back to the log in page
    ?>
  <script>location.assign('login.php')</script>

<?php
    
}


?>