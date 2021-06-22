<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
if(
    
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){ 
    
        //storing values to the variables
        
        $amount=$_POST['amount'];
        $ac_password=$_POST['upass'];
        $enc_pass=md5($ac_password);
        $username=$_SESSION['username'];
    
     try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
      
            //database code execute, default : warning generate
           $sqlquerystring="SELECT * From user WHERE user_name='$username' ";
            
            $returnobj=$conn->query($sqlquerystring);
            $data= $returnobj->fetch();
         
          $balance=$data['user_balance'];
          $id=$data['user_id'];
            $pass= $data['user_password'];
         
               
               if($pass == $enc_pass && $amount>=50){
                   if($balance >= 50 && $balance >= $amount){
                       $sqlquerystring="SELECT billing_date From billing WHERE user_id='$id' Order by billing_date desc";
            
                        $returnobj=$conn->query($sqlquerystring);
                        
                       if($returnobj->rowCount() >=1){
                           $data= $returnobj->fetch();
                           $sqlquerystring="SELECT DATEDIFF(CURRENT_TIMESTAMP,billing_date) as now From billing WHERE user_id='$id'Order by billing_date desc";
            
                            $returnobj=$conn->query($sqlquerystring);
                            $row= $returnobj->fetch();
                           $now = $row['now'];
                           if ($now>=10){
                               $balance= $balance-$amount;
                               $sqlquerystring="Update user SET user_balance='$balance' where user_id='$id'";
                               $conn->exec($sqlquerystring);
                               $sqlquerystring="INSERT INTO billing(billing_id,user_id,withdraw_amount,billing_date) VALUES ('','$id','$amount',CURRENT_TIMESTAMP())";
                               $conn->exec($sqlquerystring);
                                ?>
                            <script>
                              location.assign('profile.php');
                            </script>

                            <?php
                           }
                           else{
                               ?>
                              <script> 
                                  alert("you have to wait until you cool down time is over");
                              location.assign('profile.php');
                            </script>

                            <?php
                           }
                       }
                      else{$balance= $balance-$amount;
                               $sqlquerystring="Update user SET user_balance='$balance' where user_id='$id'";
                               $conn->exec($sqlquerystring);
                               $sqlquerystring="INSERT INTO billing(billing_id,user_id,withdraw_amount,billing_date) VALUES ('','$id','$amount',CURRENT_TIMESTAMP())";
                               $conn->exec($sqlquerystring);
                           ?>
                            <script>
                              location.assign('profile.php')
                            </script>

                            <?php
                          }
                       
                   }
                   else{
                       ?>
                          <script>alert("You don't have sufficient balance");
                          location.assign('profile.php')
                        </script>

                        <?php
                   }
                

                                        
                 }
                     
        
               
             
            else{ 
                
             ?>
              <script>alert("Password or Amount is not Valid");
              location.assign('profile.php')
            </script>

            <?php

          
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
  <script>location.assign('signup.php')</script>

<?php
    
}


?>