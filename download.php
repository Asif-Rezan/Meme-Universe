<?php
session_start();
include_once 'dbh.php';

$meme_name=$_GET['meme_name'];
$path='images/'.$meme_name;
$to='images';

$memeId=$_GET['meme_id'];


//-----------------------------------------------------------------------------//


$user_id=$_SESSION['userid'];


// $sql="SELECT download_count FROM download WHERE useruser_id='$user_id'";

// $returnObj=$conn->query($sql);
   
// if($returnObj->rowCount()==0)
// {
//   echo "No data found";

// }
// else
// {
//   $data=$returnObj->fetchAll();

//   foreach ($data as $row) {

//     $current_downloads=$row['download_count'];

//   }
// }

//echo $current_downloads;

//$new_downloads=$current_downloads+1;

$sql2="UPDATE download SET download_count=download_count+1 WHERE useruser_id='$user_id' and memesmeme_id='$memeId' ";

$conn->exec($sql2);


$sql3="UPDATE user AS u
JOIN user_memes AS um
ON u.user_id=um.useruser_id
JOIN memes AS m
ON um.memesmeme_id=m.meme_id
SET u.user_balance=u.user_balance+0.005
WHERE m.meme_id='$memeId'
";
$conn->exec($sql3);















//------------------------------Download-----------------------------------------//
//Read the filename
$filename = $path;
//Check the file exists or not
if(file_exists($filename)) {

//Define header information
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");
header('Content-Disposition: attachment; filename="'.basename($filename).'"');
header('Content-Length: ' . filesize($filename));
header('Pragma: public');

//Clear system output buffer
flush();

//Read the size of the file
readfile($filename);

//Terminate from the script
die();
}
else{
echo "File does not exist.";
}


// $ch = curl_init($path);

// $save_dir='Downloads/';

// $complete_save_location=$save_dir . $meme_name;

// $fp = fopen($complete_save_location, 'wb');
// curl_setopt($ch, CURLOPT_FILE, $fp);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_exec($ch);
// curl_close($ch);
// fclose($fp);

//---------------------------------------End Download-------------------------------//










