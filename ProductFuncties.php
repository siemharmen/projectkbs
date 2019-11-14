<?php

include "DatabaseFuncties.php";
$gegevens = array("StockItemID" => 0, "StockItemName" => "");

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
        print("<td> " . $product["unitPrice"] . "</td> ");
        print("<td><a href=\"BekijkProduct.php?StockItemID=" . $product["StockItemID"] . "\">Bekijk</a></td> <br> ");

        print("</tr>");
    }
}



function ProductGegevensOpvragen($gegevens) {
    if (!empty($gegevens["StockItemID"])) {
        $connection = MaakVerbinding();
        $gegevens = SelecteerProduct($connection, $gegevens["StockItemID"]);
        $gegevens["melding"] = "";
        SluitVerbinding($connection);
    } else $gegevens["melding"] = "Het id ontbreekt";
    return $gegevens;
}



















?>
