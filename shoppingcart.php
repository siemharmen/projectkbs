<?php
session_start();
$cart = array();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginpagina.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: loginpagina.php");
}


function addItem($item){
    array_push($cart,$item);
}
?>

<?php include 'navbar.php'; ?>

<h1> Product </h1><br>

