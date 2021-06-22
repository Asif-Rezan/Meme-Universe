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



    <?php
    include_once 'dbh.php';


    $id=$_GET['id'];

    $sql="SELECT * FROM memes WHERE meme_id=$id";
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
               
                

               

               <div class='text-center'>

               <form action='edit.php?id=$id' method='POST'>
                <input class='form-control mb-5 py-5' name='new-post'  type='text'  value='$row[post_details]'  required></input>
                <img class='img-fluid text-center'  src='images/$row[meme_name]' alt='image'>
                <button class='btn btn-primary mt-5' type='submit' name='submit'>Update</button>
                <form>
               


               </div>

            
        
        ";

        


       
      }


    }



    ?>













  </div>






<script src="app.js"></script>
</body>

</html>