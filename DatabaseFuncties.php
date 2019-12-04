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








//selecteerd de producten voor de productpagina
function SelecteerProducten($connection) {
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    } else { $page = 1; }



    if(isset($_SESSION['aantalproducten'])){
        $aantalproducten = $_SESSION['aantalproducten'];
        $rows = $aantalproducten;
        $start = $aantalproducten * ($page - 1);
    } else {
        $rows = 50;
        $start = 0;
    }

    $sql = "SELECT StockItemName, s.StockItemID, unitPrice, f.photo  FROM stockitems s LEFT JOIN foto f on s.stockitemid = f.stockitemid LIMIT $start, $rows";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}




function totaalProducten($connection){
    $sql = "SELECT COUNT(stockItemID) AS total FROM stockitems";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;


}




function SelecteerProduct($connection, $id) {
    $statement = mysqli_prepare($connection, "SELECT s.stockitemid, stockitemname, unitPrice, f.photo, MarketingComments  FROM stockitems s LEFT JOIN foto f on s.stockitemid = f.stockitemid WHERE s.stockitemid=?");
    mysqli_stmt_bind_param($statement, 'i', $id);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $id, $naam, $price, $foto, $comments);
    mysqli_stmt_fetch($statement);
    $result = array("StockItemID" => $id,"StockItemName" => $naam, "unitPrice" => $price, "photo" => $foto, "MarketingComments" => $comments);
    mysqli_stmt_close($statement);
    return $result;
}
function  SelecteerProductenId($connection,$Zoeknummer) {
    $statement1 = mysqli_prepare($connection,"SELECT StockItemName, unitPrice, StockItemID, photo FROM stockitems WHERE StockItemID =?");
    mysqli_stmt_bind_param($statement1, 'i', $Zoeknummer);
    mysqli_stmt_execute($statement1);
    $result = mysqli_stmt_get_result($statement1);
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $result;
}
function  SelecteerProductenCategory($connection,$Zoekterm) {
    $Zoekterm = "%$Zoekterm%";
    $statement1 = mysqli_prepare($connection,"SELECT StockItemName, unitPrice, s.StockItemID, f.photo  FROM stockitems s LEFT JOIN foto f on s.stockitemid = f.stockitemid WHERE Tags LIKE ?");
    mysqli_stmt_bind_param($statement1, 's', $Zoekterm);
    mysqli_stmt_execute($statement1);
    $result = mysqli_stmt_get_result($statement1);
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $result;
}




// Category gedeelte

function SelecteerCategory($connection) {

    $sql = "SELECT StockGroupName, StockGroupID FROM stockgroups ORDER BY StockGroupID ASC";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}

function SelecteerCategoryItems($connection, $id) {
    $statement = mysqli_prepare($connection, "select StockItemID, StockItemName, unitPrice, stockGroupName from stockitems s
join stockitemstockgroups sig on s.stockitemID = sig.stockitemid
join stockgroups sg ON sig.stockgroupID = sg.stockgroupID
where sg.stockgroupID=?");
    mysqli_stmt_bind_param($statement, 'i', $id);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $id, $naam, $price);
    mysqli_stmt_fetch($statement);
    $result = array("stockGroupID" => $id,"StockItemName" => $naam, "unitPrice" => $price);
    mysqli_stmt_close($statement);
    return $result;
}

// category einde





function SelecteerGoedkoopProducten($connection) {
    $sql = "SELECT StockItemName, unitPrice, StockItemID FROM stockitems WHERE unitPrice < 5";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}

function SelecteerGezochteProducten($connection,$Zoekterm) {
    $Zoekterm = "%$Zoekterm%";
    $statement = mysqli_prepare($connection,"SELECT StockItemName, unitPrice, s.StockItemID, f.photo  FROM stockitems s LEFT JOIN foto f on s.stockitemid = f.stockitemid WHERE StockItemName LIKE ?");
    mysqli_stmt_bind_param($statement, 's', $Zoekterm);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $result;
}





?>
