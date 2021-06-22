<?php
include_once 'dbh.php';


  $comment=$_POST['comment'];
  $id=$_GET['id'];

  $current_date =time();

 // echo $comment;

 $user_id=1; //assume user_id =1

 echo $id;

  
 
  
//   $sql="INSERT INTO post_comment(comment,comment_time,useruser_id,memesmeme_id) 
//        VALUES('$comment','$current_date','$user_id','$id')";
       

//   $conn->exec($sql);




//   header("location: index.php?comment=successfull");

