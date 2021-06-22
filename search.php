<?php
session_start();
include_once 'header.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
</head>

<body class="search-body">

  <div class="container search-container">








    <?php
    
    include_once 'dbh.php';
    

    $searchKey=$_POST['search-key'];

    $sql="SELECT *
   FROM memes AS m
   JOIN user_memes as um
   ON m.meme_id=um.memesmeme_id
   JOIN user as u
   ON um.useruser_id=u.user_id
   WHERE m.meme_type LIKE'%$searchKey%'
   ORDER BY post_time DESC";
   // $sql="SELECT * FROM memes WHERE meme_type='$searchKey' ORDER BY post_time DESC";
    $returnObj=$conn->query($sql);




    //-- check user type--------------------->
    $user_id=$_SESSION['userid'];
    $sql2="SELECT account_type FROM permission WHERE user_id='$user_id'";
  
  
    $returnObj2=$conn->query($sql2);
   
    $data2=$returnObj2->fetchAll();
  
   
    foreach ($data2 as $row2) {
  
      $userType=$row2['account_type'];
    }
    //-----------------------end---------------->








    if($returnObj->rowCount()==0)
    {

      echo '<h4  class="m-auto text-center text-danger search-result-null p-5">No memes found</h4>';

    }
    else
    {
      $data=$returnObj->fetchAll();

      foreach ($data as $row) {

        $id=$row['meme_id'];



        //---------------------------------



        if($userType=='Diamond')
        {
        
        echo " <div class='text-center  my-5'>
               
               <div class='post-container'> 

               
               <div class=' post-details shadow-lg p-5'>

               <div class='row'>
               <div class='col-2'>
               <img class='img-fluid rounded-circle profile-img' src='ZISAN/$row[profile_pic_path]' alt='profile picture'>
                
               </div>
               <div class='col-10'>


               <h5 class='text-start'>$row[user_name]</h5>

               <p class='text-start text-muted'>$row[post_time]</p>

               </div>
               </div>
               
                

               <p class=''>$row[post_details] </p>
                <img class='img-fluid text-center'  src='images/$row[meme_name]' alt='image'> <br>
               

               <div class='text-center buttons'>

               <a  href='like.php?id=$row[meme_id]'><i class='fas fa-heart  btn-icon'></i></a>
                $row[post_like]
               <i class='fas fa-comment  btn-icon comment mx-4'></i>

               
                  


              
               <a href='share.php?meme_name=$row[meme_name] && meme_id=$row[meme_id]'> <i class='fas fa-share  btn-icon mx-4 share-btn' > </i></a>
               <a href='download.php?meme_name=$row[meme_name] && meme_id=$row[meme_id]'> <i class='fas fa-download  btn-icon mx-4'></i></a> <br>     
               </div>      
               </div>

              

              
         
               
              <form action='comment.php?id=5' method='POST'>
              <input class='form-control comment-box comment-div' type='text' name='comment' placeholder='Write a comment'/> 
              <input class='btn btn-primary comment-div' type='submit' name='comment-btn' value='comment' />
              <form>        

        
        ";

        }

        if($userType=='Silver')
        {
          echo " <div class='text-center  my-5'>
               
               <div class='post-container'> 

               
               <div class=' post-details shadow-lg p-5'>

               <div class='row'>
               <div class='col-2'>
               <img class='img-fluid rounded-circle profile-img' src='ZISAN/$row[profile_pic_path]' alt='profile picture'>
                
               </div>
               <div class='col-10'>


               <h5 class='text-start'>$row[user_name]</h5>

               <p class='text-start text-muted'>$row[post_time]</p>

               </div>
               </div>
               
                

               <p class=''>$row[post_details] </p>
                <img class='img-fluid text-center'  src='images/$row[meme_name]' alt='image'> <br>
               

               <div class='text-center buttons'>

               <a  href='like.php?id=$row[meme_id]'><i class='fas fa-heart  btn-icon'></i></a>
                $row[post_like]
               <i class='fas fa-comment  btn-icon comment mx-4'></i>



              
               </div>      
               </div>

              

              
         
               
              <form action='comment.php?id=5' method='POST'>
              <input class='form-control comment-box comment-div' type='text' name='comment' placeholder='Write a comment'/> 
              <input class='btn btn-primary comment-div' type='submit' name='comment-btn' value='comment' />
              <form>        

        
        ";
        }

      



















        

              

        


       
      }
      

    }



    ?>













  </div>






<script src="app.js"></script>
</body>

</html>