<?php
include 'navbar.php';

if (
  isset($_SESSION['useremail'])
  && !empty($_SESSION['useremail'] && $_GET["id"])

) {
    
    $id=$_GET["id"];
  //logged in user
  // session start so let the user to see the homepage
?>
  <!DOCTYPE html>

  <html>

  <head>
    <meta charset="utf-8">

    <title>MemeUniverse-Profile </title>

    <link href="icon12.jpg" rel="stylesheet" type="text/css">
    <link href="icon12.jpg" rel="icon">
    <link rel="stylesheet" href="../style.css">
    <style>
      body {

        /* background-image: url("2AY4J51.jpg"); */
        background-color: white;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
      }

      .form-div {

        text-align: center;

        color: wheat;
        margin: auto;
       

      }

      label {
        color: white;
        margin: 10px;
      }

      .title {

        margin-top: 50px;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
        text-shadow: 2px 2px 2px red;



      }

      input {
        margin-top: 10px;
        width: 10%;
        height: 30px;
        background: white;
      }

      a {
        text-decoration: none;
        color: white;
      }

      .submit-button {
        background-color: green;
        color: white;
        width: 120px;

      }

      .submit-button:hover {
        background-color: red;
      }

      .profile-pic{
        width: 200px;
        height: 200px;
      }
      .profile-div
      {
        background-color: #fff;
        margin-top: 20px;
      }
      .search-div
      {

        margin-left: auto;
        width: 350px;
      }
      .search-field
      {
        display: inline;
        width: 200px;
      }





    </style>
  </head>

  <body>
    <div class="container">
    

   
      <div class="">
        

     
       
        <div class="row profile-div shadow-lg p-5">
          <div class="col-lg-2">
              <?php
               $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $email=$_SESSION['useremail'];
            $sqlquerystring="SELECT * From user WHERE user_id=$id";
            $returnobj=$conn->query($sqlquerystring);       
            $data= $returnobj->fetch();
            $path=$data['profile_pic_path'];
            $fullname=$data['user_full_name'];
            $email=$data['user_email'];
         
           
         
              ?>
              
              
          <img class="profile-pic img-fluid rounded-circle" src="<?php  echo $path ?>" alt="Profile picture">
          </div>
          <div class="col-lg-9 mt-3 ">
          


           <h3><?php echo $fullname; ?></h3>
           <h5><?php echo $email; ?></h5>
          
        
          </div>

        </div>
      
    <?php

    $sql="SELECT * 
        FROM `memes` as m
        JOIN
        user_memes as um
        ON m.meme_id = um.memesmeme_id
        WHERE um.useruser_id = '$id'
        ORDER BY m.post_time DESC";
    $returnObj=$conn->query($sql);

   
    if($returnObj->rowCount()==0)
    {

    }
    else
    {
      $data=$returnObj->fetchAll();

      foreach ($data as $row) {

        $time=$row['post_time'];
          
          $path2=$row['meme_name'];

          $mid=$row['meme_id'];
          
         
          
        // $post_time=$row['post_time'];
        // $time_diff=date_diff($post_time,$current_date);
        ?>
         <div class='text-center  my-5'>
               
               <div class='post-container'> 

               
               <div class=' post-details shadow-lg p-5'>

               <div class='row'>
               <div class='col-2'>

               </div>
               <div class='col-10'>
               

               </div>
               </div>
               
                
               <p class='text-center text-muted'> <?php echo $time ?> </p>
               <p class=''> <?php echo $row['post_details'] ?> </p>
               <img class='img-fluid text-center'   src='../images/<?php echo $path2 ?> '  alt='image'  width="500" height="500"> <br>

               <div class='text-center buttons'>

               <a  href='../like.php?id= <?php echo $mid?>'><i class='fas fa-heart  btn-icon'></i></a>
               <?php echo $row['post_like'] ?>
               <i class='fas fa-comment  btn-icon comment mx-4'></i>

               <a href='../share.php?meme_id=<?php echo $mid ?> && meme_name=<?php echo $path2 ?>'> <i class='fas fa-share  btn-icon mx-4'></i></a>

               <a href='../download.php?meme_id=<?php echo $mid ?> && meme_name=<?php echo $path2 ?>'> <i class='fas fa-download  btn-icon mx-4'></i></a> <br>     

               </div>
              
              
               </div>

               </div>
             
                  </div>
               </div> 
        
                  <?php
        

    
       
      }


    }



 ?>

            

     <script>
          function deletefn() {
              var r = confirm("Are you sure, you want to delete your Profile?");
              console.log(r);
            if (r == true) {
                console.log('works');
              location.assign('deleteprofile.php');
            }
          }
          

          function homefn() {
            location.assign('home.php');
          }
         function userinfofn(){
             location.assign('userinfo.php');
         }
        
        

        </script>
        </div>
      
  </body>

  </html>
      


<?php
} else {

  // session not start so  user will take back to the log in page
?>
  <script>
    location.assign('login.php')
  </script>

<?php

}

?>