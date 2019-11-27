<!DOCTYPE html>
<?php
include 'ProductFuncties.php';
$producten = AlleProductenOpVragen();


//category stukje
$cgegevens["StockGroupID"] = isset($_GET["StockGroupID"]) ? $_GET["StockGroupID"] : 0;
$cgegevens = ProductCategoryGegevensOpvragen($cgegevens);



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wide World Importers!</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="wide.png" />
</head>
<body>
<!-- navigatiebalk -->

    <?php include 'navbar.php'; ?>


<!-- Pagina begin -->
<div class="container-fluid">

    <h1>Product pagina</h1>

    <!-- radio buttons formulier -->

<!--    <p> Totaal op de pagina: </p>-->
<!---->
<!--    <form type="GET" action="ProductPagina.php">-->
<!--        <input type="radio" name="aantalfilter" value="5">5<br>-->
<!--        <input type="radio" name="aantalfilter" value="10">10<br>-->
<!--        <input type="radio" name="aantalfilter" value="10">10<br>-->
<!--        <input type="submit" name="aantalknop" value="filter">-->
<!--    </form>-->


    <div class="row">
        <?php ToonProductenOpScherm($producten); ?>



<!--        --><?php // ToonGoedkoopProductenOpScherm($goedkoopProducten); ?>
    </div>
</div>








</body>
</html>