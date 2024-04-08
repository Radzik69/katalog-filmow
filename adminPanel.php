<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGN UP</title>
  <link rel="stylesheet" href="adminPanel.css">
</head>

<body>
  <?php
      if ($_SESSION["rights"] != "admin") {
        echo "
        <script>
          window.location = 'main.php';
        </script>";
      }
    ?>
  <div id="users">
    <h1>USERS</h1>
    <?php
        $server = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "katalog-filmow";
  
  
        $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
        $sql = "SELECT * FROM users ORDER BY CASE WHEN rights = 'admin' THEN 1 ELSE 2 END;";
  
        $query = mysqli_query($conn, $sql);
  
  
        if (mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                $login = $row["login"];
                $password = $row["password"];
                $rights = $row["rights"];
                $id = $row["id"];
                echo"
                     <div class='adminPanelUsers'>
                        <div id=infoUsers>
                          <h2>Login: $login</h2>
                          <p>Password: $password</p>
                          <p>Right: $rights</p>
                        </div>

                        <div id='interactButtons'>
                        <form action='adminPanel.php' method='POST'>
                          <input name='deleteUser' hidden='true' value='$id'>
                          <input type='submit' value='DELETE' id='delete'>
                        </form>
                        </div>
                     </div>
                ";
            }
  
        } else {
            echo "<h1>NO USERS</h1>";
        }
  
        mysqli_close($conn);

        if(isset($_POST["deleteUser"])){
          $id = $_POST["deleteUser"];

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "katalog-filmow";

          $conn = mysqli_connect($servername, $username, $password, $dbname);

          $sql = "DELETE FROM users WHERE id=$id";

          if (mysqli_query($conn, $sql)) {

          } else {
            echo "Error deleting record: " . mysqli_error($conn);
          }

          mysqli_close($conn);

        }
      
      ?>
  </div>



  <div id="revievs">
    <h1>REVIEVS</h1>

    <?php
      $server = "localhost";
      $dbuser = "root";
      $dbpassword = "";
      $dbname = "katalog-filmow";


      $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
      $sql = "SELECT * FROM revievs";

      $query = mysqli_query($conn, $sql);


      if (mysqli_num_rows($query) > 0) {
          while($row = mysqli_fetch_assoc($query)) {
              $username = $row["username"];
              $rating = $row["rating"];
              $topic = $row["topic"];
              $content = $row["content"];
              $likes = $row["likes"];
              $dislikes = $row["dislikes"];
              $movieID = $row["movieID"];
              $id = $row["id"];
              echo"
                   <div class='revievDiv'>
                      <div class='revievDivLeft'>
                          <p>$username</p>
                          <p><image src='https://em-content.zobj.net/source/joypixels/257/glowing-star_1f31f.png' class='imagesReviev'>$rating/10</p>
                          <p>$likes likes<image src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVGJ8vM8s-kJz-TwC9qGK509_mdB6PsLSao3X_vOTD4g&s' class='imagesReviev'></p>
                          <p>$dislikes dislikes<image src='https://p7.hiclipart.com/preview/766/140/879/5bbf5a85324c1.jpg' class='imagesReviev'></p>

                      </div>

                      <div class='revievDivRight'>
                          <h1>$topic</h1>
                          <p>$content</p>
                      </div>
                      <form action='adminPanel.php' method='POST'>
                        <input name='deleteReviev' hidden='true' value='$id'>
                        <input type='submit' value='DELETE' id='deleteReviev'>
                      </form>
                      </div>
              ";
          }

      } else {
          echo "<h1>NO REVIEVS WRITTEN</h1>";
      }

      mysqli_close($conn);
    
      if(isset($_POST["deleteReviev"])){
        $id = $_POST["deleteReviev"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "katalog-filmow";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "DELETE FROM revievs WHERE id=$id";

        if (mysqli_query($conn, $sql)) {

        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);

      }

    ?>
  </div>
  <button onclick='menuTp()' style="width: 20%; height:50px">MENU</button>
  <script>
  function menuTp() {
    window.location.href = "/katalog-filmow/main.php";
  }
  </script>
</body>

</html>