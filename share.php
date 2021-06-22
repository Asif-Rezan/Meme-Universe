<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Share</title>
</head>
<body>
<div class="container">


<?php

$meme_name=$_GET['meme_name'];
$meme_id=$_GET['meme_id'];

$img_url='http://localhost//MEME%20UNIVERSE//images/'.$meme_name;





?>


<h1 class="text-center share-title">Share Your Favourite MeMe</h1>



 <!-- Facebook plugin for share -->
<div class="text-center mt-5">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="9pXNqZFm"></script>
<div data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small"><a class="fab fa-facebook-square fa-5x" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://asifrezan.com/uploads/shahriar-asif-rezan.60942c5a8276b6.39906585.jpg" class="fb-xfbml-parse-ignore"></a></div>
</div>
 <!-- End facebook plugin for share -->


 <h1 class="mt-5"> Copy url to share</h1>
<?php

echo "<input class='img-url-box form-control' value='$img_url' readonly/>
     <button class='btn btn-success py-2 copy-button'> Copy </button>";





     include_once 'dbh.php';

     


?>








</div>




  
</body>
</html>