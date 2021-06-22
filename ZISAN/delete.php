<?php



$memeName=$_GET['name'];
$memeId=$_GET['id'];

$path='images/'.$memeName;

$sql="DELETE from memes where meme_id=$memeId";
///database section
         try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=meme_universe;','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql)
         ?>
                <script>
                    location.assign('profile.php')
                  </script>
            <?php
        }
        catch (PDOException $ex){
            ?>
              
            <script>
                location.assign('profile.php')
           </script>
<?php } ?>
