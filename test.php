<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form class='prodproductbtndiv' action='test.php' method='post'>
    <input name='addprod' type='hidden' value='".$h["id"]."'>
    <input name='Kilosc' min='1' max='".$h["ilosc"]."' value='1' type='number' class='prodproductipt'>
    <button type='submit' class='prodproductbtn'>Dodaj do koszyka</button>
  </form>

  <?php
  $userID = $_SESSION["id"];
  $productID = $_POST['addprod'];
  $Kilosc = $_POST['Kilosc'];

  echo $userID.", ".$productID.", ".$Kilosc;

  $sql = "INSERT INTO koszyki(userID, productID, Kilosc)
  VALUES ('$userID','$productID','$Kilosc')";

  if(mysqli_query($conn, $sql)) {
  echo "Produkt został dodany do koszyka.";
  } else {
  echo "Wystąpił błąd: " . mysqli_error($conn);
  }
  ?>
</body>

</html>