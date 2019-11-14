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
