     <?php
include 'ProductFuncties.php';
?>
<?php
session_start();
# $_SESSION['cart'][] = array();


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
    RemoveFromArray($_GET['StockItemID']);
}
function RemoveFromArray($term){
    if (in_array(ProductGegevensByID($term), $_SESSION['cart'])) {
        $key = array_search(ProductGegevensByID($term), $_SESSION['cart']);
        unset($_SESSION['cart'][$key]);
    }
}
?>
<h2 style="float:left;"> producten in mand: </h2>

<h2 style="position: absolute;"> producten in mand: </h2>
    <div class="row">
        <?php
        if(isset($_SESSION['cart'])){
        ToonProductenInCart($_SESSION['cart']); } ?>
    </div>



<br><br><br><br><br><br><br>
<div class="text-center">
    <form action="bestelpagina.php" method='POST'> <input type="submit" name="bestelknop" value="naar gegevens" class="btn btn-primary"></form>

</div>





</body>
</html>