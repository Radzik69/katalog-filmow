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

        $curlDetails = curl_init();
        curl_setopt_array($curlDetails, [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID?language=en-US&append_to_response=budget",
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


    $curlCredits = curl_init();

    curl_setopt_array($curlCredits, [
        CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID/credits?language=en-US",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk", 
            "Accept: application/json"
        ],
    ]);

        $responseCredits = curl_exec($curlCredits);
        $errCredits= curl_error($curlCredits);

        curl_close($curlCredits);


        $curlExternalsIDs = curl_init();

        curl_setopt_array($curlExternalsIDs, [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID/external_ids",
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

        $responseExternalsIDs = curl_exec($curlExternalsIDs);
        $errExternalsIDs = curl_error($curlExternalsIDs);

        curl_close($curlExternalsIDs);



        $curlReccomendations = curl_init();

    curl_setopt_array($curlReccomendations, [
        CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID/recommendations?language=en-US&page=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk", 
            "Accept: application/json"
        ],
    ]);

        $responseReccomendations = curl_exec($curlReccomendations);
        $errReccomendations= curl_error($curlReccomendations);

        curl_close($curlReccomendations);


        

        $curlImages = curl_init();

        curl_setopt_array($curlImages, [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID/images",
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

        $responseImages = curl_exec($curlImages);
        $errImages = curl_error($curlImages);

        curl_close($curlImages);



        $curlReviews = curl_init();

        curl_setopt_array($curlReviews, [
          CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID/reviews?language=en-US&page=1",
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
        
        $responseReviews = curl_exec($curlReviews);
        $errReviews = curl_error($curlReviews);
        
        curl_close($curlReviews);
        

        
        if ($errReviews) {
          echo "cURL Error #:" . $err;
        } else {
            $dataReviews = json_decode($responseReviews, true); 
            $results = $dataReviews['results'];
        

            foreach ($results as $resultsFor) {
                $author = $resultsFor['author'];
                $author_details = $resultsFor['author_details'];
                $content = $resultsFor['content'];
                $created_at = $resultsFor['created_at'];
                $avatar_path = $resultsFor['avatar_path'];
                $rating = $resultsFor['rating'];

                echo $author;
                echo $avatar_path;
                echo $rating;
                echo $content;
                echo $created_at;
            }

        }


        if ($errReccomendations) {
            echo "cURL Error #:" . $errReccomendations;
        } else {
            $dataReccomendations = json_decode($responseReccomendations, true);

            $results = $dataReccomendations['results'];

            foreach ($results as $resultsFor) {
                echo "poster_path:  {$resultsFor['poster_path']}<br>";
                echo "title:  {$resultsFor['title']}<br>";
            }
            
        }



        
        if ($errImages) {
            echo "cURL Error #:" . $errImages;
        } else {
            $dataImages = json_decode($responseImages, true);
            $backdrops = $dataImages['backdrops'];
            $logos = $dataImages['logos'];
            foreach ($backdrops as $backdropsFor) {
                echo "file_path:  {$backdropsFor['file_path']}<br>";
            }
            foreach ($logos as $logosFor) {
                echo "file_path:  {$logosFor['file_path']}<br>";
            }
            foreach ($backdrops as $backdropsFor) {
                echo "file_path:  {$backdropsFor['file_path']}<br>";
            }
        }
        



        if ($errExternalsIDs) {
            echo "cURL Error #:" . $errExternalsIDs;
        } else {
            $dataExternalsIDs = json_decode($responseExternalsIDs, true);

            $imdb_id = $dataExternalsIDs['imdb_id'];
            $facebook_id = $dataExternalsIDs['facebook_id'];
            $wikidata_id = $dataExternalsIDs['wikidata_id'];
            $instagram_id = $dataExternalsIDs['instagram_id'];
            $twitter_id = $dataExternalsIDs['twitter_id'];

            echo "imdb: $imdb_id<br>";
            echo "facebook: $facebook_id<br>";
            echo "wikidata: $wikidata_id<br>";
            echo "instagram: $instagram_id<br>";
            echo "twitter: $twitter_id<br>";
        }




        if ($errCredits) {
            echo "cURL Error #:" . $errCredits;
        } else {
            $dataCredits = json_decode($responseCredits, true);
            $cast = $dataCredits['cast'];

            echo "Cast:<br>";
            foreach ($cast as $castFor) {
                echo "name:  {$castFor['name']}<br>";
                echo "profile_path: {$castFor['profile_path']}<br>";
                echo "character: {$castFor['character']}<br>";
                echo "known_for_department: {$castFor['known_for_department']}<br>";
            }
        }



        if ($errDetails) {
            echo "cURL Error #:" . $errDetails;
        } else {
            $dataDetails = json_decode($responseDetails, true);
            $adult = $dataDetails['adult'];
            $budget = $dataDetails['budget'];
            $overview = $dataDetails['overview'];
            $poster_path = $dataDetails['poster_path'];
            $release_date = $dataDetails['release_date'];
            $revenue = $dataDetails['revenue'];
            $runtime = $dataDetails['runtime'];
            $status = $dataDetails['status'];
            $tagline = $dataDetails['tagline'];
            $title = $dataDetails['title'];
            $vote_average = $dataDetails['vote_average'];
            $vote_count = $dataDetails['vote_count'];
            $genres = $dataDetails['genres'];
            $production_companies = $dataDetails['production_companies'];

            echo "Budget: $budget<br>";
            echo "Adult: $adult<br>";
            echo "Overview: $overview<br>";
            echo "Poster Path: $poster_path<br>";
            echo "Release Date: $release_date<br>";
            echo "Revenue: $revenue<br>";
            echo "Runtime: $runtime<br>";
            echo "Status: $status<br>";
            echo "Tagline: $tagline<br>";
            echo "Title: $title<br>";
            echo "Vote Average: $vote_average<br>";
            echo "Vote Count: $vote_count<br>";

            echo "Genres:<br>";
            foreach ($genres as $genre) {
                echo "- {$genre['name']}<br>";
            }
            echo "Production Companies:<br>";
            foreach ($production_companies as $prod_companies) {
                echo "- {$prod_companies['name']}<br>";
            }
        }
    } else {
        echo "chuj";
    }
    ?>
  <script>
  const options = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk'
    }
  };

  fetch('https://api.themoviedb.org/3/movie/2137/images', options)
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(err => console.error(err));
  </script>

</body>

</html>