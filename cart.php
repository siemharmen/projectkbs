<?php
include 'ProductFuncties.php';
?>
<?php
session_start();
# $_SESSION['cart'][] = array();

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

<?php
#array_push($_SESSION['cart'],"test");
#array_push($_SESSION['cart'],"test");
#array_push($_SESSION['cart'],"test");
#array_push($_SESSION['cart'],"test")
# onthouden push en array maken op andere plaatsen mischein if als session cart niet bestaat via issit
?>

<h2 style="float:left;"> producten in mand: </h2>
    <div class="row">
        <?php
        ToonProductenInCart($_SESSION['cart']); ?>
    </div>


