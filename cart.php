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

<h2 style="float:left;"> producten in mand: </h2>
    <div class="row">
        <?php
        if(isset($_SESSION['cart'])){
        ToonProductenInCart($_SESSION['cart']); } ?>
    </div>



<br><br>
<div class="text-center">


    <form action="bestelpagina.php" method='post'> <input type="submit" name="" value="bestellen" class="btn btn-primary"></form>




</div>

</body>
</html>