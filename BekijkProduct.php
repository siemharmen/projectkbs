<?php

include "ProductFuncties.php";

$gegevens["StockItemID"] = isset($_GET["StockItemID"]) ? $_GET["StockItemID"] : 0;
$gegevens = ProductGegevensOpvragen($gegevens);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php print($gegevens['StockItemName']); ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="">News</a></li>
    <li><a href="">Contact</a></li>
    <li><a href="">About</a></li>
</ul>

<h1> Product </h1>

<?

print($gegevens["StockItemName"]);
?>

<div class="center">
 <?php print($gegevens["StockItemName"]);
       print($gegevens["unitPrice"] . "<br>"); ?>
    <a href="index.php"><button type="button" class="btn btn-primary">Verder zoeken</button></a>
</div>

<br><?php print($gegevens["melding"]); ?><br>

</body>
</html>