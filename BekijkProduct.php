  <?php
include "ProductFuncties.php";
$gegevens["StockItemID"] = isset($_GET["StockItemID"]) ? $_GET["StockItemID"] : 0;
$gegevens = ProductGegevensOpvragen($gegevens);
$filepath = "insert-images-to-mysql\\local\\";
$bekijkfoto = $gegevens['photo'];

?>
<?php
session_start();

# nog toevoegen bij knop
array_push($_SESSION['cart'],$gegevens);

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
     }

     $fotoarray = SelecteerAlleFotos($_GET["StockItemID"]);




//hoofdfoto

 foreach ($fotoarray as $key => $value){
         $foto = $value["Photo"];
       if($key == 0){
             ?><p class="center"><img style="width:20%;" src='<?php print($filepath . $foto); ?>'></p>
             <?php  }
     }
 ?>


<!-- product gallerij -->
 <div class="productgallery" style="" >

     <?php
     
     foreach ($fotoarray as $key => $value){
         $foto = $value["Photo"];
       if($key != 0){
             ?><img class="" style="width:100px; height: 100px; display: inline-block; border: 2px solid black " src='<?php print($filepath . $foto); ?>'>

            <?php }

     }
     ?>
 </div>

<?php
    if(!isset($value["Photo"])){
        ?><p class="center"><img style="width:20%;"  src='https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-5_large.png?v=1530129458'></p>
            <?php
    }
?>


<!---->
<!--     --><?php
//        if(isset($gegevens['LastStocktakeQuantity'])){
//            $voorraad = $gegevens['LastStocktakeQuantity'];
//        } else {
//            $voorraad = 0;
//
//     }
//
//     if($voorraad <= 10 AND $voorraad > 5){
//        echo $gegevens["LastStockTakeQuantity"];
//    } elseif( $voorraad <= 5){
//         echo $gegevens["LastStockTakeQuantity"];
//     } else {
//         echo $gegevens["LastStockTakeQuantity"];
//     }
//     ?>


    <!-- prijs product -->

        <del> <?php print("€ " . $gegevens["RecommendedRetailPrice"] . "<br>"); ?> </del>
     <h2 style="color: green;"> € <?php print($gegevens["unitPrice"]); ?> </h2>


     <!-- beschrijving -->
     <?php if(isset($gegevens["MarketingComments"])){
         ?>  <p> <?php print($gegevens["MarketingComments"]); ?> </p> <?php
     } ?>


     <?php

     $voorraad = $gegevens["QuantityOnHand"];
     if($voorraad <= 20 AND $voorraad > 10){
         print("<p style='color: darkorange'> beperkt aantal beschikbaar ($voorraad)");
     } elseif($voorraad <= 10 AND $voorraad > 0){
         print("<p style='color: red'> nog maar ($voorraad) beschikbaar, op=op </p>");
     } elseif($voorraad == 0) {
         print("<p style='color: darkred'>Voorraad is op! </p>");
     } else {
         print("<p style='color: lawngreen'>Voorraad; 20+ </p>");
     }


     ?>


     <div class="text-center">

        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><button type="button" class="btn btn-primary">terug naar producten</button></a>
         <?php

         if($voorraad <= 0){
           ?>  <a href="#"><button type="button" class="btn btn-light disabled">Add to cart</button></a> <?php
         } else {
            ?> <a href="#"><button type="button" class="btn btn-primary">Add to cart</button></a> <?php
         }
         ?>

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