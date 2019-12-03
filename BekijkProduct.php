 <?php
include "ProductFuncties.php";
$gegevens["StockItemID"] = isset($_GET["StockItemID"]) ? $_GET["StockItemID"] : 0;
$gegevens = ProductGegevensOpvragen($gegevens);
$filepath = "insert-images-to-mysql\\local\\";


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

<?php include 'navbar.php'; ?>


<h1> Product </h1><br>



<!--<img class='productfoto' src='--><?php // ?><!--' style='width: 50%'> <br>-->
<!--<p class="text-center"> --><?php //print($filepath); ?><!-- </p>-->
<!--<p class="text-center"> --><?php //print_r($gegevens); ?><!-- </p>-->
<!--<img class='productfoto' src='insert-images-to-mysql/local/--><?php //$bekijkfoto ?><!-- ' style='width: 50%'> <br>-->
<p class="text-center"> <?php print($gegevens["StockItemName"]); ?> </p>
<p class="text-center"> € <?php print($gegevens["unitPrice"]); ?> </p>
<!--<p class="text-center">  --><?php //print($gegevens["photo"]); ?><!-- </p>-->

<div class="text-center">

<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><button type="button" class="btn btn-primary">terug naar producten</button></a>
</div>

<?php

?>






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