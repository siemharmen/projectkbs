<?php

include "DatabaseFuncties.php";


function AlleProductenOpVragen()
{
    $connection = MaakVerbinding();
    $producten = selecteerProducten($connection);
    SluitVerbinding($connection);
    return $producten;
}

function ToonProductenOpScherm($producten)
{
    foreach ($producten as $product) {
        print("<tr>");
        print("<td>" . $product["StockItemName"] . "</td> <br>");


        print("</tr>");
    }
}



?>
