<?php
session_start();

// Function to select users from the database
function selectUsersFromDB()
{
  $server = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "katalog-filmow";

  $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
  $sql = "SELECT * FROM users ORDER BY CASE WHEN rights = 'admin' THEN 1 ELSE 2 END;";
  $query = mysqli_query($conn, $sql);

  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
      $login = $row["login"];
      $password = $row["password"];
      $rights = $row["rights"];
      $id = $row["id"];
      echo "
                <div class='adminPanelUsers'>
                    <div id='infoUsers'>
                        <h2>Login: $login</h2>
                        <p>Password: $password</p>
                        <p>Right: $rights</p>
                    </div>
                    <div id='interactButtons'>
                        <form action='adminPanel.php' method='POST'>
                            <input name='deleteUser' type='hidden' value='$id'>
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
}

// Function to select reviews from the database
function selectReviewsFromDB()
{
  $server = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "katalog-filmow";

  $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
  $sql = "SELECT * FROM revievs";
  $query = mysqli_query($conn, $sql);

  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
      $username = $row["username"];
      $rating = $row["rating"];
      $topic = $row["topic"];
      $content = $row["content"];
      $likes = $row["likes"];
      $dislikes = $row["dislikes"];
      $id = $row["id"];
      echo "
                <div class='revievDiv'>
                    <div class='revievDivLeft'>
                        <p>$username</p>
                        <p><img src='https://em-content.zobj.net/source/joypixels/257/glowing-star_1f31f.png' class='imagesReviev'>$rating/10</p>
                        <p>$likes likes <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVGJ8vM8s-kJz-TwC9qGK509_mdB6PsLSao3X_vOTD4g&s' class='imagesReviev'></p>
                        <p>$dislikes dislikes <img src='https://p7.hiclipart.com/preview/766/140/879/5bbf5a85324c1.jpg' class='imagesReviev'></p>
                    </div>
                    <div class='revievDivRight'>
                        <h1>$topic</h1>
                        <p>$content</p>
                    </div>
                    <form action='adminPanel.php' method='POST'>
                        <input name='deleteReview' type='hidden' value='$id'>
                        <input type='submit' value='DELETE' id='deleteReview'>
                    </form>
                </div>
            ";
    }
  } else {
    echo "<h1>NO REVIEWS WRITTEN</h1>";
  }
  mysqli_close($conn);
}

// Delete user if delete request is received
if (isset($_POST["deleteUser"])) {
  $id = $_POST["deleteUser"];

  $server = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "katalog-filmow";

  $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
  $sql = "DELETE FROM users WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    // Reload the page after deletion
    header("Refresh:0");
    exit();
  } else {
    echo "Error deleting user: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}

// Delete review if delete request is received
if (isset($_POST["deleteReview"])) {
  $id = $_POST["deleteReview"];

  $server = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "katalog-filmow";

  $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
  $sql = "DELETE FROM revievs WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    // Reload the page after deletion
    header("Refresh:0");
    exit();
  } else {
    echo "Error deleting review: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="adminPanel.css">
</head>

<body>
  <?php
  if ($_SESSION["rights"] != "admin") {
    echo "<script>window.location = 'main.php';</script>";
  }
  ?>
  <div id="users">
    <h1>USERS</h1>
    <?php selectUsersFromDB(); ?>
  </div>

  <div id="revievs">
    <h1>REVIEWS</h1>
    <?php selectReviewsFromDB(); ?>
  </div>

  <button onclick='menuTp()' style="width: 20%; height:50px">MENU</button>
  <script>
    function menuTp() {
      window.location.href = "/katalog-filmow/main.php";
    }
  </script>
</body>

</html>