<?php
include 'ProductFuncties.php';
$goedkoopProducten = AlleGoedkoopProductenOpVragen(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wide World Importers!</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body background="snow.gif">
<script src="ImageSlideFunction.js"></script>
<!-- navigatiebalk -->
<ul>
    <?php include 'navbar.php'; ?>
</ul>

<!-- Pagina begin -->

<h1>Wide World Importers! </h1>
<br>

<!-- image slider -->

<div class="frontpageimage">
    <a href="productpagina.php"> <img class="mySlides" src="https://uptownsj.com/wp-content/uploads/2016/04/06-jxkQNM1.jpg" style="width:100%"></a>
    <a href="productpagina.php"> <img class="mySlides" src="https://www.pcuinc.com/wp-content/uploads/2018/02/Rectangle-1920x1080-Placeholder.png" style="width:100%"></a>
    <a href="productpagina.php"><img class="mySlides" alt="bloem" src="http://www.cuttingedge.com.au/wp-content/uploads/2017/09/home-video-image-placeholder.jpg" style="width:100%"></a>
</div>

<!-- linken van javascript file -->
<script src="script.js"></script>

<br>

<div class="container-fluid">

    <h1> Kerstkado's: </h1> <br>

    <div class="row">
    <?php ToonGoedkoopProductenOpScherm($goedkoopProducten); ?>
    </div>
</div>

</body>
</html>