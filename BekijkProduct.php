  <?php
include "ProductFuncties.php";
session_start();
$gegevens["StockItemID"] = isset($_GET["StockItemID"]) ? $_GET["StockItemID"] : 0;

$gegevens = ProductGegevensOpvragen($gegevens);
$filepath = "insert-images-to-mysql\\local\\";
$bekijkfoto = $gegevens['photo'];
?>
<?php


# nog toevoegen bij knop
if(isset($_POST['cartbutton'])){
    if(ProductChecken($gegevens)) {
        array_push($_SESSION['cart'], $gegevens);
        $_SESSION['amount'][$gegevens["StockItemID"]] = 1;
    } else{
        #$_SESSION['amount'][$gegevens["StockItemID"]] = $_SESSION['amount'][$gegevens["StockItemID"]] +1;
        $_SESSION['amount'][$gegevens["StockItemID"]] += 1;
        print($_SESSION['amount'][$gegevens["StockItemID"]]);
    }
    #AddtoCart($gegevens["StockItemID"] );
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'],$gegevens);
}


if(isset($gegevens['StockItemID'])){
    $_SESSION["StockItemID"] = $_GET['StockItemID'];
}


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
}



?>

<?php include 'navbar.php'; ?>


  <a href="productpagina.php"><button type="button" class="btn btn-primary" style="margin-left: 0.5%; margin-bottom: 0.5%;"> <= terug</button></a>
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




//foto met slides
 foreach ($fotoarray as $key => $value){
         $foto = $value["Photo"];

             ?><p class="mySlides center"><img style="width:400px; height: 400px;" src='<?php print($filepath . $foto); ?>'></p>
             <?php
     }
 ?>

<?php
//als geen foto in db staat
    if(!isset($value["Photo"])){
        ?><p class="center"><img style="width:20%;"  src='https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-5_large.png?v=1530129458'></p>
            <?php
    }
?>

     <!-- linken van javascript file -->
     <script src="script.js"></script>
     <br><br>


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


         <?php

         if($voorraad <= 0){

             ?>  <form action="" method="post">  <input type="submit" name="cartbutton" disabled=disabled value="add to cart"></form>
<!--             <a href="#"><button type="button" class="btn btn-light disabled">Add to cart</button></a> --><?php
         } else {
            ?>  <form action="" method='post'> <input type="submit" name="cartbutton" value="Voeg toe aan mand" class="btn btn-primary"></form>
<!--             <a href="#"><button type="button" class="btn btn-primary">Add to cart</button></a> --><?php
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