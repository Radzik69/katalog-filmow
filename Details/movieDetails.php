<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleMovies.css">
</head>

<body id="body">

    <?php
    if (!$_SESSION["zalogowano"] == true) {
        header('Location: ./index.php');
        exit;
    }

    if (isset($_POST['filmId'])) {

        $movieID = $_POST["filmId"];

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
        $errCredits = curl_error($curlCredits);

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
        $errReccomendations = curl_error($curlReccomendations);

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



        $curlVideos = curl_init();

        curl_setopt_array($curlVideos, [
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID/videos?language=en-US",
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

            $resultsReccomendations = $dataReccomendations['results'];
            $i = 0;
            foreach ($resultsReccomendations as $resultsReccomendationsFor) {
                $poster_pathReccomendations[$i] = $resultsReccomendationsFor['poster_path'];
                $titleReccomendations[$i] = $resultsReccomendationsFor['title'];
                $relase_dateReccomendations[$i] = $resultsReccomendationsFor['release_date'];
                $id_Reccomendations[$i] = $resultsReccomendationsFor['id'];
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

            $a = 0;
            $b = 0;
            $c = 0;
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
            $crew = $dataCredits['crew'];
            $i = 0;
            $y = 0;
            foreach ($cast as $castFor) {

                $nameCast[$i] = $castFor['name'];
                $profile_pathCast[$i] = $castFor['profile_path'];
                $character[$i] = $castFor['character'];
                $known_for_department[$i] = $castFor['known_for_department'];
                $id_Cast[$i] = $castFor['id'];
                $i++;
            }

            foreach ($crew as $crewFor) {

                $nameCrew[$y] = $crewFor['name'];
                $profile_pathCrew[$y] = $crewFor['profile_path'];
                $job[$y] = $crewFor['job'];
                $department[$y] = $crewFor['department'];
                $id_Crew[$y] = $crewFor['id'];
                $y++;
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

            $a = 0;
            $b = 0;

            foreach ($genres as $genre) {
                $nameGenre[$a] = $genre['name'];
                $a++;
            }
            foreach ($production_companies as $prod_companies) {
                $logo_pathProdComp[$b] = $prod_companies['logo_path'];
                $nameProdComp[$b] = $prod_companies['name'];
                $b++;
            }
        }





        // echo "$key[0]<br>";
        // echo "$poster_pathReccomendations[0]<br>";
        // echo "$titleReccomendations[0]<br>";
        // echo "$file_pathBackdrops[0]<br>";
        // echo "$file_pathLogos[0]<br>";
        // echo "$file_pathPosters[0]<br>";
        // echo "$imdb_id <br>";
        // echo "$facebook_id <br>";
        // echo "$wikidata_id <br>";
        // echo "$instagram_id <br>";
        // echo "$twitter_id <br>";
        // echo "$nameCast[0]<br>";
        // echo "$profile_pathCast[0]<br>";
        // echo "$character[0]<br>";
        // echo "$known_for_department[0]<br>";
        // echo "$budget <br>";
        // echo "$adult <br>";
        // echo "$overview <br>";
        // echo "$release_date <br>";
        // echo "$revenue <br>";
        // echo "$runtime <br>";
        // echo "$status <br>";
        // echo "$tagline <br>";
        // echo "$title <br>";
        // echo "$vote_average <br>";
        // echo "$vote_count <br>";
        // echo "$nameGenre[0]<br>";
        // echo "$logo_pathProdComp[0]<br>";
        // echo "$nameProdComp[0]<br>";
    
    } else {
        echo "chuj";
    }
    ?>

    <div id="top">
        <div id="leftTop">
            <div id="poster">
                <?php
                if (isset($poster_path)) {
                    echo "<image src='https://image.tmdb.org/t/p/original/$poster_path' id='poster'>";
                }
                ?>
            </div>
            <div id="infoTop">
                <?php
                echo "<p></p><p></p>";
                if (isset($release_date)) {
                    echo "<p>$release_date</p>";
                }
                if (isset($status)) {
                    echo "<p>$status</p>";
                }
                ?>
            </div>
        </div>
        <div id="rightTop">
            <div id="rightTopTop">
                <?php
                if (isset($title)) {
                    echo "<p><b>$title</b></p>";
                }
                if (isset($vote_average) && isset($vote_count)) {
                    echo "<p><image src='https://em-content.zobj.net/source/joypixels/257/glowing-star_1f31f.png' id='starImage'>$vote_average/10 z $vote_count recenzji</p>";
                }
                if (isset($adult)) {
                    echo "<p>$adult</p>";
                }
                echo "<form action='movieDetails.php' method='POST'>
                <input type='text' name='filmId' hidden='true' value='$movieID'>
                <input type='text' name='userId' hidden='true' value='$_SESSION[user]'>
                <button name='watchlistSubmit'>ADD TO WATCHLIST</button>
            </form>
            <button onclick='menuTp()'>MENU</button>";
                if (isset($_POST["filmId"]) && isset($_POST["userId"]) && isset($_POST["watchlistSubmit"])) {
                    $server = "localhost";
                    $dbuser = "root";
                    $dbpassword = "";
                    $dbname = "katalog-filmow";
                    $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
                    $sql = "INSERT INTO `watchlist`(`userID`, `movieID`) VALUES ('$_POST[userId]','$_POST[filmId]')";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                    } else {
                        mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }
                ?>
                <script>
                    function menuTp() {
                        window.location.href = "/katalog-filmow/main.php";
                    }
                </script>
            </div>
            <div id="rightTopMiddle">
                <p id='overview'><?php echo isset($overview) ? $overview : ""; ?></p>
                <div class='socials'>
                    <p>SOCIAL MEDIA:</p>
                    <a href='https://www.imdb.com/title/<?php echo isset($imdb_id) ? $imdb_id : ""; ?>'
                        target='_blank'>IMDB</a>
                    <a href='https://www.wikidata.org/wiki/<?php echo isset($wikidata_id) ? $wikidata_id : ""; ?>'
                        target='_blank'>wikidata</a>
                    <a href='https://www.facebook.com/<?php echo isset($facebook_id) ? $facebook_id : ""; ?>'
                        target='_blank'>facebook</a>
                    <a href='https://www.instagram.com/<?php echo isset($instagram_id) ? $instagram_id : ""; ?>'
                        target='_blank'>instagram</a>
                    <a href='https://twitter.com/<?php echo isset($twitter_id) ? $twitter_id : ""; ?>'
                        target='_blank'>twitter</a>
                </div>
            </div>
            <div id="rightTopBottom">
                <div id="genres">
                    <h1>Genres:</h1>
                    <?php
                    if (isset($nameGenre)) {
                        foreach ($nameGenre as $nameGenreFor) {
                            echo "<p>-$nameGenreFor</p>";
                        }
                    }
                    ?>
                </div>
                <div id="prodComp">
                    <h1>Production Companies:</h1>
                    <?php
                    if (isset($production_companies)) {
                        $i = 0;
                        foreach ($production_companies as $production_companiesFor) {
                            $logo_pathProdComp[$i] = $production_companiesFor['logo_path'];
                            $nameProdComp[$i] = $production_companiesFor['name'];
                            echo "<p>-$nameProdComp[$i]</p><image src='https://image.tmdb.org/t/p/original/$logo_pathProdComp[$i]' class='prodCompClass'>";
                        }
                    }
                    ?>
                </div>
                <div id="tagline">
                    <?php
                    echo isset($tagline) ? "<p>$tagline</p>" : "";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="infoRecc">
        <div id="info">
            <?php
            echo isset($runtime) ? "<p>$runtime</p>" : "";
            echo isset($budget) ? "<p>$budget$</p>" : "";
            echo isset($revenue) ? "<p>$revenue$</p>" : "";
            ?>
        </div>
        <div id="Reccomendations">
            <h1>RECOMMENDATIONS:</h1>
            <div class="reccomendationsContainer">
                <?php
                for ($i = 0; $i < 6; $i++) {
                    echo "
            <div class='reccomendationsDiv'>
                <p>-" . (isset($titleReccomendations[$i]) ? $titleReccomendations[$i] : "") . "</p>
                <p>-" . (isset($relase_dateReccomendations[$i]) ? $relase_dateReccomendations[$i] : "") . "</p>
                <img src='https://image.tmdb.org/t/p/original/" . (isset($poster_pathReccomendations[$i]) ? $poster_pathReccomendations[$i] : "") . "' class='reccomendationsImageClass'>
                <input type='text' hidden='true' value='" . (isset($id_Reccomendations[$i]) ? $id_Reccomendations[$i] : "") . "'>
            </div>";
                }
                ?>
            </div>
        </div>
        <script>
            const reccDiv = document.getElementsByClassName("reccomendationsDiv");
            const body = document.getElementById("body")
            var myFunction = function formReccomendations(i) {
                var input = reccDiv[i].querySelector('input[type="text"]');
                console.log(input.value)
                const form = document.createElement("form")
                form.setAttribute("action", "movieDetails.php")
                form.setAttribute("method", "POST")
                body.appendChild(form)
                const inputForm = document.createElement("input")
                inputForm.setAttribute("name", "filmId")
                inputForm.setAttribute("value", input.value)
                form.appendChild(inputForm)
                form.submit()
            };
            for (var i = 0; i < reccDiv.length; i++) {
                reccDiv[i].addEventListener('click', myFunction.bind(this, i), false);
            }
        </script>
    </div>
    <div id="images">
        <h1>IMAGES</h1>
        <?php
        $page = 2;
        for ($i = 0; $i < $page; $i++) {
            echo "<image src='https://image.tmdb.org/t/p/original/" . (isset($file_pathPosters[$i]) ? $file_pathPosters[$i] : "") . "' class='imagesClass'>
        <image src='https://image.tmdb.org/t/p/original/" . (isset($file_pathBackdrops[$i]) ? $file_pathBackdrops[$i] : "") . "' class='imagesClass'>";
        }
        if (isset($_COOKIE["imagesNextPage"]) && $_COOKIE["imagesNextPage"] == $i + 2) {
            echo $_COOKIE["imagesNextPage"];
            $i = $_COOKIE["imagesNextPage"];
            $page = $_COOKIE["imagesNextPage"] + 2;
        }
        ?>
        <button onclick="imagesCookie()"></button>
        <script>
            var i = 0;

            function imagesCookie() {
                i = i + 2;
                document.cookie = `imagesNextPage=${i}`;
            }
        </script>
    </div>
    <div id="videos">
        <h1>VIDEOS</h1>
        <?php
        for ($i = 0; $i < 3; $i++) {
            echo "<iframe src='https://www.youtube.com/embed/" . (isset($key[$i]) ? $key[$i] : "") . "' class='videoClass'></iframe>";
        }
        ?>
    </div>
    <div id="cast">
        <h1>CREATORS</h1>
        <div class="creators-container">
            <?php
            for ($i = 0; $i < 20; $i++) {
                echo "<div class='creatorsClass'>
                    <div class='image-container'>
                        <img src='https://image.tmdb.org/t/p/original/" . (isset($profile_pathCast[$i]) ? $profile_pathCast[$i] : "") . "' class='creatorsImagesClass'>
                    </div>
                    <div class='text-container'>
                        <p>" . (isset($nameCast[$i]) ? $nameCast[$i] : "") . "</p>
                        <p>" . (isset($character[$i]) ? $character[$i] : "") . "</p>
                        <p>" . (isset($known_for_department[$i]) ? $known_for_department[$i] : "") . "</p>
                        <input type='text' hidden='true' value='" . (isset($id_Cast[$i]) ? $id_Cast[$i] : "") . "'>
                    </div>
                </div>";
            }
            for ($i = 0; $i < 10; $i++) {
                echo "<div class='creatorsClass'>
                    <div class='image-container'>
                        <img src='https://image.tmdb.org/t/p/original/" . (isset($profile_pathCrew[$i]) ? $profile_pathCrew[$i] : "") . "' class='creatorsImagesClass'>
                    </div>
                    <div class='text-container'>
                        <p>" . (isset($nameCrew[$i]) ? $nameCrew[$i] : "") . "</p>
                        <p>" . (isset($job[$i]) ? $job[$i] : "") . "</p>
                        <p>" . (isset($department[$i]) ? $department[$i] : "") . "</p>
                        <input type='text' hidden='true' value='" . (isset($id_Crew[$i]) ? $id_Crew[$i] : "") . "'>
                    </div>
                </div>";
            }
            ?>
        </div>
        <script>
            const creatorsClass = document.getElementsByClassName("creatorsClass");
            var myFunctionCreators = function formCreators(i) {
                var inputCreators = creatorsClass[i].querySelector('input[type="text"]');
                const formCreators = document.createElement("form")
                formCreators.setAttribute("action", "peopleDetails.php")
                formCreators.setAttribute("method", "POST")
                body.appendChild(formCreators)
                const inputFormCreators = document.createElement("input")
                inputFormCreators.setAttribute("name", "peopleID")
                inputFormCreators.setAttribute("value", inputCreators.value)
                formCreators.appendChild(inputFormCreators)
                formCreators.submit()
            };
            for (var i = 0; i < creatorsClass.length; i++) {
                creatorsClass[i].addEventListener('click', myFunctionCreators.bind(this, i), false);
            }
        </script>
    </div>
    <div id="Revievs">
        <div id="writeReview">
            <form action="movieDetails.php" method="POST">
                <h1>REVIEWS</h1>
                <input type="text" placeholder="TOPIC" name="topic">
                <div class="rating-container">
                    <p>Rating:</p>
                    <select name="rating">
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="text" placeholder="CONTENT" name="content">
                <?php
                echo "<input type='text' name='username' hidden='true' value='$_SESSION[user]'>";
                echo "<input type='text' name='filmId' hidden='true' value='$movieID'>";
                ?>
                <input type="submit" value="Submit" name="submit">
            </form>
            <?php
            if (isset($_POST["submit"])) {
                $topic = $_POST["topic"];
                $rating = $_POST["rating"];
                $content = $_POST["content"];
                $username = $_POST["username"];
                $filmId = $_POST["filmId"];
                $server = "localhost";
                $dbuser = "root";
                $dbpassword = "";
                $dbname = "katalog-filmow";
                $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
                $sql = "INSERT INTO `revievs`(`id`, `username`, `rating`,`topic`,`content`,`movieID`,`seriesID`) VALUES ('NULL','$username','$rating','$topic','$content','$filmId','NULL')";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                } else {
                    mysqli_error($conn);
                }
                mysqli_close($conn);
            }
            ?>
        </div>
        <div id="seeReviev">
            <?php
            $server = "localhost";
            $dbuser = "root";
            $dbpassword = "";
            $dbname = "katalog-filmow";
            $conn = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
            $sql = "SELECT username,rating,topic,content,likes,dislikes,movieID FROM revievs WHERE movieID=$movieID";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $username = $row["username"];
                    $rating = $row["rating"];
                    $topic = $row["topic"];
                    $content = $row["content"];
                    $likes = $row["likes"];
                    $dislikes = $row["dislikes"];
                    $movieID = $row["movieID"];
                    echo "<div class='revievDiv'>
                        <div class='revievDivLeft'>
                            <p>$username</p>
                            <p><image src='https://em-content.zobj.net/source/joypixels/257/glowing-star_1f31f.png' class='imagesReviev'>$rating/10</p>
                            <p>$likes likes<image src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVGJ8vM8s-kJz-TwC9qGK509_mdB6PsLSao3X_vOTD4g&s' class='imagesReviev'></p>
                            <p>$dislikes dislikes<image src='https://p7.hiclipart.com/preview/766/140/879/5bbf5a85324c1.jpg' class='imagesReviev'></p>
                        </div>
                        <div class='revievDivRight'>
                            <h1>$topic</h1>
                            <p>$content</p>
                        </div>
                    </div>";
                }
            } else {
                echo "<h1>NO REVIEWS WRITTEN</h1>";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>



    <script>
        const options = {
            method: 'GET',
            headers: {
                accept: 'application/json',
                Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkYjE5ZWYzOTE3ZjFjNDdkNTBiZWY3YzcxY2VmNTg2ZiIsInN1YiI6IjY1ZjlmNjA1NzA2YjlmMDE3ZGQzYzgzNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QfOsMwfuL3CYzpjHPVso-na7Ft8NycFA4U5DxIpgnTk'
            }
        };

        fetch('https://api.themoviedb.org/3/movie/438631/credits?language=en-US', options)
            .then(response => response.json())
            .then(response => console.log(response))
            .catch(err => console.error(err));
    </script>

</body>

</html>