<?php
session_start();
include_once 'dbh.php';



if($_SERVER['REQUEST_METHOD']=='POST')
{
  if( isset($_POST['post-type']) 
      && isset($_FILES['fname'])


      && !empty($_POST['post-type']) 
      && !empty($_FILES['fname']) 
   )

   {

    $postType=$_POST['post-type'];
    $postDetails=$_POST['post-details'];
    $date = date('Y-m-d H:i:s');
   

    $userid=$_SESSION['userid'];










   //upload file
   $receive_file=$_FILES['fname'];

   $fileName=$receive_file['name'];
   $temp_file_path=$receive_file['tmp_name'];
   $to="images/$fileName";
  
  ///----------------------------------------

  
  
 




  try{
  
    $sql="INSERT INTO memes(meme_name,meme_type,post_details,post_time) 
           VALUES('$fileName','$postType','$postDetails','$date')";

    $conn->exec($sql);

    move_uploaded_file($temp_file_path,$to);

    
    $sqlquerystring="SELECT meme_id
    FROM memes
    ORDER BY meme_id DESC
    LIMIT 1
       ";
    $returnobj=$conn->query($sqlquerystring);
    $row= $returnobj->fetch();
    $memeId= $row['meme_id'];

    


    // $sql3="SELECT meme_id FROM memes";
    // $returnObj=$conn->query($sql3);
    // $memeId=$returnObj['meme_id'];


    $sql2="INSERT INTO download(useruser_id,memesmeme_id) VALUES('$userid','$memeId')";
    $conn->exec($sql2);


    $sql4="INSERT INTO user_memes(useruser_id, memesmeme_id) VALUES('$userid',$memeId)";
    $conn->exec($sql4);


   


   




    header("location: index.php");

    

  }
  catch(Exception $ex)
  {
    echo $ex;
   // header("location: index.php?error=failedtoupload");

  }



}

else
{
  echo 'Failed to upload';
}

}

else
{
  echo "Failed to upload";
}






?>