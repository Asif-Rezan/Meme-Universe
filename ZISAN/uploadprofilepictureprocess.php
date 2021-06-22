<?php
session_start();

if(
        isset($_SESSION['useremail'])
    &&  !empty($_SESSION['useremail'])
){
    ///already logged in
    
    if( 
            
           isset($_FILES['image'])
        &&  !empty($_FILES['image'])
        
       
    ){
        
      $email=$_SESSION['useremail'];
        
        ///received all valid data
        
        ///file upload section
        $received_file=$_FILES['image'];
        $filename=$received_file['name'];
        
        $tmp_file_path=$received_file['tmp_name'];
        $to="profilepicture/$filename";
        
        
        
        ///database section
         try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
          
            //database code execute, default : warning generate
            $sqlquerystring="UPDATE user set profile_pic_path='$to' WHERE user_email='$email'";
             
            
           $conn->exec($sqlquerystring);
             
             
            ///uploading the file to our server folder
            move_uploaded_file($tmp_file_path,$to); 
             
             ?>
                <script>
                    alert("Profile picture uploaded sucessfully");
                    location.assign('profile.php')
                  </script>
            <?php
        }
        catch (PDOException $ex){
            echo "INSIDE CATCH";
            ?>
              
            <script>
                alert("Profile picture not uploaded");
                location.assign('login.php')
           </script>
            <?php
        }
        
        
        
    }
    else{
        ?>
            <script>location.assign('signup.php')</script>
        <?php
    }
}
else{
    ?>
        <script>location.assign('login.php')</script>
    <?php
}

?>
