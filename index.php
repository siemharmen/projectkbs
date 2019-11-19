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

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="">News</a></li>
    <li><a href="">Contact</a></li>
    <li><a href="">About</a></li>
    <div class="zoekbalk">
        <form action="index.php" method="get">
            <input type="text" name="term">
            <input type="submit" value="Zoek" class="btn btn-primary">
        </form>
    </div>


    <?php
    if(isset($_GET["term"]) == true){
        $producten = GezochteProductenOpVragen($_GET["term"]);
    }       else
    {$producten = AlleProductenOpVragen();} ?>
</ul>



<container>
    <h1>Product pagina</h1>




    <?php ToonProductenOpScherm($producten); ?>
</container>
</body>
</html>