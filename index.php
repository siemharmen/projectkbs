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
        Zoekterm :<input type="text" value="<?php if (isset($_GET['term'])) echo $_GET['term']; ?>" name="term">
        <input type="submit" value="Submit"> <br>
    </form>
    <?php
    if(isset($_GET["term"]) == true){
        $producten = GezochteProductenOpVragen($_GET["term"]);
    }       else
        {$producten = AlleProductenOpVragen();} ?>
    <?php ToonProductenOpScherm($producten); ?>

</body>
</html>
