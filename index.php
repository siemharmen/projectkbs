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
    <form>
        Test:<input type="text" name="term"><br>
    </form>
    <?php $producten = AlleProductenOpVragen(); ?>
    <?php  #$producten = GezochteProductenOpVragen("blue");?>


    <?php ToonProductenOpScherm($producten); ?>

</body>
</html>
