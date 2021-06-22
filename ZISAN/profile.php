<?php
include 'navbar.php';

if (
  isset($_SESSION['useremail'])
  && !empty($_SESSION['useremail'])

) {

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

      .profile-pic {
        width: 200px;
        height: 200px;
      }

      .profile-div {
        background-color: #fff;
        margin-top: 20px;
      }

      .search-div {

        margin-left: auto;
        width: 350px;
      }

      .search-field {
        display: inline;
        width: 200px;
      }
    </style>
  </head>

  <body>
    <div class="container">

      <div class="search-div">
        <form action="search.php" method="POST">

          <input class=" form-control search-field" type="text" id="searchkey" name="searchkey" placeholder="search">
          <input class="submit-button" type="submit" value="Go">
        </form>

      </div>



      <div class="">




        <div class="row profile-div shadow-lg p-5">
          <div class="col-lg-2">
            <?php
            $conn = new PDO('mysql:host=localhost:3306;dbname=meme_universe;', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $email = $_SESSION['useremail'];
            $sqlquerystring = "SELECT * From user WHERE user_email='$email'";
            $returnobj = $conn->query($sqlquerystring);
            $data = $returnobj->fetch();
            $path = $data['profile_pic_path'];
            $id = $data['user_id'];



            ?>


            <img class="profile-pic img-fluid rounded-circle" src="<?php echo $path ?>" alt="Profile picture">
          </div>
          <div class="col-lg-9 mt-3 ">



            <h3><?php echo $_SESSION['fullname']; ?></h3>
            <h5><?php echo $_SESSION['useremail']; ?></h5>


          </div>

          <div class="col-lg-1">

            <div class="ms-auto mt-5">
              <i onclick="deletefn();" class="fas fa-user-times fa-2x my-2"></i>
              <a style="text-decoration: none; color:black" href="updateprofile.php"><i onclick="" class="fas fa-user-edit fa-2x my-3"></i></a>
              <form action="subscribeprocess.php" method="POST">
                <input class="submit-button" id="register" type="submit" value="Get Premium">
              </form>



              <form action="cashin.php" method="POST">
                <input class="submit-button" id="cash" name="cash" type="submit" value="cash in">

              </form>
              <form action="bill.php" method="POST">
                <input class="submit-button" id="bill" name="bill" type="submit" value="Withdraw">
              </form>

            </div>


          </div>
        </div>

        <input type="button" value="user info" onclick="userinfofn()">

        <!--           uploading profile picture-->



        <?php
        $username = $_SESSION['username'];
        $conn = new PDO('mysql:host=localhost:3306;dbname=meme_universe;', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlquerystring = "SELECT *, CURRENT_DATE() as now From subscription as s Join user as u on u.user_id = s.user_id WHERE u.user_name= '$username'";
        $returnobj = $conn->query($sqlquerystring);
        if ($returnobj->rowCount() == 1) {
          $data = $returnobj->fetch();
          $enddate = $data['subscription_end_date'];
          $now = $data['now'];
          $id = $data['user_id'];

          if ($enddate > $now) {
        ?>
            <script>
              var x = document.getElementById("register");
              x.style.display = "none";
            </script>
        <?php
          } else {

            $sqlquerystring = "Update subscription SET subscription='0',subscription_start_date='NULL',subscription_end_date='NULL' where user_id='$id'";
            $conn->exec($sqlquerystring);

            $sqlquerystring = "Update permission SET can_download_meme='0',can_share_meme='0',can_re_edit_template='0',account_type='Silver' where user_id='$id'";
            $conn->exec($sqlquerystring);
          }
        }


        //        <!-- <input type="button" value="Home" onclick="homefn();"> -->
        //        <!-- <input type="button" value="delete profile" onclick="deletefn();"> -->
        //
        //        <!-- <form action="updateprofile.php" method="POST">
        //          <input class="submit-button" type="submit" value="Update">
        //        </form> -->


        ?>
        <div>
          <?php

          $sql = "SELECT * 
        FROM `memes` as m
        JOIN
        user_memes as um
        ON m.meme_id = um.memesmeme_id
        WHERE um.useruser_id = '$id'
        ORDER BY m.post_time DESC";
          $returnObj = $conn->query($sql);


          if ($returnObj->rowCount() == 0) {
          } else {
            $data = $returnObj->fetchAll();

            foreach ($data as $row) {

              $time = $row['post_time'];
              $path2 = $row['meme_name'];
              $mid = $row['meme_id'];


              // $post_time=$row['post_time'];
              // $time_diff=date_diff($post_time,$current_date);
          ?>
              <div class='text-center  my-5'>

                <div class='post-container'>

                  <div class=' post-details shadow-lg p-5'>

                  
                  <p class='text-center text-muted mt-3'> <?php echo $time ?> </p>
                    <p class=''> <?php echo $row['post_details'] ?> </p>
                    <img class='img-fluid text-center' src='../images/<?php echo $path2 ?> ' alt='image' width="500" height="500"> <br>

                    <div class='text-center buttons'>

                      <a href='../like.php?id= <?php echo $mid ?>'><i class='fas fa-heart  btn-icon'></i></a>
                      <?php echo $row['post_like'] ?>
                      <!-- <i class='fas fa-comment  btn-icon comment mx-4'></i> -->

                      <a href='../delete.php?name=<?php echo $path ?>&&id=<?php echo $mid ?>'> <i class='fas fa-trash-alt btn-icon delete mx-4'></i></a>
                      <a href='../share.php?meme_id=<?php echo $mid ?> && meme_name=<?php echo $path2 ?>'> <i class='fas fa-share  btn-icon mx-4'></i></a>
                      <a href='../editpost.php?id=<?php echo $mid ?>'> <i class='fas fa-edit  btn-icon mx-4'></i></a> <br>

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
        
        if (r == true) {
          
          location.assign('deleteprofile.php');
        }
      }

     


      function homefn() {
        location.assign('home.php');
      }

      function userinfofn() {
        location.assign('userinfo.php');
      }
    </script>

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