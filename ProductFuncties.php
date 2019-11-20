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

function GezochteProductenOpVragen($Zoekterm){
    $connection = MaakVerbinding();
    $producten = SelecteerGezochteProducten ($connection,$Zoekterm);
    SluitVerbinding($connection);
    return $producten;
}

function ToonProductenOpScherm($producten)
{
    foreach ($producten as $product) {

            print("<div class='col-4'><div class='center'>");
            print($product["StockItemName"] . "<br>");
            print($product["unitPrice"] . "<br>");
            print("<a href=\"BekijkProduct.php?StockItemID=" . $product["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Bekijk</button></a><br><br> ");
            print("</div></div>");
        }
}

//TEST

function AlleGoedkoopProductenOpVragen()
{
    $connection = MaakVerbinding();
    $goedkoopProducten = SelecteerGoedkoopProducten($connection);
    SluitVerbinding($connection);
    return $goedkoopProducten;
}

function ToonGoedkoopProductenOpScherm($goedkoopProducten)
{
    foreach ($goedkoopProducten as $gproduct) {

        print("<div class='col-4'><div class='center'>");
        print($gproduct["StockItemName"] . "<br>");
        print($gproduct["unitPrice"] . "<br>");
        print("<a href=\"BekijkProduct.php?StockItemID=" . $gproduct["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Bekijk</button></a><br><br> ");
        print("</div></div>");
    }
}


//TEST







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
