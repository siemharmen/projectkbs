<?php
$producten = AlleProductenOpVragen();
$categorieën = AlleCategorieënOpVragen();
$totaal = TotaalProductenOpVragen();
//$goedkoopProducten = AlleGoedkoopProductenOpVragen();




?>

<nav>
<ul>
    <img class="navfoto" src="wide.png">
    <li><a class='navbarlink' href="index.php">Home</a></li>
    <li><a class='navbarlink' href="ProductPagina.php">Producten</a></li>

    <!-- categorieën in de navbar -->
    <li class="dropdown">Categorieën
        <ul class="dropdown-content">

            <?php toonCategoryOpScherm($categorieën); ?>
        </ul>
    </li>


    <!--zoekbalk-->


        <form class="zoekbalk" action="ProductPagina.php" method="get">
            <input type="text" name="term" value="<?php if (isset($_GET['term'])) echo $_GET['term'];?>">
            <input type="submit" value="Zoek">
        </form>
    </div>
        <li><a class='navbarlink' href="registreerpagina.php">Registreren</a></li>
        <li><a class='navbarlink' href="loginpagina.php">Inloggen</a></li>
        <li><a class='navbarlink' href="FotoNaarDatabase.php">FND</a></li>
        <li><a class='navbarlink' href="shoppingcart.php">Shoppingcart</a></li>




        <?php
        if(isset($_SESSION['username'])){
        } else {
            echo '<li><a class="navbarlink" href="registreerpagina.php">Registreren</a></li>';
            echo '<li><a class="navbarlink" href="loginpagina.php">Inloggen</a></li>';

        } ?>

    <li><a class="navbarlink" href="FotoNaarDatabase.php">FND</a></li>


        <?php
    if(isset($_GET["term"]) == true){

        $producten = GezochteProductenOpVragen($_GET["term"]);
    }       else
    {$producten = AlleProductenOpVragen();}
    ?>



            <?php /* if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif*/ ?>


        <div class="navinlog">


            <?php  if (isset($_SESSION['username'])) : ?>

                <a class="mand" style="float:left; color: white;" href="cart.php">Mand <i class="fas fa-shopping-cart"></i> ( 0 ) &nbsp; </a>
                <p style="float: left;"> <a href="index.php?logout='1'" style="color: red;">Log out</a> &nbsp;</p>
                <p style="float: left;"> <a href="accountinfo.php" style="color: red;">Profiel</a> </p>

            <?php endif ?>
        </div>

</ul>
</nav>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wide World Importers!</title>
    <!-- style css -->
    <link rel="stylesheet" href="stylesheet.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/bcfaec9208.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="wide.png" />
</head>
<body>
<script src="ImageSlideFunction.js"></script>




