<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

include "ProductFuncties.php";

$gegevens["StockItemID"] = isset($_GET["StockItemID"]) ? $_GET["StockItemID"] : 0;
$gegevens = ProductGegevensOpvragen($gegevens);

?>

<h1> Product </h1>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="">News</a></li>
    <li><a href="">Contact</a></li>
    <li><a href="">About</a></li>
</ul>

<?

print($gegevens["StockItemName"]);
?>

<p class="text-center"> <?php print($gegevens["StockItemName"]); ?> </p>
<p class="text-center"> <?php print($gegevens["unitPrice"]); ?> </p>

<div class="text-center">
<a href="index.php"><button type="button" class="btn btn-primary">Verder zoeken</button></a>
</div>
<br><?php print($gegevens["melding"]); ?><br>

</body>
</html>