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


function SluitVerbinding($connection) {
    mysqli_close($connection);
}


function SelecteerProducten($connection) {
    $sql = "SELECT StockItemName, unitPrice FROM stockitems";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}
function SelecteerGezochteProducten($connection,$Zoekterm) {
    $sql = "SELECT StockItemName, unitPrice FROM stockitems Where StockItemName Like '%$Zoekterm%'";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}







?>
