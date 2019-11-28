<?php
include 'ProductFuncties.php';

?>

<!-- header -->
<?php include 'navbar.php'; ?>

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


<!-- Pagina begin -->
<div class="container-fluid">

    <h1>Product pagina</h1>

    <div class="row">
        <?php ToonProductenOpScherm($producten); ?>

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



</body>
</html>