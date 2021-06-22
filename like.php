<?php
include_once 'dbh.php';



$id=$_GET['id'];

  $sql="SELECT post_like,is_liked FROM memes WHERE meme_id='$id'";

  $returnObj=$conn->query($sql);

  $data=$returnObj->fetchAll();

  foreach ($data as $row) {
    
  $currentLike=$row['post_like'];
  $isLiked=$row['is_liked'];


  }

  
   
  // If not like--------------->
  if($isLiked==0)
  {
    $flag=1; // update the isLiked value in database
    $newLike=$currentLike+1;

    $sql2="UPDATE memes SET post_like='$newLike', is_liked='$flag' WHERE meme_id='$id'";

  if($conn->exec($sql2)==true)
  {
    header('location: index.php?');
    
  }
  else
  {
  echo '<h1 class="text-center m-auto">Failed To Like This Post</h1>';

  }


  }

  //------------------------------------------------------------

  // if already liked----------------------->>
  if($isLiked==1)
  {
    $flag=0;
    $newLike=$currentLike-1;

    $sql2="UPDATE memes SET post_like='$newLike', is_liked='$flag' WHERE meme_id='$id'";

  if($conn->exec($sql2)==true)
  {
    header('location: index.php?');
    
  }
  else
  {
  echo '<h1 class="text-center m-auto">Failed To Like This Post</h1>';

  }


  }






  

  









      
