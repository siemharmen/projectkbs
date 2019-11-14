<!DOCTYPE html>
<?php
include 'ProductFuncties.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wide World Importers!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <h1>Producten</h1>
<br>
    <?php $producten = AlleProductenOpVragen(); ?>


    <?php ToonProductenOpScherm($producten); ?>

</body>
</html>
