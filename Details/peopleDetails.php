<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="stylePeople.css">
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
    $errCredits = curl_error($curlCredits);

    curl_close($curlCredits);


    $curlExternalsIDs = curl_init();

    curl_setopt_array($curlExternalsIDs, [
      CURLOPT_URL => "https://api.themoviedb.org/3/person/$peopleID/external_ids",
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





    $curlImages = curl_init();

    curl_setopt_array($curlImages, [
      CURLOPT_URL => "https://api.themoviedb.org/3/person/$peopleID/images",
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


    $curlTaggedImages = curl_init();

    curl_setopt_array($curlTaggedImages, [
      CURLOPT_URL => "https://api.themoviedb.org/3/person/$peopleID/tagged_images?page=1",
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

    $responseTaggedImages = curl_exec($curlTaggedImages);
    $errTaggedImages = curl_error($curlTaggedImages);

    curl_close($curlTaggedImages);




    if ($errImages) {
      echo "cURL Error #:" . $errImages;
    } else {
      $dataImages = json_decode($responseImages, true);
      $profiles = $dataImages['profiles'];

      $i = 0;
      foreach ($profiles as $profilesFor) {
        $file_pathImages[$i] = $profilesFor['file_path'];
        $i++;
      }
    }



    if ($errTaggedImages) {
      echo "cURL Error #:" . $errTaggedImages;
    } else {
      $dataTaggedImages = json_decode($responseTaggedImages, true);
      $results = $dataTaggedImages['results'];

      $i = 0;
      foreach ($results as $resultsFor) {
        $file_pathTaggedImages[$i] = $resultsFor['file_path'];
        $i++;
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
      $tiktok_id = $dataExternalsIDs['tiktok_id'];
      $youtube_id = $dataExternalsIDs['youtube_id'];

    }



    if ($errCredits) {
      echo "cURL Error #:" . $errCredits;
    } else {
      $dataCredits = json_decode($responseCredits, true);
      $cast = $dataCredits['cast'];
      $crew = $dataCredits['crew'];

      $a = 0;
      $b = 0;
      $crewNumber = 0;
      $castNumber = 0;

      foreach ($cast as $CastFor) {
        if (isset($CastFor['title'], $CastFor['poster_path'], $CastFor['release_date'], $CastFor['character'], $CastFor['media_type'])) {
          $titleCredits[$a] = $CastFor['title'];
          $poster_pathCredits[$a] = $CastFor['poster_path'];
          $release_dateCredits[$a] = $CastFor['release_date'];
          $characterCredits[$a] = $CastFor['character'];
          $media_typeCredits[$a] = $CastFor['media_type'];
          $a++;
          $crewNumber++;
        }
      }

      foreach ($crew as $crewFor) {
        if (isset($crewFor['title'], $crewFor['poster_path'], $crewFor['media_type'], $crewFor['job'], $crewFor['department'])) {
          $titleCrew[$b] = $crewFor['title'];
          $poster_pathCrew[$b] = $crewFor['poster_path'];
          $media_typeCrew[$b] = $crewFor['media_type'];
          $job[$b] = $crewFor['job'];
          $department[$b] = $crewFor['department'];
          $release_dateCrew[$b] = $crewFor['release_date'];
          $b++;
          $castNumber++;
        }
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
  } else {
    echo "chuj";
  }
  ?>

  <div id="top">
    <div id="left">
      <div id="poster">
        <?php
        echo "<img src='https://image.tmdb.org/t/p/original/$profile_path' class='imgPoster'>";
        ?>
      </div>
      <div id="infoBDday">
        <?php
        echo "
          <p>birthday: $birthday</p>
          <p>deathday: $deathday</p>
        ";
        ?>
      </div>
    </div>
    <div id="right">
      <div id="topRight">
        <?php
        echo "
            <h1>$name</h1>
            <p>$gender</p>
            <button onclick='menuTp()'>MENU</button>
          ";
        ?>
        <script>
          function menuTp() {
            window.location.href = "/katalog-filmow/main.php";
          }
        </script>
      </div>
      <div id="biography">
        <?php
        echo "
            <p>$biography</p>
          ";
        ?>
      </div>
      <div id="bottom">
        <div id="leftBottom">
          <?php
          echo "
              <p>$known_for_department</p>
              <p>Place of birth:$place_of_birth</p>
            ";
          ?>
        </div>
        <div id="socials">
          <?php
          echo "
            <p>SOCIAL MEDIA:</p>
            <a href='https://www.imdb.com/title/$imdb_id' target='_blank'>IMDB</a>
            <a href='https://www.wikidata.org/wiki/$wikidata_id' target='_blank'>wikidata</a>
            <a href='https://www.facebook.com/$facebook_id' target='_blank'>facebook</a>
            <a href='https://www.instagram.com/$instagram_id' target='_blank'>instagram</a>
            <a href='https://twitter.com/$twitter_id' target='_blank'>twitter</a>
            ";
          ?>
        </div>
      </div>
    </div>
  </div>

  <div id="images">
    <?php
    $page = 2;
    for ($i = 0; $i < $page; $i++) {
      echo "
        <img src='https://image.tmdb.org/t/p/original/$file_pathImages[$i]' class='imageClass'>
        <img src='https://image.tmdb.org/t/p/original/$file_pathTaggedImages[$i]' class='imageClass'>
      ";
    }
    ?>
    <button id="load-more-button" onclick="imagesCookie()">Load More</button>
  </div>

  <script>
    var i = 0;

    function imagesCookie() {
      i = i + 2;
      document.cookie = `imagesNextPage=${i}`;
    }
  </script>

  <div id="credits">
    <?php
    for ($i = 0; $i < $crewNumber; $i++) {
      echo "
      <div class='creditsClass'>
          <div class='image-container'>
              <img src='https://image.tmdb.org/t/p/original/$poster_pathCredits[$i]' class='creditsImagesClass'>
          </div>
          <div class='text-container'>
              <h1>$titleCredits[$i]</h1>
              <p>type: $media_typeCredits[$i]</p>
              <p>release date:$release_dateCredits[$i]</p>
              <p>character: $characterCredits[$i]</p>
          </div>
      </div>
  ";
    }

    for ($i = 0; $i < $castNumber; $i++) {
      echo "
      <div class='creditsClass'>
          <div class='image-container'>
              <img src='https://image.tmdb.org/t/p/original/$poster_pathCrew[$i]' class='creatorsImagesClass'>
          </div>
          <div class='text-container'>
              <h1>$titleCrew[$i]</h1>
              <p>type: $media_typeCrew[$i]</p>
              <p> release date: $release_dateCrew[$i]</p>
              <p>department: $department[$i]</p>
              <p>job: $job[$i]</p>
          </div>
      </div>
  ";
    }
    ?>
  </div>


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
  </script>

</body>

</html>