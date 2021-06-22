<?php
 session_start();
include_once 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="container">

<?php
  include_once 'dbh.php';
  $user_id=$_SESSION['userid'];
  $sql2="SELECT account_type FROM permission WHERE user_id='$user_id'";

  $returnObj2=$conn->query($sql2);
 
  $data2=$returnObj2->fetchAll();
  foreach ($data2 as $row2) {

    $userType=$row2['account_type'];
  }

  if($userType=='Diamond')
  {
    echo '<div class="me-auto">
    <i class="fas fa-plus-circle fa-2x tem-icon "></i>
    
    </div>';
  }


?>
<div class='mt-5'></div>





<!-- <<-----------------------------Start form--------------------------------->

<div class="post-form pt-3 tem-form">

<form action="upload_premium_template.php" method="POST" enctype="multipart/form-data">
  <textarea class="form-control post" name="template-name" placeholder="Enter template name" required></textarea>

  <input  type="text" name="template-type" class="form-control post-type " placeholder="Enter template type" required />
  <input  type="text" name="template-price" class="form-control post-type " placeholder="Enter template price" required />

  <input class="form-control file-input" name="fname" type="file" id="formFile" required>
  <input class="btn btn-success post-btn" type="submit" name="submit" value="Post">




</form>

</div>
<!-- <<-----------------------------End form--------------------------------->


<div class="row">


<?php
include_once 'dbh.php';

$sql="SELECT * FROM templates ORDER BY template_id DESC";
$returnObj=$conn->query($sql);


if($returnObj->rowCount()==0)
{

}
else
{
  $data=$returnObj->fetchAll();

  foreach ($data as $row) {

    if($row['own_template']==1)
    {

      echo "<div class='col-lg-4 mt-5'>
      <div class='card shadow-lg p-2' style='width: 20rem;'>
      <img src='$row[template_path]' class='card-img-top' alt='template picture'>
      <div class'card-body'>
        <h5 class='card-title text-center my-2'>$row[template_name]</h5>
        <p class='card-text text-center m-3'>Price: $row[template_price]</p>
        <div class='text-center'>
        <a href='purchase_template.php' class='btn btn-primary m-3 disabled'>Buy</a>
        <a href='#' class='btn btn-danger m-3'>Edit</a>
        </div>
       
      </div>
    </div>
    </div>
    ";

    }

   

  if($row['own_template']==0)    
  {
    echo "<div class='col-lg-4 mt-5'>
    <div class='card shadow-lg p-2' style='width: 20rem;'>
    <img src='$row[template_path]' class='card-img-top' alt='template picture'>
    <div class'card-body'>
      <h5 class='card-title text-center my-2'>$row[template_name]</h5>
      <p class='card-text text-center m-3'>Price: $$row[template_price]</p>
      <div class='text-center'>
      <a href='purchase_template.php?template_id=$row[template_id]&&price=$row[template_price]' class='btn btn-primary m-3'>Buy</a>
      <a href='#' class='btn btn-danger m-3 disabled'>Edit</a>
      </div>
     
    </div>
  </div>
  </div>
  ";
    
  }


  }

}

  

?>


</div>

























</div>




  <script src="app.js"></script>
</body>
</html>