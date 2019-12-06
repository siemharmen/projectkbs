  <?php
include "ProductFuncties.php";
$gegevens["StockItemID"] = isset($_GET["StockItemID"]) ? $_GET["StockItemID"] : 0;
$gegevens = ProductGegevensOpvragen($gegevens);
$filepath = "insert-images-to-mysql\\local\\";
$bekijkfoto = $gegevens['photo'];

?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
}





?>

<?php include 'navbar.php'; ?>




 <div class="card shadow text-center">
    <!-- titel product -->
    <h1 class="text-center"> <?php print($gegevens["StockItemName"]); ?> </h1>
     <!-- foto product -->
     <?php if(isset($gegevens['photo'])){
         $bekijkfoto = $gegevens['photo'];

     } else {
         $filepath = '';
         $bekijkfoto = 'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-5_large.png?v=1530129458';
     } ?>

    <p class="center"><img style="width:20%;" src='<?php print($filepath . $bekijkfoto); ?>'></p>
    <!-- prijs product -->
    <p> € <?php print($gegevens["unitPrice"]); ?> </p>
     <!-- beschrijving -->
    <p> <?php print($gegevens["MarketingComments"]); ?> </p>



<div class="text-center">

<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><button type="button" class="btn btn-primary">terug naar producten</button></a>
</div>

 <br>


 </div>


<!---->
<!--<div class="center">-->
<!-- --><?php //print($gegevens["StockItemName"]);
//       print($gegevens["unitPrice"] . "<br>"); ?>
<!--    <a href="index.php"><button type="button" class="btn btn-primary">Verder zoeken</button></a>-->
<!--</div>-->
<!--<br>-->
<?php //print($gegevens["melding"]); ?><!--<br>-->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

</body>
</html>