<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="formSearchSubmited.css">
</head>

<body>

  <div id="menu">
    <button onclick='menuTp()' style="width: 20%; height:95px">MENU</button>
    <script>
    function menuTp() {
      window.location.href = "/katalog-filmow/main.php";
    }
    </script>
    FILTROWANIE
  </div>

  <?php
// db


if (isset($_POST['search'])) {
  $searchVal = $_POST["search"];

    $server = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "katalog-filmow";

      
    $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
    $sqlMovies = "SELECT id FROM movies WHERE movieName LIKE '$searchVal%' GROUP BY POPULARITY DESC LIMIT 5";
    $sqlSeries = "SELECT id FROM series WHERE seriesTitle LIKE '$searchVal%' GROUP BY POPULARITY DESC LIMIT 5";
    $sqlPeople = "SELECT id FROM people WHERE name LIKE '$searchVal%' GROUP BY POPULARITY DESC LIMIT 5";
    
    $queryMovies = mysqli_query($conn, $sqlMovies);
    $querySeries = mysqli_query($conn, $sqlSeries);
    $queryPeople = mysqli_query($conn, $sqlPeople);

    function get_movies($query) {
      $arr = [];
      if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_assoc($query)) {
          $id = $row["id"];

          $curlDetails = curl_init();
          curl_setopt_array($curlDetails, [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id?language=en-US",
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
          $err = curl_error($curlDetails);
          curl_close($curlDetails);
      
          if ($err) {
            echo "cURL Error #:" . $err;
            return $arr;
          }
          array_push($arr, json_decode($responseDetails, true));
        }
      }
      return $arr;
    }


    function get_series($query) {
      $arr = [];
      if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_assoc($query)) {
          $id = $row["id"];

          $curlDetailsSeries = curl_init();
          curl_setopt_array($curlDetailsSeries, [
              CURLOPT_URL => "https://api.themoviedb.org/3/tv/$id?language=en-US",
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
          $err = curl_error($curlDetailsSeries);
          curl_close($curlDetailsSeries);
      
          if ($err) {
            echo "cURL Error #:" . $err;
            return $arr;
          }
          array_push($arr, json_decode($responseDetailsSeries, true));
        }
      }
      return $arr;
    }

    function get_people($query) {
      $arr = [];
      if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_assoc($query)) {
          $id = $row["id"];
          
          $curlDetailsPeople = curl_init();
      
          curl_setopt_array($curlDetailsPeople, [
            CURLOPT_URL => "https://api.themoviedb.org/3/person/$id?language=en-US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
              "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk",
              "accept: application/json"
            ],
          ]);
      
          $responseDetailsPeople = curl_exec($curlDetailsPeople);
          $err = curl_error($curlDetailsPeople);
      
          curl_close($curlDetailsPeople);
      
          if ($err) {
            echo "cURL Error #:" . $err;
            return $arr;
          }
          array_push($arr, json_decode($responseDetailsPeople, true));
        }
      }
      return $arr;
    }

    $detailsMoviesArray =get_movies($queryMovies);
    $detailsSeriesArray =get_series($querySeries);
    $detailsPeopleArray =get_people($queryPeople);

    function get_movie_item($arr, $i){
      $dataDetails = $arr[$i];
      $poster_path = $dataDetails['poster_path'];
      $release_date = $dataDetails['release_date'];
      $title = $dataDetails['title'];
      $vote_average = $dataDetails['vote_average'];
      $vote_count = $dataDetails['vote_count'];
  
      return "  
        <div class='moviesElement'>
          <div class='posterDiv'>
            <img src='https://image.tmdb.org/t/p/original/$poster_path' class='poster'>
          </div>
          <div class='moviesInfo'>
            <h1>$title</h1>
            <p>Relase date: $release_date</p>
            <p><image src='https://em-content.zobj.net/source/joypixels/257/glowing-star_1f31f.png' class='starImage'>$vote_average/10 z $vote_count recenzji</p>
          </div>
        </div>
      ";
    };

    function get_series_item($arr, $i){
      $dataDetailsSeries = $arr[$i];
      $name = $dataDetailsSeries['name'];
      $number_of_seasons = $dataDetailsSeries['number_of_seasons'];
      $number_of_episodes = $dataDetailsSeries['number_of_episodes'];
      $vote_average = $dataDetailsSeries['vote_average'];
      $vote_count = $dataDetailsSeries['vote_count'];
      $poster_path = $dataDetailsSeries['poster_path'];
      $first_air_date = $dataDetailsSeries['first_air_date'];

      return "  
        <div class='moviesElement'>
          <div class='posterDiv'>
            <img src='https://image.tmdb.org/t/p/original/$poster_path' class='poster'>
          </div>
          <div class='moviesInfo'>
            <h1>$name</h1>
            <p>Relase date: $first_air_date</p>
            <p><image src='https://em-content.zobj.net/source/joypixels/257/glowing-star_1f31f.png' class='starImage'>$vote_average/10 z $vote_count recenzji</p>
            <p>$number_of_seasons seasons</p>
            <p>$number_of_episodes episodes</p>
          </div>
        </div>
      ";
    };

    function get_people_item($arr, $i){
      $dataDetailsPeople = $arr[$i];
      $birthday = $dataDetailsPeople['birthday'];
      $deathday = $dataDetailsPeople['deathday'];
      $known_for_department = $dataDetailsPeople['known_for_department'];
      $namePeople = $dataDetailsPeople['name'];
      $place_of_birth = $dataDetailsPeople['place_of_birth'];
      $profile_path = $dataDetailsPeople['profile_path'];

      return "  
        <div class='moviesElement'>
          <div class='posterDiv'>
            <img src='https://image.tmdb.org/t/p/original/$profile_path' class='poster'>
          </div>
          <div class='moviesInfo'>
            <h1>$namePeople</h1>
            <p>$known_for_department</p>
            <p>Birthday: $birthday</p>
            <p>Deathday: $deathday</p>
            <p>$place_of_birth</p>
          </div>
        </div>
     ";
    };

    for ($i=0; $i <5 ; $i++) { 
          echo '
          <div id="list">
            <div id="moviesDiv">
              ';   
              echo get_movie_item($detailsMoviesArray, $i);
              echo '</div>';
            echo '
            <div id="seriesDiv">
              ';
              echo get_series_item($detailsSeriesArray, $i);
            echo ' </div>
            <div id="peopleDiv">';
              echo get_people_item($detailsPeopleArray, $i);
            echo '</div>
          </div>';
        
    };


// for ($iSeries=0; $iSeries < count($detailsSeriesArray) ; $iSeries++) { 
//   for ($iMovie=0; $iMovie < count($detailsMoviesArray) ; $iMovie++) { 
//     for ($iPeople=0; $iPeople < count($detailsPeopleArray) ; $iPeople++) { 
//       echo '
//       <div id="list">
//         <div id="moviesDiv">
//           ';   
//           echo get_movie_item($detailsMoviesArray, $iMovie);
//           echo '</div>';
//         echo '
//         <div id="seriesDiv">
//           ';
//           echo get_series_item($detailsSeriesArray, $iSeries);
//         echo ' </div>
//         <div id="peopleDiv">';
//           echo get_people_item($detailsPeopleArray, $iPeople);
//         echo '</div>
//       </div>';
//     };
//   };
// };

    // if (mysqli_num_rows($queryMovies) > 0) {

    // }

}else{
  die('xds');
}


?>





</body>

</html>