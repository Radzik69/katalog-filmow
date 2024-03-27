<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (!$_SESSION["zalogowano"] == true) {
        header('Location: ./index.php');
        exit;
    }

    if (isset ($_POST['filmId'])) {

        $movieID = $_POST["filmId"];
        echo $movieID;


    } else {
        echo "chuj";
    }
    ?>


</body>

</html>