<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail']) &&
      isset($_SESSION['username']) && !empty($_SESSION['username']) ){
    try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
      
            //database code execute, default : warning generate
           $name=$_SESSION['username'];
          
           $sqlquerystring="SELECT user_balance,user_id FROM user WHERE user_name='$name'";
            
            
           //  ///executing the mysql code
           $returnobj=$conn->query($sqlquerystring);
            //user found 
           
            $data= $returnobj->fetch();
            
            $balance=$data['user_balance'];
            $id=$data['user_id'];
           
            if ($balance >= 50){
                $b= $balance-50;
                $sqlquerystring="Update user SET user_balance='$b' where user_name='$name' ";
                $conn->exec($sqlquerystring);
                
                
                
                $sqlquerystring="SELECT * FROM subscription WHERE user_id='$id' ";
                $returnobj=$conn->query($sqlquerystring);   
                
               if(($returnobj->rowCount()==1)){
                   
                   $sqlquerystring="Update subscription SET subscription='1',subscription_start_date=CURRENT_TIMESTAMP(),subscription_end_date=ADDDATE(CURRENT_TIMESTAMP(),30) where user_id='$id'";
                   $conn->exec($sqlquerystring); 
                
                $sqlquerystring="Update permission SET 
                can_download_meme='1',can_share_meme='1',can_re_edit_template='1',account_type='Diamond' where user_id='$id'";
                  $conn->exec($sqlquerystring); 
              
               } 
                else{
                      $sqlquerystring="INSERT INTO subscription(subscription_start_date,subscription_end_date,user_id,subscription) VALUES (CURRENT_TIMESTAMP(), ADDDATE(CURRENT_TIMESTAMP(),30), '$id','1')";
                      $conn->exec($sqlquerystring);
                    
                    
                    $sqlquerystring="Update permission SET can_download_meme='1',can_share_meme='1',can_re_edit_template='1',account_type='Diamond' where user_id='$id'";
                    $conn->exec($sqlquerystring); 
                }
                ?>
              <script>
              location.assign('profile.php')
              </script>

            <?php
            }
            else{
                ?>
              <script>alert("You dont have sufficient balance");
              location.assign('profile.php')
            </script>

            <?php
                  
              }
         
      }
        catch (PDOException $ex){
           ?>
<!--              As the database throws an exception it will take the user to the profile.php page-->
          <script>location.assign('profile.php')</script>
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