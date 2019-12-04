<?php
include 'ProductFuncties.php';

?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginpagina.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: loginpagina.php");
}
?>
<!-- header -->
<?php include 'navbar.php'; ?>

<h1> Winkelmand</h1>
<br><br>
<h2 style="float:left;"> producten in mand: </h2>