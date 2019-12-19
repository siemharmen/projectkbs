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


     <h3 style="float:left; padding-left: 15px;"> producten in mand: </h3>
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
if(isset($_GET['Remove'])){
    ProductWeghalen($_GET['Remove']);
}

    if(isset($_GET['Add'])){
        ProductToevoegen($_GET['Add']);


}




function RemoveFromArray($term){
    if (in_array(ProductGegevensByID($term), $_SESSION['cart'])) {
        $key = array_search(ProductGegevensByID($term), $_SESSION['cart']);
        unset($_SESSION['cart'][$key]);
    }
}
?>



    <div class="row">
        <?php
        if(isset($_SESSION['cart'])){
        ToonProductenInCart($_SESSION['cart']); } ?>
    </div>



<br><br><br><br><br><br><br>
<div class="text-center">

    <?php if(isset($_SESSION['cart'])){
        echo ' <form action="bestelpagina.php" method=\'POST\'> <input type="submit" name="bestelknop" value="naar gegevens" class="btn btn-primary"></form>';
    } ?>


</div>





</body>
</html>