<!DOCTYPE html>
<?php
include 'ProductFuncties.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wide World Importers!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!-- navigatiebalk -->
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="">News</a></li>
    <li><a href="">Contact</a></li>
    <li><a href="">About</a></li>
    <div class="zoekbalk">
        <form action="index.php" method="get">
            <input type="text" name="term">
            <input type="submit" value="Zoek">
        </form>
    </div>


    <?php
    if(isset($_GET["term"]) == true){
        $producten = GezochteProductenOpVragen($_GET["term"]);
    }       else
    {$producten = AlleProductenOpVragen();} ?>
</ul>

<!-- Pagina begin -->
<div class="container-fluid">

    <h1>Product pagina</h1>

        <div class="row">
        <?php ToonProductenOpScherm($producten); ?>

        </div>
    </div>








</body>
</html>