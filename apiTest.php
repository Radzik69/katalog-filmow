<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php

$id=0;
$movieName="";
$popularity=0;

$apiKey = 'db19ef3917f1c47d50bef7c71cef586f';
$page = 1; // Starting page

function fetchMovies($page) {
    global $apiKey;
    $endpoint = 'movie/popular'; // You can change this to other movie endpoints as needed
    $params = array(
        'page' => $page
    );
    return fetchData($endpoint, $params);
}

function fetchData($endpoint, $params = array()) {
    global $apiKey;
    $url = 'https://api.themoviedb.org/3/' . $endpoint;
    $params['api_key'] = $apiKey;
    $queryString = http_build_query($params);
    $fullUrl = $url . '?' . $queryString;
    $response = file_get_contents($fullUrl);
    return json_decode($response, true);
}

// Fetch and display information about every movie
while (true) {
    $movies = fetchMovies($page);
    if (empty($movies['results'])) {
        break; // No more movies available
    }
    
    foreach ($movies['results'] as $movie) {
       
        $movieName= $movie['title'];
        $id=$movie['id'];
        $popularity=$movie['popularity'];

      echo $movieName;
      echo ".....";
      echo $id;
      echo ".....";
      echo $popularity;
      echo "<br>";

      // if($id==150540){
      //   return 0;
      // }
      //   $server = "localhost";
      //   $dbuser = "root";
      //   $dbpassword = "";
      //   $dbname = "katalog-filmow";
      
      
      //   $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
      //   $sql = "INSERT INTO `movies`(`id`, `movieName`, `popularity`) VALUES ('$id','$movieName','$popularity')";
      
      //   $query = mysqli_query($conn, $sql);
      
      
      //   if ($query) {
      //       echo "dodalo sie";
      //   } else {
      //       mysqli_error($conn);
      //   }
      
      //   mysqli_close($conn);


    }
    $page++; // Move to the next page
}






?>



  do bazy danych:
  ID (by nim wyszukiwac filmy itp pozniej)
  Nazwa (przez nia wyszukiwanie filmow wpisuje sie np F i do bazy danych zapytanie o top filmy zaczynajace sie na F%)
  Popularnosc (bedzie sie wyswietlac np 10 najbardziej popularnych filmow w sugesti wyszukiwania)


</body>

</html>