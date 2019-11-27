<?php

include "ProductFuncties.php";

$cgegevens["StockGroupID"] = isset($_GET["StockGroupID"]) ? $_GET["StockGroupID"] : 0;
$cgegevens = ProductCategoryGegevensOpvragen($cgegevens);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> </title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="wide.png" />
</head>
<body>


<?php include 'navbar.php'; ?>




<div class="row">
    <?php ToonProductenOpScherm($producten); ?>



    <!--        --><?php // ToonGoedkoopProductenOpScherm($goedkoopProducten); ?>
</div>
<div class="text-center">
    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><button type="button" class="btn btn-primary">Verder zoeken</button></a>

</body>
</html>