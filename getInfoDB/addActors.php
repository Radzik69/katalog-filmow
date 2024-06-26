<?php

$server = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "katalog-filmow";

$conn1 = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
$sql1 = "TRUNCATE TABLE `katalog-filmow`.`people`";
$query1 = mysqli_query($conn1, $sql1);
mysqli_close($conn1);




$id = 0;
$actorName = "";
$popularity = 0;

$apiKey = 'db19ef3917f1c47d50bef7c71cef586f';
$page = 1; // Starting page

function fetchPeople($page)
{
    global $apiKey;
    $endpoint = 'person/popular'; // Changed to person (actor) endpoint
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

// Fetch and display information about every actor
while (true) {
    $people = fetchPeople($page);
    if (empty($people['results'])) {
        break; // No more actors available
    }

    foreach ($people['results'] as $person) {
        $actorName = $person['name'];
        $id = $person['id'];
        $popularity = $person['popularity'];
        $profile_path = $person['profile_path'];

        $server = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "katalog-filmow";

        $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
        $sql = "INSERT INTO `people`(`id`, `name`, `popularity`,`profile_path`) VALUES ('$id','$actorName','$popularity','$profile_path')";

        try {
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "Dodano aktora: $actorName<br>";
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