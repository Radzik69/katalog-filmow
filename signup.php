<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGN UP</title>
  <link rel="stylesheet" href="styleAccounts.css">
</head>

<body id="bodyRegisterLogin">

  <div id="divRegisterLogin">

    <form action="signup.php" method="POST">
      <input type="text" placeholder="LOGIN" name="login" class="inputIndex">
      <input type="password" name="password" placeholder="PASSWORD" class="inputIndex">
      <input type="submit" value="LOGIN" class="inputIndex">
    </form>

    <?php

    if (isset($_POST["login"]) && isset($_POST["password"])) {

      $login = $_POST["login"];
      $password = $_POST["password"];

      $server = "localhost";
      $dbuser = "root";
      $dbpassword = "";
      $dbname = "katalog-filmow";


      $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
      $sql = "SELECT login,password,rights FROM users WHERE login='$login' AND password='$password'";

      $query = mysqli_query($conn, $sql);


      if (mysqli_num_rows($query) > 0) {
        $_SESSION["zalogowano"] = "true";
        $row = mysqli_fetch_assoc($query);
        $_SESSION["user"] = $row["login"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["rights"] = $row["rights"];
        header('Location: ./main.php');
        exit;
      } else {
        $row = mysqli_fetch_assoc($query);
        echo "<h1>LOGIN CREDENTIALS ARE WRONG</h1>";
      }

      mysqli_close($conn);
    }
    ?>
  </div>

</body>

</html>