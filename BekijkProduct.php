<?php
include "ProductFuncties.php";

?>


<?php include 'navbar.php'; ?>


<h1> Product </h1><br>

<img src='https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-5_large.png?v=1530129458' style='width: 15%; margin: auto; padding: auto; display:block;'> <br>
<?

print($gegevens["StockItemName"]);
?>

<p class="text-center"> <?php print($gegevens["StockItemName"]); ?> </p>
<p class="text-center"> <?php print($gegevens["unitPrice"]); ?> </p>

<div class="text-center">
<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><button type="button" class="btn btn-primary">terug naar producten</button></a>
</div>

</body>
</html>