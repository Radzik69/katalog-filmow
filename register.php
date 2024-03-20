<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="styleAccounts.css">
</head>



<body id="bodyRegisterLogin">

    <div id="divRegisterLogin">

        <form action="register.php" method="POST">
            <input type="text" placeholder="LOGIN" name="login" class="inputIndex">
            <input type="password" name="password" placeholder="PASSWORD" class="inputIndex">
            <input type="submit" value="REGISTER" class="inputIndex">
        </form>
    </div>

    <?php


    if (isset ($_POST["login"]) && isset ($_POST["password"])) {

        $login = $_POST["login"];
        $password = $_POST["password"];

        $server = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "katalog-filmow";


        $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
        $sql = "INSERT INTO `users`(`id`, `login`, `password`,`rights`) VALUES ('NULL','$login','$password','user')";

        $query = mysqli_query($conn, $sql);


        if ($query) {
            $_SESSION["zalogowano"] = "true";
            $_SESSION["user"] = $login;
            $_SESSION["rights"] = $password;
            header('Location: ./main.php');
            exit;
        } else {
            mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>

</body>

</html>