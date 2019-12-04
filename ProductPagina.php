<?php
include 'ProductFuncties.php';






?>
<?php
session_start();

if(isset($_GET['aantalproducten'])) {
    $aantalproducten = $_GET['aantalproducten'];
    $_SESSION['aantalproducten'] = $aantalproducten;
} else {
    $aantalproducten = 100;
}


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";

}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);

}
?>
<!-- header -->
<?php include 'navbar.php'; ?>



<!-- Pagina begin -->
<div class="container-fluid">
    <h1>Product pagina</h1>
</div>


<div class="center">
    <?php toonAantalPaginas($totaal); ?>
</div>



<p> Totaal aantal producten per pagina: </p>
<form action="ProductPagina.php" method="get">
    <select name="aantalproducten">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select>

    <input type="submit" name="radiobutton" value="filter" />
</form>

<?php

if(isset($_GET["term"]) == true){
    $producten = GezochteProductenOpVragen($_GET["term"]);
    $ProductenbyID = GezochteProductenOpVragenID($_GET["term"]);
    $ProductenbyCategory = GezochteProductenOpVragenCategory($_GET["term"]);
}else
{$producten = AlleProductenOpVragen();
    $ProductenbyCategory = null;
    $ProductenbyID = null;
} ?>
<?php if (isset($_GET["term"]) == true){
    if ($_GET["term"] != ""){
        print("Name:");}}?>
<div class="row">
    <?php ToonProductenOpScherm($producten); ?>

</div>

<div class="center">
    <?php toonAantalPaginas($totaal); ?>
</div>




<?php if($ProductenbyID != null){print("Id:");}?>
<div class="row">
    <?php if(isset($_GET["term"]) == true){ ToonProductenOpScherm($ProductenbyID);} // verbeteren zodat bij niks dit niet gebeurd; ?>
</div>
</php>
<?php if($ProductenbyCategory != null)print("Category:")?>
<div class="row">
    <?php ToonProductenOpScherm($ProductenbyCategory); ?>
</div>
</div>
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