<?php
include 'navbar.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
if(
    isset($_SESSION['useremail']) 
    && !empty($_SESSION['useremail'])
    &&(isset($_POST['searchkey']) &&
        
        !empty($_POST['searchkey']))
 
    ){  try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
      
            //database code execute, default : warning generate
           $name=$_POST['searchkey'];
           $sqlquerystring="SELECT user_full_name, user_id FROM user WHERE user_full_name Like '%$name%'";
            
            
            ///executing the mysql code
           $returnobj=$conn->query($sqlquerystring);
          if($returnobj->rowCount()==0){
             echo "User not found";
         }
            else{
                //user found 
                $data= $returnobj->fetchAll();
                foreach ($data as $name){
                            $id=$name['user_id'];
                            ?>
                            <div>
                                <a href="anyprofile.php?id=<?php echo $id; ?>"><?php echo $name['user_full_name']; ?></a>
                            </div>
                            <?php
                    
                }
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