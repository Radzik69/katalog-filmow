<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body id="bodyMain">

  <?php

    if ($_SESSION["rights"] == "admin") {
      echo "
      <script>
        sessionStorage.setItem('rights', 'admin')
      </script>";
    }else{
      echo "
      <script>
        sessionStorage.setItem('rights', 'user')
      </script>";
    }

    if (isset($_POST['search'])) {
        $search_query = $_POST['search'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "katalog-filmow";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_COOKIE["chosenButton"] == "movie") {
            $sql = "SELECT id, movieName, popularity,poster_path FROM movies WHERE movieName LIKE '$search_query%' GROUP BY POPULARITY DESC LIMIT 20";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo
                        "
              <div class='divSearchClass'>
              <form action='Details/movieDetails.php' method='POST' class='filmDetails'>
                <img class='imageSearchClass' src='https://image.tmdb.org/t/p/original/$row[poster_path]' fetchpriority='high'>
                <p class='nameSearchClass'>$row[movieName]</p>
                <input type='text' value='$row[id]' name = 'filmId' id='filmId' hidden='true'>
                </form>
              </div>
              ";
                }
            } else {
                echo "0 results";
            }
        }

        if ($_COOKIE["chosenButton"] == "series") {
            $sql = "SELECT id, seriesTitle, popularity,poster_path FROM series WHERE seriesTitle LIKE '$search_query%' GROUP BY POPULARITY DESC LIMIT 20";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo
                        "
              <div class='divSearchClass'>
              <form action='Details/seriesDetails.php' method='POST' class='filmDetails'>
                <img class='imageSearchClass' src='https://image.tmdb.org/t/p/original/$row[poster_path]'>
                <p class='nameSearchClass'>$row[seriesTitle]</p>
                <input type='text' value='$row[id]' name='seriesID' id='seriesID' hidden='true'>
                
                </form>
              </div>
              ";
                }
            } else {
                echo "0 results";
            }
        }

        if ($_COOKIE["chosenButton"] == "people") {
            $sql = "SELECT id, name, popularity,profile_path FROM people WHERE name LIKE '$search_query%' GROUP BY POPULARITY DESC LIMIT 20";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo
                        "
              <div class='divSearchClass'>
              <form action='Details/peopleDetails.php' method='POST' class='filmDetails'>
                <img class='imageSearchClass' src='https://image.tmdb.org/t/p/original/$row[profile_path]'>
                <p class='nameSearchClass'>$row[name]</p>
                <input type='text' value='$row[id]' name = 'peopleID' id='peopleID' hidden='true'>
                </form>
              </div>
              ";
                }
            } else {
                echo "0 results";
            }
        }

        mysqli_close($conn);
        exit;
    }
    ?>
  <div id="menu">
    <div id="buttonToMain"></div>
    <div id="searchDiv">
      <form action="formSearchSubmited.php" method="POST" id="searchForm">
        <div id="searchButtons">
          <button type="button" class="buttonsChangeSearch">MOVIES</button>
          <button type="button" class="buttonsChangeSearch">SERIES</button>
          <button type="button" class="buttonsChangeSearch">PEOPLE</button>
        </div>
        <input type="text" name="search" id="search" placeholder="SEARCH">
        <input type="submit" value="CLICK" id="searchSubmit">
      </form>
    </div>
    <div id="account">
      <?php
        echo "<button id='buttonAccount' type='submit' onclick=buttonClickList()>$_SESSION[user]</button>";
      ?>
    </div>
  </div>
  <div id="middle">
    <div id="Links"></div>
    <div id='phpSearchDiv'>

    </div>
    <div id="main">
    </div>
  </div>

  <script>
  const button = document.getElementById("buttonAccount")

  var buttonIfClicked = 0

  function buttonClickList() {
    buttonIfClicked++
    if (buttonIfClicked <= 1) {

      if (window.sessionStorage.getItem("rights") == "admin") {
        const admin = document.createElement("button")
        admin.setAttribute("class", "accountButtons")
        admin.innerHTML = "Admin Panel"
        admin.setAttribute("onclick", "adminPanelGoTo()")
        button.appendChild(admin)
      }

      const watchlist = document.createElement("button")
      watchlist.setAttribute("class", "accountButtons")
      watchlist.setAttribute("onclick", "watchlistGoTo()")
      watchlist.innerHTML = "watchlist"
      button.appendChild(watchlist)



      const logout = document.createElement("button")
      logout.setAttribute("class", "accountButtons")
      logout.innerHTML = "logout"
      logout.setAttribute("onclick", "logout()")
      button.appendChild(logout)
    }
  }

  function adminPanelGoTo() {
    window.location = "adminPanel.php";
  }

  function watchlistGoTo() {
    window.location = "watchlist.php";
  }

  function logout() {
    var form = document.createElement("form")
    form.setAttribute("action", "index.php")
    form.setAttribute("method", "form")
    button.appendChild(form)
    var input = document.createElement("input")
    input.setAttribute("name", "logoutSession")
    form.appendChild(input)

    form.submit()
  }
  </script>

  <script>
  const buttons = document.getElementsByClassName("buttonsChangeSearch")
  var myFunction = function myFunction(i) {
    document.cookie = "chosenButton=movie"

    if (i == 0) {
      document.cookie = "chosenButton=movie"
    } else if (i == 1) {
      document.cookie = "chosenButton=series"
    } else if (i == 2) {
      document.cookie = "chosenButton=people"
    } else {
      document.cookie = "chosenButton=movie"
    }
  }

  for (i = 0; i < 3; i++) {
    buttons[i].addEventListener('click', myFunction.bind(this, i), false)
  }
  </script>


  <script>
  const phpSearchDiv = document.getElementById('phpSearchDiv');
  const divSearchClass = document.getElementsByClassName('divSearchClass');
  var i

  var myFunction = function myFunction(i) {
    clearInterval(Interval)
    const input = divSearchClass[i].querySelector('input[type="text"]');
    const form = divSearchClass[i].querySelector('form')
    input.setAttribute("value", input.value)
    form.submit()
  };
  var Interval = setInterval(function test() {
    for (i = 0; i < 20; i++) {

      if (document.body.contains(divSearchClass[0])) {
        divSearchClass[i].addEventListener('click', myFunction.bind(this, i), false)
      }
    }
  }, 1000)
  </script>



  <script>
  var search = document.getElementById("search");
  search.addEventListener("input", function(event) {
    var inputValue = search.value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "main.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("phpSearchDiv").innerHTML = xhr.responseText;
      }
    };
    xhr.send("search=" + inputValue);
    var phpSearchDiv = document.getElementById('phpSearchDiv');


    phpSearchDiv.style.height = '100%';
    phpSearchDiv.style.width = '85vh';
    phpSearchDiv.setAttribute("class", "changed")
  });
  </script>

</body>

</html>