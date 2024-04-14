<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body id="updateDBBody">
  <button onclick="menuTp()">MENU</button>
  <script>
    function menuTp() {
      window.location.href = "/katalog-filmow/main.php";
    }
  </script>
  <div class="button-container">
    <div class="UpdateDiv">
      <form action="./getInfoDB/addMovies.php" method="POST" target="_blank">
        <button class="UpdateButtons">
          UPDATE MOVIES
        </button>
      </form>
    </div>

    <div class="UpdateDiv">
      <form action="./getInfoDB/addSeries.php" method="POST" target="_blank">
        <button class="UpdateButtons">
          UPDATE SERIES
        </button>
      </form>
    </div>

    <div class="UpdateDiv">
      <form action="./getInfoDB/addActors.php" method="POST" target="_blank">
        <button class="UpdateButtons">
          UPDATE PEOPLE
        </button>
      </form>
    </div>
  </div>
</body>

</html>