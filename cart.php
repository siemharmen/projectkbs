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
<?php
if(isset($_GET['StockItemID'])){
    print("1");
    RemoveFromArray($_GET['StockItemID']);
}
function RemoveFromArray($term){
    print_R(GezochteProductenOpVragenID($term));
    print("<br>");
    print_r($_SESSION['cart']);
    if (in_array(GezochteProductenOpVragenID($term), $_SESSION['cart'])) {
        print("test");
        unset($_SESSION['cart'][array_search($term,$_SESSION['cart'][$_GET['StockItemID']])]);
    }
}
?>
<h2 style="float:left;"> producten in mand: </h2>
    <div class="row">
        <?php
        ToonProductenInCart($_SESSION['cart']); ?>
    </div>


