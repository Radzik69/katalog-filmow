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

    if (isset($_POST['seriesID'])) {
        $seriesID = $_POST["seriesID"];

            $curlDetails = curl_init();
        curl_setopt_array($curlDetails, [
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
        $responseDetails = curl_exec($curlDetails);
        $errDetails = curl_error($curlDetails);
        curl_close($curlDetails);


    $curlCredits = curl_init();

    curl_setopt_array($curlCredits, [
        CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/aggregate_credits?language=en-US",
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
            CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/external_ids",
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
        CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/recommendations?language=en-US&page=1",
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
            CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/images",
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



        $curlVideos = curl_init();

            curl_setopt_array($curlVideos, [
            CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/videos?language=en-US",
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

            $responseVideos = curl_exec($curlVideos);
            $errVideos = curl_error($curlVideos);

            curl_close($curlVideos);




            if ($errVideos) {
                echo "cURL Error #:" . $errVideos;
            } else {
                $dataVideos = json_decode($responseVideos, true);
    
                $results = $dataVideos['results'];
                $i = 0;
                foreach ($results as $resultsFor) {
                    
                    $key[$i] = $resultsFor['key'];
                    $i++;
                }
                
            }
            

        if ($errReccomendations) {
            echo "cURL Error #:" . $errReccomendations;
        } else {
            $dataReccomendations = json_decode($responseReccomendations, true);

            $results = $dataReccomendations['results'];
            $i=0;
            foreach ($results as $resultsFor) {
                $poster_pathReccomendations[$i] = $resultsFor['poster_path'];
                $nameReccomendations[$i] = $resultsFor['name'];
                $i++;
            }
        }


        



        
        if ($errImages) {
            echo "cURL Error #:" . $errImages;
        } else {
            $dataImages = json_decode($responseImages, true);
            $backdrops = $dataImages['backdrops'];
            $logos = $dataImages['logos'];
            $posters = $dataImages['posters'];

            $a=0;
            $b=0;
            $c=0;
            foreach ($backdrops as $backdropsFor) {
                $file_pathBackdrops[$a] = $backdropsFor['file_path'];
                $a++;
            }
            foreach ($logos as $logosFor) {
                $file_pathLogos[$b] = $backdropsFor['file_path'];
                $b++;
            }
            foreach ($posters as $postersFor) {
                $file_pathPosters[$c] = $postersFor['file_path'];
                $c++;
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

            

            
        }




        if ($errCredits) {
            echo "cURL Error #:" . $errCredits;
        } else {
            $dataCredits = json_decode($responseCredits, true);
            $cast = $dataCredits['cast'];
            $i=0;
            foreach ($cast as $castFor) {

                $nameCast[$i] = $castFor['name'];
                $profile_pathCast[$i] = $castFor['profile_path'];
                $roles = $castFor['roles'];
                $a=0;
                foreach ($roles as $rolesFor) {
                  $character[$a] = $rolesFor['character'];
                  $a++;
              }
                $known_for_department[$i] = $castFor['known_for_department'];
                $i++;
            }
        }


           


        if ($errDetails) {
            echo "cURL Error #:" . $errDetails;
        } else {
            $dataDetails = json_decode($responseDetails, true);
            $first_air_date = $dataDetails['first_air_date'];
            $last_air_date = $dataDetails['last_air_date'];
            $name = $dataDetails['name'];
            $number_of_episodes = $dataDetails['number_of_episodes'];
            $number_of_seasons = $dataDetails['number_of_seasons'];
            $overview = $dataDetails['overview'];
            $poster_path = $dataDetails['poster_path'];
            $status = $dataDetails['status'];
            $vote_average = $dataDetails['vote_average'];
            $vote_count = $dataDetails['vote_count'];
            $genres = $dataDetails['genres'];
            $production_companies = $dataDetails['production_companies'];
            $seasons = $dataDetails['seasons'];

            $a=0;
            $b=0;
            $c=0;
            foreach ($genres as $genre) {
                $nameGenre[$a] = $genre['name'];
                $a++;
            }
            foreach ($production_companies as $prod_companies) {
                $logo_pathProdComp[$b] = $prod_companies['logo_path'];
                $nameProdComp[$b] = $prod_companies['name'];
                $b++;
            }
            foreach ($seasons as $seasonsFor) {
              $air_dateSeasons[$c] = $seasonsFor['air_date'];
              $episode_countSeasons[$c] = $seasonsFor['episode_count'];
              $nameSeasons[$c] = $seasonsFor['name'];
              $overviewSeasons[$c] = $seasonsFor['overview'];
              $poster_pathSeasons[$c] = $seasonsFor['poster_path'];
              $season_number[$c] = $seasonsFor['season_number'];
              $vote_averageSeasons[$c] = $seasonsFor['vote_average'];

              $c++;
          }
        }
        



        
            echo "$key[0]<br>";
            echo "$poster_pathReccomendations[0]<br>";
            echo "$nameReccomendations[0]<br>";
            echo "$file_pathBackdrops[0]<br>";
            echo "$file_pathLogos[0]<br>";
            echo "$file_pathPosters[0]<br>";
            echo "$imdb_id <br>";
            echo "$facebook_id <br>";
            echo "$wikidata_id <br>";
            echo "$instagram_id <br>";
            echo "$twitter_id <br>";
            echo "$nameCast[0]<br>";
            echo "$profile_pathCast[0]<br>";
            echo "$character[0]<br>";
            echo "$known_for_department[0]<br>";
            echo "$first_air_date <br>";
            echo "$last_air_date <br>";
            echo "$name <br>";
            echo "$number_of_episodes <br>";
            echo "$number_of_seasons <br>";
            echo "$overview <br>";
            echo "$poster_path <br>";
            echo "$status <br>";
            echo "$vote_average <br>";
            echo "$vote_count <br>";
            echo "$nameGenre[0]<br>";
            echo "$logo_pathProdComp[0]<br>";
            echo "$nameProdComp[0]<br>";
            echo "$air_dateSeasons[0]<br>";
            echo "$episode_countSeasons[0]<br>";
            echo "$nameSeasons[0]<br>";
            echo "$overviewSeasons[0]<br>";
            echo "$poster_pathSeasons[0]<br>";
            echo "$season_number[0]<br>";
            echo "$vote_averageSeasons[0]<br>";


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

  fetch('https://api.themoviedb.org/3/movie/157336/images', options)
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(err => console.error(err));
  </script>

</body>

</html>