<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php

include "ProductFuncties.php";

$gegevens["StockItemID"] = isset($_GET["StockItemID"]) ? $_GET["StockItemID"] : 0;
$gegevens = ProductGegevensOpvragen($gegevens);


?>

<h1> Product Pagina </h1>

<?

print($gegevens["StockItemName"]);
?>
<br><?php print($gegevens["melding"]); ?><br>

<input class="form-control" type="text" name="" readonly value="<?php print($gegevens["StockItemName"]); ?>"/>
<a href="index.php">Terug naar alle producten</a>


</body>
</html>