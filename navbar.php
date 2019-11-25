<?php

$categorieën = AlleCategorieënOpVragen();

?>


<nav>
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="ProductPagina.php">Producten</a></li>
    <!---->
    <!--<li>-->
    <!--    --><?php //toonCategoryOpScherm($categorieën); ?>
    <!--</li>-->
    <!---->

    <li class="dropdown">Categorieën
        <ul class="dropdown-content">

            <?php toonCategoryOpScherm($categorieën); ?>
        </ul>
    </li>


    <!--zoekbalk-->

    <div class="zoekbalk">
        <form action="ProductPagina.php" method="get">
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








</nav>







