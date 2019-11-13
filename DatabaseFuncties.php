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
    $sql = "SELECT * FROM stockitems ORDER BY StockItemName";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}







?>
