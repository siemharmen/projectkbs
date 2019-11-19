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


<p class="text-center"> <?php print($gegevens["StockItemName"]); ?> </p>
<p class="text-center"> <?php print($gegevens["unitPrice"]); ?> </p>


<div class="text-center">
<a href="index.php"><button type="button" class="btn btn-primary">Terug naar producten</button></a>
</div>
<br><?php print($gegevens["melding"]); ?><br>

</body>
</html>