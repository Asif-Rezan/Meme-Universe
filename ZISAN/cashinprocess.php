<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
if(
    
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){ 
    
        //storing values to the variables
        $amount=$_POST['amount'];
        $ac_number=$_POST['ac'];
        $holdername=$_POST['holder'];
        $ac_password=$_POST['upass2'];
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
         
               
               if($amount>=0){
                $b= $balance+$amount;
                $sqlquerystring="Update user SET user_balance='$b' where user_name='$username' ";
                $conn->exec($sqlquerystring);
                 
                $sqlquerystring="SELECT * FROM cash_in WHERE user_id='$id' ";
                $returnobj=$conn->query($sqlquerystring); 
                  
                     
                     $sqlquerystring="INSERT INTO cash_in(cash_in_ammount,user_id,ac_number,ac_holder_name,ac_password,cash_in_date) VALUES ('$amount','$id','$ac_number','$holdername','$enc_pass',CURRENT_TIMESTAMP())";
                      $conn->exec($sqlquerystring);
                      ?>
                  
                  <script>
                      alert("Balance added sucessfully");
                      location.assign('profile.php')
                  </script>

                                <?php
                                        
                 }
                     
        
               
             
            else{ 
                
             ?>
              <script>alert("You are inserting negative amount");
              location.assign('profile.php')
            </script>

            <?php

          
            }
             
           }
            
    
         catch (PDOException $ex){
                ?>
        <script>location.assign('profile.php')</script>

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