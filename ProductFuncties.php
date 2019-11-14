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
        print("<td>" . $product["StockItemName"] . "</td>");
        print("<td> " . $product["unitPrice"] . "</td> <br>");

        print("</tr>");
    }
}
function GezochteProductenOpVragen($Zoekterm){
    $connection = MaakVerbinding();
    $producten = SelecteerGezochteProducten ($connection,$Zoekterm);
    SluitVerbinding($connection);
    return $producten;
}



?>
