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

    if (isset($_POST['peopleID'])) {
        $peopleID = $_POST["peopleID"];

            $curlDetails = curl_init();
        curl_setopt_array($curlDetails, [
            CURLOPT_URL => "https://api.themoviedb.org/3/person/$peopleID?language=en-US",
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
        CURLOPT_URL => "https://api.themoviedb.org/3/person/$peopleID/combined_credits?language=en-US",
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


    //     $curlExternalsIDs = curl_init();

    //     curl_setopt_array($curlExternalsIDs, [
    //         CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/external_ids",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => [
    //             "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk",
    //             "accept: application/json"
    //         ],
    //     ]);

    //     $responseExternalsIDs = curl_exec($curlExternalsIDs);
    //     $errExternalsIDs = curl_error($curlExternalsIDs);

    //     curl_close($curlExternalsIDs);



    //     $curlReccomendations = curl_init();

    // curl_setopt_array($curlReccomendations, [
    //     CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/recommendations?language=en-US&page=1",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_HTTPHEADER => [
    //         "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk", 
    //         "Accept: application/json"
    //     ],
    // ]);

    //     $responseReccomendations = curl_exec($curlReccomendations);
    //     $errReccomendations= curl_error($curlReccomendations);

    //     curl_close($curlReccomendations);


        

    //     $curlImages = curl_init();

    //     curl_setopt_array($curlImages, [
    //         CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/images",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => [
    //             "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk",
    //             "accept: application/json"
    //         ],
    //     ]);

    //     $responseImages = curl_exec($curlImages);
    //     $errImages = curl_error($curlImages);

    //     curl_close($curlImages);



    //     $curlVideos = curl_init();

    //         curl_setopt_array($curlVideos, [
    //         CURLOPT_URL => "https://api.themoviedb.org/3/tv/$seriesID/videos?language=en-US",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => [
    //             "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk",
    //             "accept: application/json"
    //         ],
    //         ]);

    //         $responseVideos = curl_exec($curlVideos);
    //         $errVideos = curl_error($curlVideos);

    //         curl_close($curlVideos);




    //         if ($errVideos) {
    //             echo "cURL Error #:" . $errVideos;
    //         } else {
    //             $dataVideos = json_decode($responseVideos, true);
    
    //             $results = $dataVideos['results'];
    //             $i = 0;
    //             foreach ($results as $resultsFor) {
                    
    //                 $key[$i] = $resultsFor['key'];
    //                 $i++;
    //             }
                
    //         }
            

    //     if ($errReccomendations) {
    //         echo "cURL Error #:" . $errReccomendations;
    //     } else {
    //         $dataReccomendations = json_decode($responseReccomendations, true);

    //         $results = $dataReccomendations['results'];
    //         $i=0;
    //         foreach ($results as $resultsFor) {
    //             $poster_pathReccomendations[$i] = $resultsFor['poster_path'];
    //             $nameReccomendations[$i] = $resultsFor['name'];
    //             $i++;
    //         }
    //     }


        



        
    //     if ($errImages) {
    //         echo "cURL Error #:" . $errImages;
    //     } else {
    //         $dataImages = json_decode($responseImages, true);
    //         $backdrops = $dataImages['backdrops'];
    //         $logos = $dataImages['logos'];
    //         $posters = $dataImages['posters'];

    //         $a=0;
    //         $b=0;
    //         $c=0;
    //         foreach ($backdrops as $backdropsFor) {
    //             $file_pathBackdrops[$a] = $backdropsFor['file_path'];
    //             $a++;
    //         }
    //         foreach ($logos as $logosFor) {
    //             $file_pathLogos[$b] = $backdropsFor['file_path'];
    //             $b++;
    //         }
    //         foreach ($posters as $postersFor) {
    //             $file_pathPosters[$c] = $postersFor['file_path'];
    //             $c++;
    //         }
    //     }
        


            
    //     if ($errExternalsIDs) {
    //         echo "cURL Error #:" . $errExternalsIDs;
    //     } else {
    //         $dataExternalsIDs = json_decode($responseExternalsIDs, true);

    //         $imdb_id = $dataExternalsIDs['imdb_id'];
    //         $facebook_id = $dataExternalsIDs['facebook_id'];
    //         $wikidata_id = $dataExternalsIDs['wikidata_id'];
    //         $instagram_id = $dataExternalsIDs['instagram_id'];
    //         $twitter_id = $dataExternalsIDs['twitter_id'];

            

            
    //     }



        
        if ($errCredits) {
            echo "cURL Error #:" . $errCredits;
        } else {
            $dataCredits = json_decode($responseCredits, true);
            $cast = $dataCredits['cast'];
                $a=0;
                $b=0;
                foreach ($cast as $CastFor) {
                    $titleCredits = $CastFor['title'];
                    $poster_pathCredits = $CastFor['poster_path'];
                    $release_dateCredits = $CastFor['release_date'];
                    $characterCredits = $CastFor['character'];
                    $media_typeCredits = $CastFor['media_type'];
                  $a++;
                
            }
        }


           


        if ($errDetails) {
            echo "cURL Error #:" . $errDetails;
        } else {
            $dataDetails = json_decode($responseDetails, true);
            $biography = $dataDetails['biography'];
            $birthday = $dataDetails['birthday'];
            $deathday = $dataDetails['deathday'];
            $gender = $dataDetails['gender'];
            $known_for_department = $dataDetails['known_for_department'];
            $name = $dataDetails['name'];
            $place_of_birth = $dataDetails['place_of_birth'];
            $profile_path = $dataDetails['profile_path'];
            
        }
        



        
    //         echo "$key[0]<br>";
    //         echo "$poster_pathReccomendations[0]<br>";
    //         echo "$nameReccomendations[0]<br>";
    //         echo "$file_pathBackdrops[0]<br>";
    //         echo "$file_pathLogos[0]<br>";
    //         echo "$file_pathPosters[0]<br>";
    //         echo "$imdb_id <br>";
    //         echo "$facebook_id <br>";
    //         echo "$wikidata_id <br>";
    //         echo "$instagram_id <br>";
    //         echo "$twitter_id <br>";
    //         echo "$nameCast[0]<br>";
    //         echo "$profile_pathCast[0]<br>";
    //         echo "$character[0]<br>";
    //         echo "$known_for_department[0]<br>";
            echo "$biography <br>";
            echo "$birthday <br>";
            echo "$deathday <br>";
            echo "$gender <br>";
            echo "$known_for_department <br>";
            echo "$name <br>";
            echo "$place_of_birth <br>";
            echo "$profile_path <br>";


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

  fetch('https://api.themoviedb.org/3/person/30614/combined_credits?language=en-US', options)
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(err => console.error(err));

  const options1 = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk'
    }
  };

  fetch('https://api.themoviedb.org/3/tv/123/credits?language=en-US', options1)
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(err => console.error(err));
  </script>

</body>

</html>