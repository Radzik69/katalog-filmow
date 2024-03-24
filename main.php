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
  session_start();
  if (!$_SESSION["zalogowano"] == true) {
    header('Location: ./index.php');
    exit;
  }

  if (isset ($_POST['search'])) {
    $search_query = $_POST['search'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "katalog-filmow";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die ("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id, movieName, popularity,poster_path FROM movies WHERE movieName LIKE '$search_query%' GROUP BY POPULARITY DESC LIMIT 20";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        //DODAC NA DOLE FORMA I DIVA DO DIVA EVENT LISTENER ZEBY PO KLIOKNIECIU DIVA WYSYLALO ID NA NOWA PODSTRONE
        echo
          "
              <div class='divSearchClass'>
              <form action='filmDetails.php' method='POST' class='filmDetails'>
                <img class='imageSearchClass' src='https://image.tmdb.org/t/p/original/$row[poster_path]'>
                <p class='nameSearchClass'>$row[movieName]</p>
                <input type='text' value='$row[id]' name='filmId' hidden='true'>
                </form>
              </div>
              ";
      }
    } else {
      echo "0 results";
    }

    mysqli_close($conn);
    exit;
  }
  ?>
  <div id="menu">
    <div id="buttonToMain"></div>
    <div id="searchDiv">
      <form action="" method="POST" id="searchForm">
        <input type="text" name="search" id="search" placeholder="SEARCH">
        <input type="submit" value="CLICK">
      </form>
    </div>
    <div id="account"></div>
  </div>
  <div id="middle">
    <div id="Links"></div>
    <div id='phpSearchDiv'>

    </div>
    <div id="main">
    </div>
  </div>

  <script>
    var search = document.getElementById("search");
    search.addEventListener("input", function (event) {
      // Get the value of the search input
      var inputValue = search.value;

      // Send the value to the same page using AJAX
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "main.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Response from the PHP script
          // You can handle the response here as needed
          document.getElementById("phpSearchDiv").innerHTML = xhr.responseText;

        }
      };
      xhr.send("search=" + inputValue);
      var phpSearchDiv = document.getElementById('phpSearchDiv');
      phpSearchDiv.style.height = '100%';
      phpSearchDiv.style.width = '85vh';
    });
  </script>

</body>

</html>