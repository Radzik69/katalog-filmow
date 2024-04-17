<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="watchlist.css">
</head>

<body>

  <div id="movies">
    <?php
    if (isset($_SESSION["user"])) {

      $server = "localhost";
      $dbuser = "root";
      $dbpassword = "";
      $dbname = "katalog-filmow";

      $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
      $sql = "SELECT * FROM watchlist WHERE userID = '$_SESSION[user]'";

      $query = mysqli_query($conn, $sql);

      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $movieID = $row["movieID"];

          $curlDetails = curl_init();
          curl_setopt_array($curlDetails, [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID?language=en-US",
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
          $responseDetails = curl_exec($curlDetails);
          $errDetails = curl_error($curlDetails);
          curl_close($curlDetails);

          if ($errDetails) {
            echo "cURL Error #:" . $errDetails;
          } else {
            $dataDetails = json_decode($responseDetails, true);

            // Check if the expected keys exist in the response
            if (isset($dataDetails['poster_path']) && isset($dataDetails['release_date']) && isset($dataDetails['title']) && isset($dataDetails['vote_average']) && isset($dataDetails['vote_count'])) {
              $poster_path = $dataDetails['poster_path'];
              $release_date = $dataDetails['release_date'];
              $title = $dataDetails['title'];
              $vote_average = $dataDetails['vote_average'];
              $vote_count = $dataDetails['vote_count'];

              echo "
              <div class='moviesElement'>
                <div class='posterDiv'>
                  <img src='https://image.tmdb.org/t/p/original/$poster_path' class='poster'>
                </div>
                <div class='moviesInfo'>
                  <h1>$title</h1>
                  <p>$release_date</p>
                  <p><image src='https://em-content.zobj.net/source/joypixels/257/glowing-star_1f31f.png' class='starImage'>$vote_average/10 z $vote_count recenzji</p>
                </div>
              </div>
              ";
            }
          }
        }
      } else {
        echo "<h1>NO ITEMS IN WATCHLIST</h1>";
      }
    }
    ?>
  </div>

  <div id="series">
    <?php
    if (isset($_SESSION["user"])) {

      $server = "localhost";
      $dbuser = "root";
      $dbpassword = "";
      $dbname = "katalog-filmow";

      $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
      $sql = "SELECT * FROM watchlist WHERE userID = '$_SESSION[user]'";

      $query = mysqli_query($conn, $sql);

      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $seriesID = $row["seriesID"];

          $curlDetailsSeries = curl_init();
          curl_setopt_array($curlDetailsSeries, [
            CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID?language=en-US",
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
          $responseDetailsSeries = curl_exec($curlDetailsSeries);
          $errDetailsSeries = curl_error($curlDetailsSeries);
          curl_close($curlDetailsSeries);

          if ($errDetailsSeries) {
            echo "cURL Error #:" . $errDetailsSeries;
          } else {
            $dataDetails = json_decode($responseDetailsSeries, true);

            // Check if the expected keys exist in the response
            if (isset($dataDetails['poster_path']) && isset($dataDetails['first_air_date']) && isset($dataDetails['name']) && isset($dataDetails['vote_average']) && isset($dataDetails['vote_count'])) {
              $poster_path = $dataDetails['poster_path'];
              $first_air_date = $dataDetails['first_air_date'];
              $name = $dataDetails['name'];
              $vote_average = $dataDetails['vote_average'];
              $vote_count = $dataDetails['vote_count'];

              echo "
              <div class='moviesElement'>
                <div class='posterDiv'>
                  <img src='https://image.tmdb.org/t/p/original/$poster_path' class='poster'>
                </div>
                <div class='moviesInfo'>
                  <h1>$name</h1>
                  <p>$first_air_date</p>
                  <p><image src='https://em-content.zobj.net/source/joypixels/257/glowing-star_1f31f.png' class='starImage'>$vote_average/10 z $vote_count recenzji</p>
                </div>
              </div>
              ";
            }
          }
        }
      } else {
        echo "<h1>NO ITEMS IN WATCHLIST</h1>";
      }
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