<?php
include 'ProductFuncties.php';
$goedkoopProducten = AlleGoedkoopProductenOpVragen();


?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginpagina.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: loginpagina.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wide World Importers!</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="wide.png" />
</head>
<body>
<script src="ImageSlideFunction.js"></script>
<!-- navigatiebalk -->

    <?php include 'navbar.php'; ?>


<!-- Pagina begin -->

<h1>Wide World Importers! </h1>
<br>

<!-- image slider -->

<div class="frontpageimage">
    <a href="productpagina.php"> <img class="mySlides" src="sale.png" style="width:100%"></a>
    <a href="productpagina.php"> <img class="mySlides" src="teddy.jpg" style="width:100%"></a>
    <a href="productpagina.php"><img class="mySlides" alt="bloem" src="kaarsen.jpg" style="width:100%"></a>
</div>

<!-- linken van javascript file -->
<script src="script.js"></script>

<br><br>




<div class="text-center">
<a href="productpagina.php"><button type="button" class="btn btn-primary btn-lg">Alle Producten</button></a>
</div>

<br><br>

<div class="container-fluid">

    <h1> Kerstkado's: </h1> <br>

    <div class="row">
    <?php ToonGoedkoopProductenOpScherm($goedkoopProducten); ?>
    </div>
</div>
<?php if (isset($_SESSION['success'])) : ?>
    <div class="error success" >
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
<?php endif ?>

<!-- logged in user information -->

</body>
</html>