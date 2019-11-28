<?php
include 'ProductFuncties.php';

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
<!-- header -->
<?php include 'navbar.php'; ?>




<!-- Pagina begin -->
<div class="container-fluid">

    <h1>Product pagina</h1>

</div>
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
<?php if($producten != null)print("Name:")?>
<div class="row">
    <?php ToonProductenOpScherm($producten); ?>

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