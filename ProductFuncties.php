<?php

include "DatabaseFuncties.php";
$gegevens = array("StockItemID" => 0, "StockItemName" => "", "photo" => "");
$cgegevens = array("stockGroupID" => 0, "StockItemName" => "");




function AlleProductenOpVragen()
{
    $connection = MaakVerbinding();
    $producten = selecteerProducten($connection);
    SluitVerbinding($connection);
    return $producten;
}


function TotaalProductenOpVragen()
{
    $connection = MaakVerbinding();
    $totaal = totaalProducten($connection);
    SluitVerbinding($connection);
    return $totaal;
}


function ToonAantalPaginas($totaal){
    foreach($totaal as $total => $nummer) {

        if(isset($_SESSION['aantalproducten'])) {
            $aantalproducten = $_SESSION['aantalproducten'];
        } else {
            $aantalproducten = 100;
        }
        $totaalpaginas = ceil($nummer['total'] / $aantalproducten);
        for($i = 1; $i <= $totaalpaginas; $i++){
            print("<a href=\"productpagina.php?page=$i\">Page $i | </a>");

        }


    }
//        if(isset($_SESSION['aantalproducten'])) {
//            $aantalproducten = $_SESSION['aantalproducten'];
//        }

//        for($i = 1; $i < $nummer['total']/$aantalproducten; $i++){
//            print("<a href=\"productpagina.php?page=$i\">Page $i </a>");
//
//        }

}








function ToonProductenOpScherm($producten)
{
    if (is_array($producten)) {
        foreach ($producten as $product) {


            print("<div class='col-3 card shadow'><div class='center'>");


            if(isset($product["photo"])){
                $productfoto = $product["photo"];
                print("<img class='productfoto' src='insert-images-to-mysql/local/$productfoto' style='width: 50%'> <br>");
            } else {
                print("<img class='productfoto' src='https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-5_large.png?v=1530129458' style='width: 50%'> <br>");
            }


            print($product["StockItemName"] . "<br>");
            print("€ " . $product["unitPrice"] . "<br>");
            print("<a href=\"BekijkProduct.php?StockItemID=" . $product["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Bekijk</button></a><br><br> ");
            print("</div></div>");
        }
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





///////////////////////////category begin

function AlleCategorieënOpVragen()
{
    $connection = MaakVerbinding();
    $categorieën = selecteercategory($connection);
    SluitVerbinding($connection);
    return $categorieën;
}

function toonCategoryOpScherm($categorieën)
{
    foreach ($categorieën as $category) {



        print("<li><a href=\"ProductPagina.php?StockGroupName=" . $category["StockGroupID"] . "\">" . $category["StockGroupID"] . " " . $category["StockGroupName"] . "</a></li>");

        print("<li><a href=\"ProductPagina.php?StockGroupID=" . $category["StockGroupID"] . "\">" . $category["StockGroupID"] . " " . $category["StockGroupName"] . "</a></li>");


    }
}

function ProductCategoryGegevensOpvragen($cgegevens) {
    if (!empty($cgegevens["StockGroupID"])) {
        $connection = MaakVerbinding();
        $cgegevens = SelecteerCategoryItems($connection, $cgegevens["StockGroupID"]);
        $cgegevens["melding"] = "";
        SluitVerbinding($connection);
    } else $cgegevens["melding"] = "Het id ontbreekt";
    return $cgegevens;
}



///////////////// category einde




function GezochteProductenOpVragen($Zoekterm){
    $connection = MaakVerbinding();
    $producten = SelecteerGezochteProducten ($connection,$Zoekterm);
    SluitVerbinding($connection);
    return $producten;
}
function GezochteProductenOpVragenID($Zoekterm){
    $connection = MaakVerbinding();
    $producten = SelecteerProductenId($connection,$Zoekterm);
    SluitVerbinding($connection);
    return $producten;
}
function GezochteProductenOpVragenCategory($Zoekterm){
    $connection = MaakVerbinding();
    $producten = SelecteerProductenCategory($connection,$Zoekterm);
    SluitVerbinding($connection);
    return $producten;
}


function ToonGoedkoopProductenOpScherm($goedkoopProducten)
{
    foreach ($goedkoopProducten as $gproduct) {

        print("<div class='col-4'><div class='center'>");
        print("<img src='https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-5_large.png?v=1530129458' style='width: 50%'> <br> ");
        print($gproduct["StockItemName"] . "<br>");
        print($gproduct["unitPrice"] . "<br>");
        print("<a href=\"BekijkProduct.php?StockItemID=" . $gproduct["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Bekijk</button></a><br><br> ");
        print("</div></div>");
    }
}

function AlleGoedkoopProductenOpVragen()
{
    $connection = MaakVerbinding();
    $goedkoopProducten = SelecteerGoedkoopProducten($connection);
    SluitVerbinding($connection);
    return $goedkoopProducten;
}



?>
