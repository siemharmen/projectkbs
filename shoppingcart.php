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

<div class="container-fluid">

    <h1> Shopping Cart </h1><br>

</div>
<?php

$producten = GekozeCatogoryOpvragen(9)
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

