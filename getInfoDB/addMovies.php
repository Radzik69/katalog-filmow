<?php

$id = 0;
$movieName = "";
$popularity = 0;

$apiKey = 'db19ef3917f1c47d50bef7c71cef586f';
$page = 1; // Starting page

function fetchMovies($page)
{
    global $apiKey;
    $endpoint = 'movie/popular'; // You can change this to other movie endpoints as needed
    $params = array(
        'page' => $page
    );
    return fetchData($endpoint, $params);
}

function fetchData($endpoint, $params = array())
{
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
    if (empty ($movies['results'])) {
        break; // No more movies available
    }

    foreach ($movies['results'] as $movie) {
        $movieName = $movie['title'];
        $id = $movie['id'];
        $popularity = $movie['popularity'];
        $poster_path = $movie['poster_path'];

        $server = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "katalog-filmow";

        $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
        $sql = "INSERT INTO `movies`(`id`, `movieName`, `popularity`,`poster_path`) VALUES ('$id','$movieName','$popularity','$poster_path')";

        try {
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "Dodano film: $movieName<br>";
            } else {
                throw new Exception(mysqli_error($conn));
            }
        } catch (mysqli_sql_exception $e) {
            echo "SQL error occurred: " . $e->getMessage() . "<br>";
            continue; // Skip to the next iteration
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage() . "<br>";
            continue; // Skip to the next iteration
        } finally {
            mysqli_close($conn);
        }
    }
    $page++; // Move to the next page
}

?>