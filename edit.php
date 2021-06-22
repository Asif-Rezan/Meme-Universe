<?php
include_once 'dbh.php';

$newPost=$_POST['new-post'];
$id=$_GET['id'];


echo $newPost;
echo $id;

$sql="UPDATE memes SET post_details='$newPost' WHERE meme_id='$id'";

if($conn->exec($sql)==true)
{
  header('location: index.php?edit=successfull');
  
}
else
{
 echo '<h1 class="text-center m-auto">Failed to edit this post</h1>';

}


