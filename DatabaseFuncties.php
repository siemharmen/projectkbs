<?php

function MaakVerbinding()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $databasename = "wideworldimporters";
    $connection = mysqli_connect($host, $user, $pass, $databasename);
    return $connection;
}




function SelecteerProducten($connection) {

    $sql = "SELECT StockItemName, unitPrice, StockItemID FROM stockitems";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}


// function goedkope producten test


function SelecteerGoedkoopProducten($connection) {
    $sql = "SELECT StockItemName, unitPrice, StockItemID FROM stockitems WHERE unitPrice < 5";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}





// test einde


function SelecteerGezochteProducten($connection,$Zoekterm) {
    $Zoekterm = "%$Zoekterm%";
    $statement = mysqli_prepare($connection,"SELECT StockItemName, unitPrice, StockItemID FROM stockitems WHERE StockItemName LIKE ?");
    mysqli_stmt_bind_param($statement, 's', $Zoekterm);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $result;
}

function SelecteerProduct($connection, $id) {
    $statement = mysqli_prepare($connection, "SELECT StockItemID, StockItemName, unitPrice FROM stockitems WHERE StockItemID=?");
    mysqli_stmt_bind_param($statement, 'i', $id);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $id, $naam, $price);
    mysqli_stmt_fetch($statement);
    $result = array("StockItemID" => $id,"StockItemName" => $naam, "unitPrice" => $price);
    mysqli_stmt_close($statement);
    return $result;
}



function SluitVerbinding($connection) {
    mysqli_close($connection);
}











?>
