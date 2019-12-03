<?php
include "ProductFuncties.php";
session_start();
$cart = array(100,1,5);

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginpagina.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: loginpagina.php");
}


function addItem($item){
    array_push($cart,$item);
}
?>

<?php include 'navbar.php'; ?>

<h1> Shopping Cart </h1><br>
<?php
$producten = array();
foreach ($cart as $value){
    array_push($producten,GezochteProductenOpVragenID($value));
}
print_r($producten)
?>
<div class="row">
    <?php ToonProductenOpScherm($producten); ?>
</div>
</php>

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

