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

    if (isset($_POST['filmId'])) {

        $movieID = $_POST["filmId"];
        echo $movieID;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/157336?language=en-US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk",
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

    } else {
        echo "chuj";
    }
    ?>


</body>

</html>