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
    <form action="index.php" method="get">
        Zoek <input type="text" name="term">
        <input type="submit" value="Submit" class="btn btn-primary"> <br>
    </form>
    <?php
    if(isset($_GET["term"]) == true){
        $producten = GezochteProductenOpVragen($_GET["term"]);
    }       else
        {$producten = AlleProductenOpVragen();} ?>
    <br>

    <?php ToonProductenOpScherm($producten); ?>

</body>
</html>
