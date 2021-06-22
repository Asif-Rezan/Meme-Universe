<?php
include_once 'dbh.php';


if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(isset($_POST['template-name'])
      && isset($_POST['template-type'])
      && isset($_POST['template-price']) 
      && isset($_FILES['fname'])
  
  
      && !empty($_POST['template-name'])
      && !empty($_POST['template-type'])
      && !empty($_POST['template-price']) 
      && !empty($_FILES['fname']) 
   )

   {

    $templateName=$_POST['template-name'];
    $templateType=$_POST['template-type'];
    $templatPrice=$_POST['template-price'];
    $date = date('Y-m-d H:i:s');











   //upload file
   $receive_file=$_FILES['fname'];

   $fileName=$receive_file['name'];
   $temp_file_path=$receive_file['tmp_name'];
   $path="premium_template/$fileName";
  
  ///----------------------------------------

  
  $user_id=1;




  try{
  
    $sql="INSERT INTO templates(template_name,template_type,template_price,template_path,useruser_id) 
           VALUES('$templateName','$templateType','$templatPrice','$path','$user_id')";

    $conn->exec($sql);

    move_uploaded_file($temp_file_path,$path);



    


    header("location: template.php");

    

  }
  catch(Exception $ex)
  {
    header("location: index.php?error=failedtoupload");

  }



}

else
{
  echo 'error 1';
}

}

else
{
  echo "error 2";
}






?>