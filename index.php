<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INDEX</title>
  <link rel="stylesheet" href="styleAccounts.css">
</head>

<body id="bodyRegisterLogin">

  <div id="divRegisterLogin">

    <form action="register.php" method="POST">
      <input type="submit" value="REGISTER" class="inputIndex">
    </form>

    <form action="signup.php" method="POST">
      <input type="submit" value="SIGN UP" class="inputIndex">
    </form>
  </div>

</body>

<?php

if (isset ($_SESSION["zalogowany"])) {

    if ($_SESSION["zalogowany"] == true) {
        header('Location: ./main.php');
        exit;
    }
}

?>

</html>