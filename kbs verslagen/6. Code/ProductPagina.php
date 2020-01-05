<?php
include 'ProductFuncties.php';
session_start();
?>
<?php





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


<div class="center">

    <?php
    if(!isset($_GET["term"]) AND !isset($_GET["StockGroupName"])){
        echo '<div class="aantalfilter">
<p> Producten per pagina: </p>
<form action="ProductPagina.php" method="get">
    <select name="aantalproducten">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select>

    <input type="submit" class="btn btn-primary" name="radiobutton" value="filter" />
</form>
</div>';
    } else{

    }
    ?>

</div>











<?php
if(isset($_GET["StockGroupName"])) {
    $producten = GekozeCatogoryOpvragen($_GET["StockGroupName"]);
    #print($_GET["StockGroupName"]);
    $ProductenbyCategory = null;
        $ProductenbyID = null;
} else {
if(isset($_GET["term"]) == true){

    $producten = GezochteProductenOpVragen($_GET["term"]);
    $ProductenbyID = GezochteProductenOpVragenID($_GET["term"]);
    $ProductenbyCategory = GezochteProductenOpVragenCategory($_GET["term"]);
}elseif(isset($_GET["StockGroupName"]) == false) {
    $producten = AlleProductenOpVragen();
    $ProductenbyCategory = null;
    $ProductenbyID = null;
}} ?>

<?php if (isset($_GET["term"]) == true){
    if ($_GET["term"] != ""){
        print("Name:");}}?>
<div class="row">
    <?php ToonProductenOpScherm($producten); ?>

</div>

<div class="center">
    <?php toonAantalPaginas($totaal); ?>
</div>


<?php if($ProductenbyID != null){print("Id:");} ?>
<div class="row">
        <?php ToonProductenOpScherm($ProductenbyID);?>
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