<?php


$server = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "katalog-filmow";

$conn1 = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
$sql1 = "TRUNCATE TABLE `katalog-filmow`.`series`";
$query1 = mysqli_query($conn1, $sql1);
mysqli_close($conn1);





$id = 0;
$seriesName = "";
$popularity = 0;

$apiKey = 'db19ef3917f1c47d50bef7c71cef586f';
$page = 1; // Starting page

function fetchSeries($page)
{
    global $apiKey;
    $endpoint = 'tv/popular'; // Changed to TV series endpoint
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

// Fetch and display information about every TV series
while (true) {
    $series = fetchSeries($page);
    if (empty($series['results'])) {
        break; // No more series available
    }

    foreach ($series['results'] as $serie) {
        $seriesName = $serie['name'];
        $id = $serie['id'];
        $popularity = $serie['popularity'];
        $poster_path = $serie['poster_path'];

        $server = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "katalog-filmow";

        $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
        $sql = "INSERT INTO `series`(`id`, `seriesTitle`, `popularity`,`poster_path`) VALUES ('$id','$seriesName','$popularity','$poster_path')";

        try {
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "Dodano serial: $seriesName<br>";
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