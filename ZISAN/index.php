<?php
include_once 'header.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Meme Universe</title>
</head>

<body class="home-body">

  <div class="container home-container">






  <!-- <<-----------------------------Start form--------------------------------->

    <div class="post-form pt-3">

      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <textarea class="form-control post" name="post-details" id="post-details" placeholder="Write something about your post" required></textarea>

        <input  type="text" name="post-type" class="form-control post-type " placeholder="Enter post type" required />

        <input class="form-control file-input" name="fname" type="file" id="formFile" required>
        <input class="btn btn-success post-btn" type="submit" name="submit" value="Post">

     
     

      </form>

    </div>
    <!-- <<-----------------------------End form--------------------------------->



    <?php
    include_once 'dbh.php';

    $sql="SELECT * FROM memes ORDER BY post_time DESC";
    $returnObj=$conn->query($sql);

   
    if($returnObj->rowCount()==0)
    {

    }
    else
    {
      $data=$returnObj->fetchAll();

      foreach ($data as $row) {

        // $current_date =time();
        // $post_time=$row['post_time'];
        // $time_diff=date_diff($post_time,$current_date);
        
        echo " <div class='text-center  my-5'>
               
               <div class='post-container'> 

               
               <div class=' post-details shadow-lg p-5'>

               <div class='row'>
               <div class='col-2'>
               <img class='img-fluid rounded-circle profile-img' src='profile_images/profile-pic.png' alt='profile picture'>

               </div>
               <div class='col-10'>
               <h5 class='text-start'> User Name</h5>
               <p class='text-start text-muted'>$row[post_time]</p>

               </div>
               </div>
               
                

               <p class=''>$row[post_details] </p>
               <img class='img-fluid text-center'  src='images/$row[meme_name]' alt='image'> <br>

               <div class='text-center buttons'>

               <a  href='like.php?id=$row[meme_id]'><i class='fas fa-heart  btn-icon'></i></a>
                $row[post_like]
               <i class='fas fa-comment  btn-icon comment mx-4'></i>
                  
               <a  href='delete.php?name=$row[meme_name]&&id=$row[meme_id]'> <i class='fas fa-trash-alt btn-icon delete mx-4'></i></a>
               <a  href='#'> <i class='fas fa-share  btn-icon mx-4'></i></a>
               <a href='editpost.php?id=$row[meme_id]'> <i class='fas fa-edit  btn-icon mx-4'></i></a> <br>
               
               </div>
              
               
               </div>

               

               <h3>$row[post_comment]</h3>

              
        
      

              <form action='comment.php?id=$row[meme_id]' method='POST'>
              <input class='form-control comment-box comment-div' type='text' name='comment' placeholder='Write a comment'/> 
              <input class='btn btn-primary comment-div' type='submit' name='comment-btn' value='comment' />
              <form>
               
              <div>

             

             
              
             
              </div>
        
        ";

        


       
      }


    }



    ?>













  </div>






<script src="app.js"></script>
</body>

</html>