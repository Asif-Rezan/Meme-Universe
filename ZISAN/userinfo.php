<?php
include 'navbar.php';
?>
<html>
  <head>
      
 <title>MemeUniverse-User Info</title>
    <style>   
 body{
    
 background-image : url('profileinfo.jpg'); 
  background-color : white;
  background-color: #fcfcfc;
  background-attachment : fixed;
  background-repeat : no-repeat;
  background-size : cover;
}   
          
       </style>
      
    </head>
</html>

<?php

if(
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
 
    ){  
          
         //logged in user    echo $_SESSION['useremail'];
            echo $_SESSION['fullname'];
            echo nl2br("  PROFILE INFORMATION\n");
            echo nl2br("\n");
            echo"Email-";
            echo $_SESSION['useremail'];
            echo nl2br("\n");
     
  
             
            echo"Fullname-";
            echo $_SESSION['fullname'];
            echo nl2br("\n");

           echo"Username-";
           echo $_SESSION['username'];
           echo nl2br("\n");
    
           
               
       //connecting with the server
      $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
      // showing all the details from user
      $username=$_SESSION['username'];
      $sqlquerystring="SELECT * From user WHERE user_name='$username' ";
      $returnobj=$conn->query($sqlquerystring);
      $data= $returnobj->fetch();
         
          $balance=$data['user_balance'];
          $phonenumber=$data['user_phone_number'];
          $id=$data['user_id'];
    
           echo"Phone number-";
           echo $phonenumber;
           echo nl2br("\n");
    
           echo"Balance-";
           echo $balance;
           echo nl2br("\n");
    
      //showing all the informations from subscription 
      $sqlquerystring="SELECT * FROM subscription WHERE user_id='$id' ";
               $returnobj=$conn->query($sqlquerystring);  
               $data= $returnobj->fetch();
               $subscription=$data['subscription'];
               echo"subscription-";
               echo $subscription;
               echo nl2br("\n");
               $start_date=$data['subscription_start_date'];
               $end_date=$data['subscription_end_date'];
              if($subscription==1){
                        echo"Subscribed";
                        echo nl2br("\n");
                        echo"Subscription start date-";
                        echo $start_date;
                        echo nl2br("\n");
                        echo"Subscription end date-";
                        echo $end_date;
                       
             }
    
           else{
                
               echo"Not subscribed";
             
           }     
                 
           //showing amount and cash in date informations from cash in 
           $sqlquerystring="SELECT * FROM cash_in WHERE user_id='$id' ";
              $returnobj=$conn->query($sqlquerystring); 
               if ($returnobj->rowCount() == 0) {
                   
               }
              else{
                  
                 echo nl2br("\n");
                 echo nl2br("\n");
                echo" Cash in details:  ";
                  
              $data= $returnobj->fetchAll();
              foreach ($data as $row) {
              $amount=$row['cash_in_ammount'];
              $date=$row['cash_in_date'];
              echo nl2br("\n");
              echo"Amount-";
              echo $amount ;
              echo", Cash in date-";
              echo $date;
                  }
                  
              }
                  
            //showing amount and withdraw date informations from billing
            $sqlquerystring="SELECT * FROM billing WHERE user_id='$id' ";
            $returnobj=$conn->query($sqlquerystring);
               if ($returnobj->rowCount() == 0) {
                   
                       }
             else{
                   echo nl2br("\n");
                   echo nl2br("\n");
                   echo" Withdraw details: "; 
                 
                 
                  $data= $returnobj->fetchAll();
                  foreach ($data as $row) {
                  $amount=$row['withdraw_amount'];
                  $date=$row['billing_date'];
                  echo nl2br("\n");
                  echo"Amount-";
                  echo $amount;
                  echo", Withdraw date-";
                  echo $date; 
                 }
                 
             }
                
    
    
         ?>
 
 


      



<?php
    
}

?>