<!DOCTYPE html>
<?php
include 'ProductFuncties.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wide World Importers!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Product pagina</h1>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="">News</a></li>
    <li><a href="">Contact</a></li>
    <li><a href="">About</a></li>
</ul>

<container>
    <br>
    <div>
        <form action="index.php" method="get">
            <input type="text" name="term">
            <input type="submit" value="Zoek" class="btn btn-primary">
        </form>
    </div>
    <br>
    <?php
    if(isset($_GET["term"]) == true){
        $producten = GezochteProductenOpVragen($_GET["term"]);
    }       else
    {$producten = AlleProductenOpVragen();} ?>
    <br>

    <?php ToonProductenOpScherm($producten); ?>
</container>
</body>
</html>