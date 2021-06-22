<?php
session_start();
include_once 'dbh.php';

$template_id=$_GET['template_id'];
$template_price=$_GET['price'];


$user_id=$_SESSION['userid']; 

$sql="UPDATE  templates SET own_template='1' WHERE template_id='$template_id'";

$sql2="UPDATE  user SET user_balance=user_balance-'$template_price' WHERE user_id='$user_id'";
$conn->exec($sql2);
$conn->exec($sql);
header('location: template.php?edit=successfull');
  



