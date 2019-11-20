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
    <?php include 'navbar.php'; ?>
</ul>

<h1> Product </h1>

<?

print($gegevens["StockItemName"]);
?>

<p class="text-center"> <?php print($gegevens["StockItemName"]); ?> </p>
<p class="text-center"> <?php print($gegevens["unitPrice"]); ?> </p>

<div class="text-center">
<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><button type="button" class="btn btn-primary">Verder zoeken</button></a>
<!---->
<!--<div class="center">-->
<!-- --><?php //print($gegevens["StockItemName"]);
//       print($gegevens["unitPrice"] . "<br>"); ?>
<!--    <a href="index.php"><button type="button" class="btn btn-primary">Verder zoeken</button></a>-->
<!--</div>-->
<!--<br>--><?php //print($gegevens["melding"]); ?><!--<br>-->

</body>
</html>