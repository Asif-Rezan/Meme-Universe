<?php
include_once 'dbh.php';


$memeName=$_GET['name'];
$memeId=$_GET['id'];

$path='images/'.$memeName;

$sql="DELETE from memes where meme_id=$memeId";


if($conn->exec($sql)==true)
{
  unlink($path);
  header("Location: index.php?delete=success");
  
}
else
{
  header("Location: index.php?delete=failed");

}

//echo $memeName;
//echo $memeId;
