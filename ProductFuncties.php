<?php

include "DatabaseFuncties.php";
$gegevens = array("StockItemID" => 0, "StockItemName" => "", "photo" => "", "QuantityOnHand" => "");
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
            if(!isset($_GET["term"]) AND !isset($_GET["StockGroupName"])){
                print("<a href=\"productpagina.php?page=$i\">Pagina $i | </a>");
            }



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



function AantalInMand($connection){
    if(isset($_SESSION['cart'])){
        $totaalInMand = "";

    }
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
            print("<del>" . "€ " . $product["RecommendedRetailPrice"] . "</del>"  . "<br>");
            print("<h3 class='groen'>€ " . $product["unitPrice"] . "<br></h3>");
            print("<a href=\"BekijkProduct.php?StockItemID=" . $product["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Bekijk</button></a><br><br> ");
            print("</div></div>");
        }
    }
}
function ProductToevoegen($StockItemID){

if($_SESSION['amount'][$StockItemID] < $_SESSION['voorraad'][$StockItemID]) {
    $_SESSION['amount'][$StockItemID] = $_SESSION['amount'][$StockItemID] + 1;
}

}
function ProductWeghalen($StockItemID){
    if($_SESSION['amount'][$StockItemID] > 1){
    $_SESSION['amount'][$StockItemID] = $_SESSION['amount'][$StockItemID] -1;
    }
}
function ToonProductenInCart($producten)
{
    $i =0;
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
            print("<del>" . "€ " . $product["RecommendedRetailPrice"] . "</del>"  . "<br>");
            print("<h3 class='groen'>€ " . $product["unitPrice"] . "<br></h3>");
            print("<a href=\"BekijkProduct.php?StockItemID=" . $product["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Bekijk</button></a><br><br> ");
      #      print("<input type=\"button\" <a href=\"cart.php?remove=" . $product["StockItemID"] . "\" value=\"-\" /");
           # print("<input type=\"button\" <a href=\"cart.php?remove=" . $product["StockItemID"] . "\" value=\"-\" />");
            print("<a href=\"cart.php?Remove=" . $product["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">-</button></a> ");

            print($_SESSION['amount'][$product["StockItemID"]]);
            #print("<input type=\"button\" <a href=\"cart.php?add=" . $product["StockItemID"] . "\" value=\"+\" /><br>");
            print("<a href=\"cart.php?Add=" . $product["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">+</button></a><br> ");

            #mischien function aanmaken die het verwijderd
            print("<a href=\"cart.php?StockItemID=" . $product["StockItemID"] . "\"><button type=\"button\" class=\"btn btn-danger btn-sm\">Remove</button></a><br><br> ");


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
function ProductGegevensByID($id) {
        $connection = MaakVerbinding();
        $gegevens = SelecteerProduct($connection,$id);
        $gegevens["melding"] = "";
        SluitVerbinding($connection);
    return $gegevens;
}
function ProductChecken($gegevens){
    if(in_array($gegevens,$_SESSION['cart'])){
        return false;
    }
    return true;

}


function ProductfotoGegevensOpvragen($fgegevens) {
    if (!empty($fgegevens["StockItemID"])) {
        $connection = MaakVerbinding();
        $fgegevens = SelecteerProductFotos($connection, $fgegevens["StockItemID"]);
        $fgegevens["melding"] = "";
        SluitVerbinding($connection);
    } else $fgegevens["melding"] = "Het id ontbreekt";
    return $fgegevens;
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

        print(" <li> <a href=\"ProductPagina.php?StockGroupName=" . $category["StockGroupID"] . "\">" . $category["StockGroupName"] . "</a></li>");
       # print("<li><a href=\"ProductPagina.php?StockGroupID=" . $category["StockGroupID"] . "\">" . $category["StockGroupID"] . " " . $category["StockGroupName"] . "</a></li>");
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
    $producten = SelecteerGezochtID($connection,$Zoekterm);
    SluitVerbinding($connection);
    return $producten;
}
function GezochteProductenOpVragenCategory($Zoekterm){
    $connection = MaakVerbinding();
    $producten = SelecteerProductenCategory($connection,$Zoekterm);
    SluitVerbinding($connection);
    return $producten;
}




function AlleGoedkoopProductenOpVragen()
{
    $connection = MaakVerbinding();
    $goedkoopProducten = SelecteerGoedkoopProducten($connection);
    SluitVerbinding($connection);
    return $goedkoopProducten;
}
function GekozeCatogoryOpvragen($catogoryID){
    $connection = MaakVerbinding();
    $producten = SelecteerGekozeCatogory($connection,$catogoryID);
    SluitVerbinding($connection);
    return $producten;
}

function  SelecteerAlleFotos($ItemID) {
    $connection = MaakVerbinding();
    $statement1 = mysqli_prepare($connection,"SELECT Photo FROM foto WHERE StockItemID =?");
    mysqli_stmt_bind_param($statement1, 'i', $ItemID);
    mysqli_stmt_execute($statement1);
    $result = mysqli_stmt_get_result($statement1);
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $result;
}



?>
